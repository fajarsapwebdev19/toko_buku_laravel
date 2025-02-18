<?php

namespace App\Http\Controllers;
use Exception;
use App\Models\Cart;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\School;
use App\Models\PersonalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use App\Notifications\VerifyEmailUser;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // login siswa

    public function auth_page()
    {
        if(Auth::check())
        {
            $userRole = Auth::user()->role_id;

            if($userRole == 3)
            {
               return redirect('/');
            }
        }
        return view('auth');
    }

    public function process_auth(Request $r)
    {
        $username = $r->username;
        $password = $r->password;

        $val = Validator::make($r->all(), [
            'username' => 'required',
            'password' => 'required',
            'school_name' => 'required'
        ], [
            'username.required' => 'Masukan Username',
            'password.required' => 'Masukan Password',
            'school_name.required' => 'Nama Sekolah Tidak Boleh Kosong'
        ]);

        if($val->fails())
        {
            $err = $val->errors()->all();

            return response()->json(['message' => $err], 400);
        }

        $sch = School::where('nama_sekolah', 'LIKE', '%' . $r->school_name . '%')->first();

        if($sch)
        {
            $u = User::with(['personal'])->where('username', $username)->first();

            if($u)
            {
                if(Hash::check($password, $u->password))
                {
                    Auth::login($u);

                    if($u->status_account == "N")
                    {
                        Auth::logout();

                        return response()->json(['message' => 'Akun Tidak Aktif'], 401);
                    }

                    $role = $u->role_id;

                    $u->last_login = now();
                    $u->save();

                    return response()->json([
                        'message' => 'Berhasil Login',
                        'status' => 'Success',
                        'to' => $role,
                        'response_code' => 200
                    ], 200);
                }
                else
                {
                    return response()->json(['message' => 'Password Salah', 'status' => 'Unauthorized', 'response_code' => 401], 401);
                }
            }
            else
            {
                return response()->json(['message' => 'Username Salah', 'status' => 'Unauthorized', 'response_code' => 401], 401);
            }
        }
        else{
            return response()->json(['message' => 'Nama sekolah tidak di temukan'], 401);
        }
    }

    // end login siswa

    // login admin
    public function login_page_admin()
    {
        if(Auth::check())
        {
            $userRole = Auth::user()->role_id;

            if($userRole == 1 && $userRole == 2)
            {
               return redirect('/admin');
            }
        }

        return view("auth_admin");
    }

    public function process_auth_sad(Request $r)
    {
        $username = $r->username;
        $password = $r->password;

        $val = Validator::make($r->all(), [
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Masukan Username',
            'password.required' => 'Masukan Password'
        ]);

        $user = User::where('username', $username)->first();

        if($user)
        {
            if(Hash::check($password, $user->password))
            {
                Auth::login($user);

                if($user->status_account == "N")
                {
                    Auth::logout();
                    return response()->json(['message' => 'Akun Tidak Aktif'], 401);
                }

                $role = $user->role_id;

                $user->last_login = now();
                $user->save();

                return response()->json([
                    'message' => 'Berhasil Login',
                    'status' => 'Success',
                    'to' => $role,
                    'response_code' => 200
                ], 200);
            }
            else
            {
                return response()->json(['message' => 'Password Salah', 'status' => 'Unauthorized', 'response_code' => 401], 401);
            }
        }
        else
        {
            return response()->json(['message' => 'Username Salah', 'status' => 'Unauthorized', 'response_code' => 401], 401);
        }
    }
    // end login admin

    // register user (siswa)

    public function register_users()
    {
        return view('register_users');
    }

    public function register_process_user(Request $request){
        // Validasi input
        $validator = Validator::make($request->all(), [
            'school_name' => 'required',
            'name' => 'required',
            'gender' => 'required|in:L,P',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed',
        ], [
            'school_name.required' => 'Nama Sekolah wajib di isi',
            'name.required' => 'Nama wajib di isi',
            'gender.required' => 'Pilih salah satu (L/P)',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah digunakan, silakan gunakan email lain',
            'username.required' => 'Username wajib di isi',
            'username.unique' => 'Username sudah digunakan, silakan pilih username lain',
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi Password harus sama dengan Password',
        ]);

        // Jika validasi gagal, kembalikan error dalam format JSON
        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 400);
        }

        // Cek apakah sekolah tersedia
        $school = School::where('nama_sekolah', 'like', '%' . addslashes($request->school_name) . '%')->first();

        if (!$school) {
            return response()->json(['message' => 'Nama Sekolah tidak ditemukan, masukkan nama yang benar'], 400);
        }

        // Generate UUID & Personal ID
        $user_id = Uuid::uuid4()->toString();
        $personal_id = mt_rand();

        try
        {
            DB::beginTransaction();
            // Simpan data personal
            PersonalData::create([
                'id' => $personal_id,
                'name' => $request->name,
                'gender' => $request->gender,
                'address' => null,
                'created_at' => now(),
            ]);

            // Simpan data user
            $user = User::create([
                'id' => $user_id,
                'role_id' => 3,
                'personal_id' => $personal_id,
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'email' => $request->email,
                'npsn' => $school->npsn,
                'token_reset' => null,
                'status_verify' => 'N',
                'status_account' => 'N',
                'verify_at' => null,
                'last_login' => null,
                'created_at' => now(),
            ]);

            $user->notify(new VerifyEmailUser());

            DB::commit();

            return response()->json([
                'message' => 'Registrasi berhasil! Silakan verifikasi email Anda.'
            ], 200);
        }
        catch(Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage(),
                'status' => 'Internal Server Error'
            ], 500);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function logout_sad()
    {
        Auth::logout();

        return redirect('/auth_sad');
    }
}

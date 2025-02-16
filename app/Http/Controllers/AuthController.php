<?php

namespace App\Http\Controllers;
use App\Notifications\VerifyEmailUser;
use App\Models\Cart;
use App\Models\PersonalData;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
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

    public function login_admin(Request $r)
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

        if($val->fails())
        {
            $err = $val->errors()->all();

            return response()->json(['message' => $err], 400);
        }

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

    public function register_process_user(Request $r)
    {
        $school_name = $r->school_name;
        $name = $r->name;
        $gender = $r->gender;
        $email = $r->email;
        $username = $r->username;
        $password = $r->password;
        $confirm_password = $r->confirm_password;

        $validator = Validator::make($r->all(), [
            'school_name' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required',
            'confirm_password' => 'required'
        ], [
            'school_name.required' => 'Nama Sekolah wajib di isi',
            'name.required' => 'Nama wajib di isi',
            'gender.required' => 'Pilih Salah Satu',
            'email.required' => 'Email wajib di isi',
            'email.email' => 'Format Email tidak valid',
            'email.unique' => 'Email sudah digunakan silahkan gunakan email yang lain',
            'username.required' => 'Username wajib di isi',
            'username.unique' => 'Username sudah digunakan. Silakan pilih username lain.',
            'password.required' => 'Password wajib di isi',
            'confirm_password.required' => 'Konfirmasi Password wajib di isi'
        ]);

        // Jika validasi gagal, kembalikan error dalam format JSON
        if($validator->fails())
        {
            $err = $validator->errors()->all();

            return response()->json(['message' => $err], 400);
        }

        // cek sekolah
        $sch = School::where('nama_sekolah', 'like', '%' . $school_name . '%')->first();

        if($sch)
        {
            $npsn = $sch->npsn;

            // cek username duplikat
            $u = User::where('username', $username)->first();

            if($u)
            {
                return response()->json(['message' => 'Username ' . $username . ' Sudah Digunakan'], 402);
            }
            else
            {
                // cek email user
                $email = User::where('email', $email)->first();

                if($email)
                {
                    return response()->json(['message' => 'Email ' . $email . ' Sudah Digunakan !'], 402);
                }
                else
                {
                    if($password == $confirm_password)
                    {
                        // proses regis dan buat users ke database
                        $uid = Uuid::uuid4();
                        $pid = mt_rand().rand();

                        PersonalData::create([
                            'id' => $pid,
                            'name' => $name,
                            'gender' => $gender,
                            'address' => NULL,
                            'created_at' => now(),
                            'updated_at' => NULL
                        ]);

                        $user = User::create([
                            'id' => $uid,
                            'role_id' => 3,
                            'personal_id' => $pid,
                            'username' => $username,
                            'password' => Hash::make($password),
                            'email' => $email,
                            'npsn' => $npsn,
                            'token_reset' => NULL,
                            'status_verify' => 'N',
                            'status_acoount' => 'N',
                            'verify_at' => NULL,
                            'last_login' => NULL,
                            'created_at' => now(),
                            'updated_at' => NULL
                        ]);

                        $user->notify(new VerifyEmailUser());

                        return response()->json(['message' => 'Registrasi berhasil! Silakan verifikasi email Anda.'], 200);
                    }
                    else
                    {
                        return response()->json(['message' => 'Konfirmasi Password harus sama dengan Password'], 402);
                    }
                }
            }
        }
        // jika nama sekolah tidak di temukan
        else
        {
            return response()->json(['message' => 'Nama Sekolah tidak di temukan, masukan nama sekolah dengan benar'], 402);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}

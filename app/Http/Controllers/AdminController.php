<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Book;
use App\Models\Role;
use App\Models\School;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.home');
    }

    public function slider()
    {
        return view('admin.slider');
    }

    public function rekening()
    {
        return view('admin.rekening');
    }

    public function account_admin()
    {
        return view('admin.account_admin');
    }

    public function account_users()
    {
        return view('admin.account_users');
    }

    public function master_role()
    {
        return view('admin.master_role');
    }

    public function role_data(Request $r)
    {
        if($r->ajax())
        {
            $role = Role::orderBy('id', 'asc')->get();

            return DataTables::of($role)
                ->addIndexColumn()
                ->addColumn('created_at', function($r){
                    return ($r->created_at == NULL) ? 'NULL' : date('d-m-Y H:i:s', strtotime($r->created_at));
                })
                ->addColumn('updated_at', function($r){
                    return ($r->updated_at == NULL) ? 'NULL' : date('d-m-Y H:i:s', strtotime($r->updated_at));
                })
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-info btn-sm mb-2 update" data-id="'.$row->id.'"><em class="fas fa-pen"></em></button> <button class="btn btn-danger btn-sm mb-2 delete" data-id="'.$row->id.'"><em class="fas fa-trash"></em></button>';
                })
                ->rawColumns(['action'])
                ->toJson();
        }
    }

    public function get_role($id)
    {
        $role = Role::find($id);

        return response()->json(['id' => $role->id, 'role' => $role->role_name]);
    }

    public function add_role(Request $r)
    {
        // Validasi input
        $validator = Validator::make($r->all(), [
            'role_name' => 'required'
        ], [
            'role_name.required' => 'Role Name wajib diisi'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->all()], 400);
        }

        // Cek apakah role_name sudah ada
        if (Role::where('role_name', $r->role_name)->exists()) {
            return response()->json(['message' => 'Role Name '. $r->role_name .  ' sudah ada di Database'], 402);
        }

        try {
            DB::beginTransaction();

            Role::create([
                'role_name' => $r->role_name,
                'created_at' => now(),
                'updated_at' => null
            ]);

            DB::commit();

            return response()->json(['message' => 'Berhasil Tambah Role'], 200);
        } catch (Exception $e) {
            DB::rollBack(); // Pastikan transaksi dibatalkan jika terjadi error
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function update_role($id, Request $r)
    {
        // Validasi input
        $validator = Validator::make($r->all(), [
            'role_name' => 'required'
        ], [
            'role_name.required' => 'Role Name wajib diisi'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->all()], 400);
        }

        try {
            DB::beginTransaction();

            Role::where('id', $id)->update([
                'role_name' => $r->role_name,
                'updated_at' => now()
            ]);

            DB::commit();

            return response()->json(['message' => 'Berhasil Ubah Role'], 200);
        } catch (Exception $e) {
            DB::rollBack(); // Pastikan transaksi dibatalkan jika terjadi error
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function delete_role($id)
    {
        Role::find($id)->delete();

        return response()->json(['message' => 'Berhasil Hapus Role']);
    }

    public function master_sekolah()
    {
        return view('admin.master_sekolah');
    }

    public function get_school($id)
    {
        $sch = School::find($id);

        return response()->json($sch);
    }

    public function school_data(Request $r)
    {
        if($r->ajax())
        {
            $sch = School::orderBy('npsn', 'asc')->get();

            return DataTables::of($sch)
            ->addColumn('updated_at', function($r){
                return ($r->updated_at == NULL) ? 'NULL' : date('d-m-Y H:i:s', strtotime($r->updated_at));
            })
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-info btn-sm mb-2 update" data-id="'.$row->npsn.'"><em class="fas fa-pen"></em></button> <button class="btn btn-danger btn-sm mb-2 delete" data-id="'.$row->npsn.'"><em class="fas fa-trash"></em></button>';
            })
            ->rawColumns(['action'])
            ->toJson();

        }
    }

    public function add_school(Request $r)
    {
        $validator = Validator::make($r->all(), [
            'npsn' => 'required|numeric|digits:8',
            'school_name' => 'required',
            'address' => 'required',
            'no_telp' => 'required|numeric|min_digits:12|max_digits:13',
            'email' => 'required|email',
            'nama_kepsek' => 'required'
        ], [
            'npsn.required' => 'NPSN wajib di isi !',
            'npsn.numeric' => 'NPSN berformat angka !',
            'npsn.digits' => 'NPSN 8 digit angka !',
            'school_name.required' => 'Nama Sekolah wajib di isi !',
            'address.required' => 'Alamat wajib di isi !',
            'no_telp.required' => 'No Telp wajib di isi !',
            'no_telp.numeric' => 'No Telp berformat angka !',
            'no_telp.min_digits' => 'No Telp Minimal 12 digit !',
            'no_telp.max_digits' => 'No Telp Maksimal 13 digit !',
            'email.required' => 'Email wajib di isi !',
            'email.email' => 'Format Email tidak valid',
            'nama_kepsek.required' => 'Nama Kepsek wajib di isi'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->all()], 400);
        }

        try
        {
            DB::beginTransaction();
            $sch = [
                'npsn' => $r->npsn,
                'nama_sekolah' => $r->school_name,
                'alamat' => $r->address,
                'no_telp' => $r->no_telp,
                'email' => $r->email,
                'nama_kepsek' => $r->nama_kepsek,
                'created_at' => now(),
                'updated_at' => null
            ];

            School::create($sch);
            DB::commit();

            return response()->json([
                'message' => 'Berhasil Tambah Data Sekolah'
            ], 200);
        }
        catch(Exception $e)
        {
            return response()->json([
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function update_school()
    {

    }

    public function master_ketegori()
    {
        return view('admin.master_kategori');
    }

    public function kategori_data(Request $r)
    {
        if($r->ajax())
        {
            $sch = Category::orderBy('kelas', 'asc')->get();

            return DataTables::of($sch)
            ->addColumn('created_at', function($r){
                return ($r->created_at == NULL) ? 'NULL' : date('d-m-Y H:i:s', strtotime($r->created_at));
            })
            ->addColumn('updated_at', function($r){
                return ($r->updated_at == NULL) ? 'NULL' : date('d-m-Y H:i:s', strtotime($r->updated_at));
            })
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-info btn-sm mb-2 update" data-id="'.$row->npsn.'"><em class="fas fa-pen"></em></button> <button class="btn btn-danger btn-sm mb-2 delete" data-id="'.$row->npsn.'"><em class="fas fa-trash"></em></button>';
            })
            ->rawColumns(['action'])
            ->toJson();
        }
    }

    public function master_buku()
    {
        return view('admin.master_buku');
    }

    public function data_buku(Request $r)
    {
        if($r->ajax())
        {
            $sch = Book::all();

            return DataTables::of($sch)
            ->addColumn('img', function($r){
                return '<img width="10" src="'.asset($r->path_img).'">';
            })
            ->addColumn('created_at', function($r){
                return ($r->created_at == NULL) ? 'NULL' : date('d-m-Y H:i:s', strtotime($r->created_at));
            })
            ->addColumn('updated_at', function($r){
                return ($r->updated_at == NULL) ? 'NULL' : date('d-m-Y H:i:s', strtotime($r->updated_at));
            })
            ->addColumn('category', function($r){
                return ($r->category->kategori == NULL);
            })
            ->addColumn('action', function ($row) {
                return '<button class="btn btn-info btn-sm mb-2 update" data-id="'.$row->id.'"><em class="fas fa-pen"></em></button> <button class="btn btn-danger btn-sm mb-2 delete" data-id="'.$row->id.'"><em class="fas fa-trash"></em></button>';
            })
            ->rawColumns(['action', 'img'])
            ->toJson();
        }
    }

    public function pesanan()
    {
        return view('admin.pesanan');
    }

    public function pengiriman()
    {
        return view('admin.pengiriman');
    }

    public function user_profile()
    {
        return view('admin.profile');
    }

    public function user_change_password()
    {
        return view('admin.change_password');
    }
}

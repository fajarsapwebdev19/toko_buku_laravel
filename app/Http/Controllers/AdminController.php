<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
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

    public function master_ketegori()
    {
        return view('admin.master_kategori');
    }

    public function master_buku()
    {
        return view('admin.master_buku');
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

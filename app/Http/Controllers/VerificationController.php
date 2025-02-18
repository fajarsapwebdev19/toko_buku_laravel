<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    public function verify(Request $request, $id, $hash)
    {
        // Cari pengguna berdasarkan ID
        $user = User::find($id);

        // Jika user tidak ditemukan atau hash tidak cocok
        if (!$user || !hash_equals($hash, sha1($user->email))) {
            return redirect()->route('verification.failed');
        }

        // Jika email sudah diverifikasi sebelumnya
        if ($user->email_verified_at) {
            return redirect()->route('verification.already_verified');
        }

        // Update status verifikasi user
        $user->update([
            'email_verified_at' => now(),
            'status_verify' => 'Y',
            'status_account' => 'Y',
        ]);

        return redirect()->route('verification.success');
    }
}

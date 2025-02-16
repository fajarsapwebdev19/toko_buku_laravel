<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerificationController extends Controller
{
    public function verify(Request $r, $id, $hash)
    {
        // cari pengguna
        $user = User::find($id);

        if(!$user || !hash_equals((string) $hash, sha1($user->getEmailForVerification())))
        {
            return redirect()->route('verification.failed');
        }

        if($user->hasVerifedEmail())
        {
            return redirect()->route('verification.already_verified');
        }

        $user->update([
            'status_verify' => 'Y',
            'status_account' => 'Y',
            'verify_at' => now()
        ]);

        return redirect()->route('verification.success');
    }
}

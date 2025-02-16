<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Ramsey\Uuid\Uuid;
use App\Models\School;
use App\Models\PersonalData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        School::create([
            'npsn' => '11111111',
            'nama_sekolah' => 'Sekolah Xyz',
            'alamat' => 'Jl example',
            'no_telp' => '081987876372',
            'email' => 'sekolahxyz@mail.com',
            'nama_kepsek' => 'XYZWE',
            'created_at' => now(),
            'updated_at' => NULL
        ]);

        $pid = rand();
        $uid = Uuid::uuid4();

        PersonalData::create([
            'id' => $pid,
            'name' => 'Admin',
            'gender' => 'L',
            'address' => 'Jl Xyz Kop',
            'created_at' => now(),
            'updated_at' => NULL
        ]);

        Role::insert([
            [
                'id' => 1,
                'role_name' => 'Super Admin',
                'created_at' => now(),
                'updated_at' => NULL
            ],
            [
                'id' => 2,
                'role_name' => 'Admin',
                'created_at' => now(),
                'updated_at' => NULL
            ],
            [
                'id' => 3,
                'role_name' => 'User',
                'created_at' => now(),
                'updated_at' => NULL
            ]
        ]);

        User::create([
            'id' => $uid,
            'role_id' => 1,
            'personal_id' => $pid,
            'username' => 'administrator',
            'password' => Hash::make('admin'),
            'email' => 'admin@mail.com',
            'npsn' => NULL,
            'token_reset' => NULL,
            'status_verify' => 'N',
            'status_account' => 'Y',
            'verify_at' => NULL,
            'last_login' => NULL,
            'created_at' => now(),
            'updated_at' => NULL
        ]);
    }
}

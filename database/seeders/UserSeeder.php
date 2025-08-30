<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate([
            'name' => 'SuperAdmin',
            'email' => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'role_id' => 1,
        ]);

        User::updateOrCreate([
            'name' => 'Binar',
            'email' => 'binar@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('123'),
            'role_id' => 2,
        ]);
    }
}

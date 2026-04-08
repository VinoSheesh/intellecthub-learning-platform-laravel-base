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
        $SuperAdmin = User::updateOrCreate(
            ['email' => 'superadmin@gmail.com'],
            [
                'name' => 'John Superadmin',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'is_active' => true,
            ]
        );
        $SuperAdmin->assignRole('SuperAdmin');

        $Binar = User::updateOrCreate(
            ['email' => 'binar@gmail.com'],
            [
                'name' => 'Binar Academy',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'is_active' => true,
            ]
        );
        $Binar->assignRole('Student');

        $Sarah = User::updateOrCreate(
            ['email' => 'sarah.wijaya@gmail.com'],
            [
                'name' => 'Sarah Wijaya',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'is_active' => true,
            ]
        );
        $Sarah->assignRole('Student');

        $Budi = User::updateOrCreate(
            ['email' => 'budi.santoso@gmail.com'],
            [
                'name' => 'Budi Santoso',
                'email_verified_at' => now(),
                'password' => Hash::make('123'),
                'is_active' => false, // contoh belum aktif
            ]
        );
        $Budi->assignRole('Student');
    }
}

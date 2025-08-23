<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Roles;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Roles::updateOrCreate([
            'name' => 'SuperAdmin',
            'guard_name' => 'web',
        ]);

        Roles::updateOrCreate([
            'name' => 'Guest',
            'guard_name' => 'web',
        ]);

        Roles::updateOrCreate(attributes: [
            'name' => 'Student',
            'guard_name' => 'web',
        ]);

        Roles::updateOrCreate([
            'name' => 'Teacher',
            'guard_name' => 'web',
        ]);
    }
}

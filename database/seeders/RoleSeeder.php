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
            'id' => '1',
            'name' => 'SuperAdmin',
        ]);
        
        Roles::updateOrCreate([
            'id' => '2',
            'name' => 'Guest',
        ]);

        Roles::updateOrCreate([
            'id' => '3',
            'name' => 'Student',
        ]);

        Roles::updateOrCreate([
            'id' => '4',
            'name' => 'Teacher',
        ]);


    }
}

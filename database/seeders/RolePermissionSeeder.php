<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::firstOrCreate(['name'=>'tambah-course']);
        Permission::firstOrCreate(['name'=>'edit-course']);
        Permission::firstOrCreate(['name'=>'hapus-course']);
        Permission::firstOrCreate(['name'=>'lihat-course']);
        Permission::firstOrCreate(['name'=>'admin-dashboard']);

        Role::firstOrCreate(['name' => 'SuperAdmin']);
        Role::firstOrCreate(['name' => 'Student']);
        Role::firstOrCreate(['name' => 'Instructor']);

        $roleAdmin = Role::findByName('SuperAdmin');
        $roleAdmin->givePermissionTo(Permission::all());

        $roleInstructor = Role::findByName('Instructor');
        $roleInstructor->givePermissionTo(['tambah-course', 'edit-course', 'hapus-course', 'lihat-course']);

        $roleStudent = Role::findByName('Student');
        $roleStudent->givePermissionTo(['lihat-course']);
    }
}

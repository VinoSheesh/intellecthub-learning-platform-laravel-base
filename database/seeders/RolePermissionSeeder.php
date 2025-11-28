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
        Permission::create(['name'=>'tambah-course']);
        Permission::create(['name'=>'edit-course']);
        Permission::create(['name'=>'hapus-course']);
        Permission::create(['name'=>'lihat-course']);

        Role::create(['name' => 'SuperAdmin']);
        Role::create(['name' => 'Student']);
        Role::create(['name' => 'Instructor']); // Tambahkan role Instructor

        $roleAdmin = Role::findByName('SuperAdmin');
        $roleAdmin->givePermissionTo(Permission::all());

        $roleInstructor = Role::findByName('Instructor');
        $roleInstructor->givePermissionTo(['tambah-course', 'edit-course', 'hapus-course', 'lihat-course']);

        $roleStudent = Role::findByName('Student');
        $roleStudent->givePermissionTo(['lihat-course']);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categories;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categories::updateOrCreate([
            'name' => 'Programming',
        ]);

        Categories::updateOrCreate([
            'name' => 'Web Development',
        ]);

        Categories::updateOrCreate([
            'name' => 'Data Science',
        ]);
    }
}

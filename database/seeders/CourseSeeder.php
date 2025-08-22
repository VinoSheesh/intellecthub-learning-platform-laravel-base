<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Courses;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courses::updateOrCreate([
            'title' => 'Introduction to Programming',
            'category_id' => 1,
            'description' => 'Learn the basics of programming with this introductory course.',
            'thumbnail' => 'https://example.com/thumbnail1.jpg',
            'instructor_id' => 1,
            'price' => 100000,
        ]);

        Courses::updateOrCreate([
            'title' => 'Advanced Web Development',
            'category_id' => 2,
            'description' => 'Take your web development skills to the next level.',
            'thumbnail' => 'https://example.com/thumbnail2.jpg',
            'instructor_id' => 1,
            'price' => 200000,
        ]);
    }
}

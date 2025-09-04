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
            'id' => 1,
            'title' => 'Introduction to Programming',
            'category_id' => 1,
            'description' => 'Learn the basics of programming with this introductory course.',
            'thumbnail' => '/storage/Laravel.png',
        ]);

        Courses::updateOrCreate([
            'id' => 2,
            'title' => 'Advanced Web Development',
            'category_id' => 2,
            'description' => 'Take your web development skills to the next level.',
            'thumbnail' => '/storage/modulNgoding.png',
        ]);

        Courses::updateOrCreate([
            'id' => 3,
            'title' => 'Jago Public Speaking ala Pak Hitler',
            'category_id' => 3,
            'description' => 'Explore the world of data science and analytics.',
            'thumbnail' => '/storage/jagoPublicSpeaking.webp',
        ]);

        Courses::updateOrCreate([
            'id' => 4,
            'title' => 'Bagaimana agar berwibawa seperti kaisar hirohito',
            'category_id' => 3,
            'description' => 'Explore the world of data science and analytics.',
            'thumbnail' => '/storage/berwibawaHirohito.jpg',
        ]);

        Courses::updateOrCreate([
            'id' => 5,
            'title' => 'Cara agar tidak digantung seperti Benito Mussolini',
            'category_id' => 3,
            'description' => 'Explore the world of data science and analytics.',
            'thumbnail' => '/storage/agarTidakDigantung.jpeg',
        ]);
    }
}

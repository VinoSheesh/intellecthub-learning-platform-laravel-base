<?php

namespace Database\Seeders;

use App\Models\Lesson;
use App\Models\Lessons;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lessons::create([
            'title' => 'Introduction to PHP',
            'content' => 'This lesson covers the basics of PHP programming language.',
            'course_id' => 1,
        ]); 
    }
}

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
        $categories = [
            ['name' => 'Technology & Programming', 'description' => 'Pelajari keterampilan teknologi terpopuler, mulai dari pengembangan web hingga ilmu data.'],
            ['name' => 'Design & Creativity', 'description' => 'Tingkatkan kreativitas Anda dengan kursus desain grafis, UI/UX, dan seni digital.'],
            ['name' => 'Business & Management', 'description' => 'Kembangkan karir Anda dengan ilmu kepemimpinan, pemasaran digital, dan strategi bisnis.'],
            ['name' => 'Personal Development', 'description' => 'Tingkatkan kualitas diri dengan kursus bahasa, produktivitas, dan public speaking.']
        ];

        foreach ($categories as $cat) {
            Categories::updateOrCreate(
                ['name' => $cat['name']],
                ['name' => $cat['name']]
            );
        }
    }
}

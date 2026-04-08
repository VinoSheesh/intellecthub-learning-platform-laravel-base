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
        $courses = [
            [
                'title' => 'JavaScript Mastery: Dari Nol Hingga Profesional',
                'description' => '<h3>Kuasai Bahasa Pemrograman Paling Populer di Dunia</h3><p>JavaScript adalah jantung dari setiap website modern yang interaktif. Dalam kursus komprehensif ini, Anda akan memulai perjalanan dari fondasi terkuat — variabel, tipe data, dan logika kondisional — hingga menguasai konsep lanjutan seperti <strong>Promises</strong>, <strong>Async/Await</strong>, dan <strong>ES6+ Modern Syntax</strong>.</p><p>Di akhir kursus, Anda akan mampu membangun aplikasi web dinamis yang sesungguhnya dari nol, tanpa bergantung pada framework apapun terlebih dahulu.</p><ul><li>Sintaks ES6+ (Arrow Function, Destructuring, Spread Operator)</li><li>DOM Manipulation & Event Handling tingkat lanjut</li><li>Pemrograman Asinkron (Fetch API, Async/Await)</li><li>OOP dengan Class & Prototypal Inheritance</li><li>Mini Project: Build To-Do App & Weather App</li></ul>',
                'category_id' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'HTML5 Profesional: Fondasi Kuat Web Developer Modern',
                'description' => '<h3>Bangun Struktur Website yang Kokoh, Semantik & Aksesibel</h3><p>Banyak developer meremehkan HTML karena dianggap "mudah". Faktanya, penulisan HTML yang buruk adalah akar dari sebagian besar masalah performa, SEO, dan aksesibilitas website. Kursus ini akan membongkar semua kekeliruan tersebut.</p><p>Anda akan belajar cara menulis HTML yang <em>semantik</em>, struktural benar, dan ramah bagi mesin pencari sekaligus penyandang disabilitas.</p><ul><li>Semantic HTML5 (header, main, article, section, aside)</li><li>Form & Validasi HTML Native yang Powerful</li><li>Embedding Media: Video, Audio, Canvas & SVG</li><li>SEO On-Page Dasar melalui HTML yang Benar</li><li>Web Accessibility (ARIA Roles & Landmark)</li></ul>',
                'category_id' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'CSS Modern & Responsive Design: Seni Membangun Tampilan Web',
                'description' => '<h3>Desain Website Memukau yang Tampil Sempurna di Semua Layar</h3><p>CSS bukan sekadar pewarna teks dan pengatur margin. Di tangan yang tepat, CSS adalah alat seni yang mampu menghasilkan animasi sinematik, layout yang adaptif, dan antarmuka yang memikat. Kursus ini dirancang untuk mengubah Anda dari seorang yang takut CSS menjadi seorang CSS Artisan.</p><ul><li>Flexbox & CSS Grid untuk layout modern yang presisi</li><li>CSS Custom Properties (Variables) untuk design system</li><li>Animasi & Transisi CSS (Keyframes, Transform, Transition)</li><li>Responsive Design dengan Mobile-First Approach</li><li>Glassmorphism, Neumorphism & Tren Desain Modern</li><li>Project Akhir: Landing Page Premium Responsif</li></ul>',
                'category_id' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'Laravel 11 Lengkap: Bangun Aplikasi Web Full-Stack Berkelas',
                'description' => '<h3>Framework PHP Terpopuler untuk Aplikasi Enterprise Berkualitas Tinggi</h3><p>Laravel bukan sekadar framework, melainkan sebuah filosofi dalam membangun perangkat lunak yang elegan, terstruktur, dan skalabel. Dalam kursus ini, Anda akan memahami Laravel dari dalam ke luar — mulai dari konsep MVC, Eloquent ORM, hingga deployment ke server produksi.</p><p>Kursus ini cocok untuk Anda yang sudah memahami dasar PHP dan ingin meningkatkan skill ke level profesional yang dipakai oleh startup dan perusahaan teknologi terkemuka.</p><ul><li>Arsitektur MVC & Request Lifecycle Laravel</li><li>Eloquent ORM, Relationships & Query Builder</li><li>Authentication & Authorization (Gates & Policies)</li><li>RESTful API dengan Laravel Sanctum</li><li>Job Queues, Events & Real-time dengan Broadcasting</li><li>Testing dengan PHPUnit & Pest</li></ul>',
                'category_id' => 1,
                'is_published' => true,
            ],
            [
                'title' => 'React JS 19: Membangun UI Interaktif Skala Enterprise',
                'description' => '<h3>Library JavaScript Terdepan untuk Antarmuka Modern yang Reaktif</h3><p>React telah mengubah cara dunia membangun antarmuka pengguna. Dengan paradigma <strong>Component-Based Architecture</strong> dan ekosistemnya yang luar biasa, React adalah skill wajib bagi setiap frontend developer masa kini. Kursus ini akan membawa Anda melampaui tutorial biasa.</p><p>Kita tidak hanya belajar sintaks — kita membangun <em>mental model</em> yang benar tentang cara React bekerja dari dalamnya, sehingga Anda bisa men-debug masalah apapun dengan percaya diri.</p><ul><li>React Hooks Mendalam (useState, useEffect, useContext, useReducer)</li><li>Custom Hooks untuk logika yang reusable</li><li>State Management dengan Zustand & Context API</li><li>React Router v6 untuk navigasi SPA</li><li>Fetching Data dengan TanStack Query (React Query)</li><li>Project Akhir: Build Full E-Commerce Frontend</li></ul>',
                'category_id' => 1,
                'is_published' => true,
            ],
        ];

        foreach ($courses as $course) {
            Courses::updateOrCreate(
                ['title' => $course['title']],
                $course
            );
        }
    }
}

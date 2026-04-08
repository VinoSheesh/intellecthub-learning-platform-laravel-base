<?php

namespace Database\Seeders;

use App\Models\Lessons;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    public function run(): void
    {
        $lessons = [

            // ==========================================
            // Course 1: JavaScript Mastery
            // ==========================================
            [
                'title' => 'Bab 1: Mengenal JavaScript & Ekosistemnya',
                'content' => '<h2>Mengapa JavaScript Itu Wajib Dipelajari?</h2><p>JavaScript adalah satu-satunya bahasa pemrograman yang dapat berjalan langsung di browser tanpa instalasi apapun. Dengan JavaScript, sebuah halaman web yang sebelumnya statis bisa berubah menjadi aplikasi yang hidup dan responsif terhadap aksi pengguna.</p><blockquote>"JavaScript is the duct tape of the Internet." — Charlie Campbell</blockquote><p>Di bab pengantar ini, kita akan membahas sejarah singkat JavaScript, perbedaan antara <strong>runtime Node.js</strong> dan <strong>browser environment</strong>, serta cara menjalankan kode JavaScript pertama Anda langsung di konsol browser.</p><h3>Tugas Praktis</h3><p>Buka DevTools browser Anda (tekan <code>F12</code>), masuk ke tab <strong>Console</strong>, dan ketikkan: <code>console.log("Halo, Dunia JavaScript!")</code>. Selamat datang di dunia pemrograman web!</p>',
                'course_id' => 1,
                'order' => 1,
            ],
            [
                'title' => 'Bab 2: Variabel, Tipe Data & Operator',
                'content' => '<h2>Fondasi Bahasa: Menyimpan & Memanipulasi Data</h2><p>Setiap program komputer pada dasarnya adalah tentang data — menyimpannya, mengubahnya, dan menampilkannya. Di JavaScript modern, kita mengenal tiga cara mendeklarasikan variabel: <code>var</code> (hindari!), <code>let</code>, dan <code>const</code>.</p><h3>Tipe Data Primitif</h3><ul><li><strong>String</strong>: Teks, ditulis dalam tanda kutip <code>"Hello"</code></li><li><strong>Number</strong>: Angka, baik integer maupun desimal</li><li><strong>Boolean</strong>: Nilai <code>true</code> atau <code>false</code></li><li><strong>null</strong>: Nilai kosong yang disengaja</li><li><strong>undefined</strong>: Variabel yang belum diberi nilai</li></ul><p>Gunakan operator <code>typeof</code> untuk memeriksa tipe data sebuah variabel secara dinamis.</p>',
                'course_id' => 1,
                'order' => 2,
            ],
            [
                'title' => 'Bab 3: Kontrol Alur (if, else, switch, loop)',
                'content' => '<h2>Membuat Program yang Berpikir & Mengulang</h2><p>Program yang baik mampu membuat keputusan berdasarkan kondisi. Di sinilah struktur kontrol berperan. Mulai dari <code>if/else</code> sederhana untuk percabangan logis, hingga <code>for</code>, <code>while</code>, dan <code>for...of</code> untuk iterasi data.</p><p>Contoh penggunaan <code>for...of</code> yang modern dan elegan:</p><pre><code>const fruits = ["apel", "mangga", "jeruk"];\nfor (const fruit of fruits) {\n  console.log(`Saya suka ${fruit}`);\n}</code></pre><p>Kuasai struktur kontrol ini, dan Anda sudah memiliki 70% dari kemampuan berpikir seorang programmer.</p>',
                'course_id' => 1,
                'order' => 3,
            ],
            [
                'title' => 'Bab 4: Function & Arrow Function Modern',
                'content' => '<h2>Membangun Blok Kode yang Dapat Digunakan Ulang</h2><p>Function adalah jantung dari setiap program JavaScript. Pelajari perbedaan antara <strong>Function Declaration</strong>, <strong>Function Expression</strong>, dan <strong>Arrow Function</strong> yang diperkenalkan ES6.</p><p>Arrow function bukan sekadar sintaks yang lebih pendek — ia memiliki perilaku berbeda pada <code>this</code> binding yang sangat krusial saat Anda bekerja dengan method dalam object dan class.</p><pre><code>// Function biasa\nfunction greet(name) { return `Halo, ${name}!`; }\n\n// Arrow function\nconst greet = (name) => `Halo, ${name}!`;</code></pre>',
                'course_id' => 1,
                'order' => 4,
            ],
            [
                'title' => 'Bab 5: DOM Manipulation & Event Handling',
                'content' => '<h2>Membuat Halaman Web Bereaksi terhadap Pengguna</h2><p>DOM (Document Object Model) adalah representasi pohon dari struktur HTML Anda di dalam memori browser. Dengan JavaScript, kita dapat memilih elemen, mengubah kontennya, menambah/menghapus elemen, bahkan mengubah style-nya secara dinamis.</p><p>Metodologi modern menggunakan <code>querySelector</code> dan <code>addEventListener</code> untuk interaksi yang bersih dan terstruktur.</p><pre><code>const btn = document.querySelector("#myButton");\nbtn.addEventListener("click", () => {\n  document.querySelector("#output").textContent = "Tombol diklik!";\n});</code></pre>',
                'course_id' => 1,
                'order' => 5,
            ],
            [
                'title' => 'Bab 6: Async JavaScript — Fetch API & Async/Await',
                'content' => '<h2>Berkomunikasi dengan Server Tanpa Membekukan Browser</h2><p>Salah satu konsep paling penting sekaligus paling membingungkan bagi pemula adalah <strong>Asynchronous Programming</strong>. Saat browser mengambil data dari server, ia tidak boleh membekukan seluruh halaman menunggu respons. Di sinilah Promises dan Async/Await hadir sebagai solusi elegan.</p><pre><code>async function getUser() {\n  try {\n    const response = await fetch("https://api.example.com/user/1");\n    const data = await response.json();\n    console.log(data);\n  } catch (error) {\n    console.error("Gagal mengambil data:", error);\n  }\n}</code></pre>',
                'course_id' => 1,
                'order' => 6,
            ],
            [
                'title' => 'Bab 7: Mini Project — Aplikasi To-Do List Interaktif',
                'content' => '<h2>Menggabungkan Semua Yang Telah Dipelajari</h2><p>Saatnya membuktikan kemampuan Anda! Di bab final ini, kita membangun sebuah aplikasi <strong>To-Do List</strong> yang fungsional menggunakan vanilla JavaScript murni — tanpa framework apapun. Fitur yang akan dibangun:</p><ul><li>Menambah task baru melalui form input</li><li>Menandai task sebagai selesai (toggle)</li><li>Menghapus task individual</li><li>Menyimpan data ke <code>localStorage</code> agar tidak hilang saat browser ditutup</li><li>Filter tampilan: Semua / Aktif / Selesai</li></ul><blockquote>Selamat! Anda kini telah menjadi seorang JavaScript Developer yang sesungguhnya.</blockquote>',
                'course_id' => 1,
                'order' => 7,
            ],

            // ==========================================
            // Course 2: HTML5 Profesional
            // ==========================================
            [
                'title' => 'Bab 1: Anatomi HTML & Cara Browser Membaca Kode Anda',
                'content' => '<h2>Apa yang Sebenarnya Terjadi Saat Browser Membuka Website?</h2><p>Sebelum menulis satu baris HTML pun, sangat penting memahami apa yang terjadi di balik layar. Browser menerima teks HTML mentah dari server, lalu membangun sebuah pohon hierarki yang disebut <strong>DOM (Document Object Model)</strong>. Pohon inilah yang kemudian dirender menjadi tampilan visual yang Anda lihat.</p><p>Struktur dasar sebuah dokumen HTML yang benar dan lengkap selalu dimulai dengan deklarasi DOCTYPE, diikuti elemen <code>html</code>, <code>head</code>, dan <code>body</code>.</p><pre><code>&lt;!DOCTYPE html&gt;\n&lt;html lang="id"&gt;\n&lt;head&gt;\n  &lt;meta charset="UTF-8"&gt;\n  &lt;title&gt;Halaman Saya&lt;/title&gt;\n&lt;/head&gt;\n&lt;body&gt;\n  &lt;h1&gt;Halo Dunia!&lt;/h1&gt;\n&lt;/body&gt;\n&lt;/html&gt;</code></pre>',
                'course_id' => 2,
                'order' => 1,
            ],
            [
                'title' => 'Bab 2: Semantic HTML5 — Menulis Kode yang Bermakna',
                'content' => '<h2>Mengapa <code>&lt;div&gt;</code> Saja Tidak Cukup?</h2><p>Bayangkan sebuah buku tanpa judul bab, tanpa penomoran halaman, tanpa daftar isi. Itulah yang terjadi jika Anda membangun seluruh website hanya dengan <code>&lt;div&gt;</code> dan <code>&lt;span&gt;</code>. Google dan screen reader tidak bisa memahami konteks konten Anda.</p><p>HTML5 memperkenalkan elemen-elemen semantik yang memberikan <em>makna</em> pada struktur dokumen Anda:</p><ul><li><strong>&lt;header&gt;</strong>: Kepala halaman atau seksi</li><li><strong>&lt;nav&gt;</strong>: Menu navigasi utama</li><li><strong>&lt;main&gt;</strong>: Konten utama halaman (hanya satu per halaman!)</li><li><strong>&lt;article&gt;</strong>: Konten mandiri seperti posting blog</li><li><strong>&lt;section&gt;</strong>: Pengelompokan konten bertema</li><li><strong>&lt;aside&gt;</strong>: Konten sampingan / sidebar</li><li><strong>&lt;footer&gt;</strong>: Kaki halaman</li></ul>',
                'course_id' => 2,
                'order' => 2,
            ],
            [
                'title' => 'Bab 3: Form HTML5 & Validasi Native yang Powerful',
                'content' => '<h2>Mengumpulkan Data Pengguna dengan Aman & Efisien</h2><p>Form adalah elemen HTML yang paling interaktif dan paling sering digunakan dalam setiap aplikasi web. HTML5 telah secara dramatis meningkatkan kemampuan form dengan atribut validasi bawaan yang tidak memerlukan JavaScript sama sekali.</p><ul><li><code>required</code> — wajib diisi</li><li><code>type="email"</code> — validasi format email otomatis</li><li><code>type="number" min="1" max="100"</code> — batasan angka</li><li><code>pattern="[A-Za-z]{3}"</code> — validasi dengan regex</li></ul><p>Manfaatkan atribut <code>novalidate</code> pada tag form jika Anda ingin menangani validasi sendiri via JavaScript untuk UX yang lebih kustom.</p>',
                'course_id' => 2,
                'order' => 3,
            ],
            [
                'title' => 'Bab 4: Multimedia — Video, Audio & Canvas',
                'content' => '<h2>Memperkaya Pengalaman Pengguna dengan Konten Kaya</h2><p>Sebelum HTML5, embedding video di website memerlukan plugin Flash yang berat dan tidak aman. Kini, elemen <code>&lt;video&gt;</code> dan <code>&lt;audio&gt;</code> bawaan HTML5 memberikan solusi yang native, ringan, dan SEO-friendly.</p><pre><code>&lt;video controls width="640" poster="thumbnail.jpg"&gt;\n  &lt;source src="video.mp4" type="video/mp4"&gt;\n  Browser Anda tidak mendukung tag video.\n&lt;/video&gt;</code></pre><p>Sedangkan <code>&lt;canvas&gt;</code> membuka pintu untuk menggambar grafis 2D/3D secara programatik menggunakan JavaScript. Ini adalah fondasi dari game browser dan visualisasi data.</p>',
                'course_id' => 2,
                'order' => 4,
            ],
            [
                'title' => 'Bab 5: SEO & Aksesibilitas — HTML yang Ramah Semua Pihak',
                'content' => '<h2>Menulis Kode untuk Manusia, Mesin, dan Penyandang Disabilitas</h2><p>Website yang aksesibel bukan hanya etis secara moral — ia juga mendapat peringkat lebih tinggi di Google. Pelajari ARIA (Accessible Rich Internet Applications) roles yang membantu pengguna pembaca layar memahami antarmuka Anda.</p><ul><li>Gunakan atribut <code>alt</code> yang deskriptif pada semua gambar</li><li>Pastikan urutan heading logis: H1 → H2 → H3</li><li>Gunakan <code>aria-label</code> untuk elemen interaktif tanpa teks</li><li>Uji dengan keyboard-only navigation (Tab, Enter, Escape)</li></ul><p>Struktur HTML yang rapi juga merupakan fondasi SEO on-page terbaik yang gratis dan permanen.</p>',
                'course_id' => 2,
                'order' => 5,
            ],
            [
                'title' => 'Bab 6: Project — Bangun Profil Website Pribadi',
                'content' => '<h2>Portfolio Pertama Anda dengan HTML Murni</h2><p>Di bab penutup ini, kita membangun sebuah halaman <strong>profil personal / CV online</strong> menggunakan semua yang telah dipelajari. Halaman ini akan mencakup:</p><ul><li>Header dengan foto dan nama menggunakan elemen semantik</li><li>Navigasi antar seksi dengan anchor link</li><li>Seksi About Me dengan paragraf terstruktur</li><li>Seksi Skills menggunakan list HTML</li><li>Form kontak yang tervalidasi secara native</li><li>Footer dengan informasi hak cipta</li></ul><blockquote>HTML yang rapi adalah tanda penghormatan Anda terhadap pengguna dan rekan kerja sesama developer.</blockquote>',
                'course_id' => 2,
                'order' => 6,
            ],

            // ==========================================
            // Course 3: CSS Modern & Responsive Design
            // ==========================================
            [
                'title' => 'Bab 1: Cascade, Specificity & Box Model — Tiga Pilar CSS',
                'content' => '<h2>Memahami "Mengapa Style Saya Tidak Mau Diterapkan?"</h2><p>Pertanyaan itu pasti pernah Anda alami. Jawabannya selalu ada di tiga konsep fundamental ini. <strong>Cascade</strong> adalah urutan prioritas aturan CSS. <strong>Specificity</strong> adalah "bobot" dari selector Anda. Dan <strong>Box Model</strong> adalah model kotak yang membungkus setiap elemen HTML.</p><p>Setiap elemen HTML pada dasarnya adalah sebuah kotak persegi yang terdiri dari empat lapisan:</p><ul><li><strong>Content</strong>: Area isi sebenarnya</li><li><strong>Padding</strong>: Ruang dalam antara konten dan border</li><li><strong>Border</strong>: Garis pembatas elemen</li><li><strong>Margin</strong>: Ruang luar antar elemen</li></ul><p>Gunakan <code>box-sizing: border-box</code> secara global untuk menghindari kalkulasi lebar yang membingungkan.</p>',
                'course_id' => 3,
                'order' => 1,
            ],
            [
                'title' => 'Bab 2: Flexbox — Layout Satu Dimensi yang Fleksibel',
                'content' => '<h2>Lupakan Float, Selamat Datang Era Flexbox</h2><p>Flexbox (Flexible Box Layout) merevolusi cara kita membuat layout. Dengan hanya beberapa properti, kita bisa memusatkan elemen secara vertikal (hal yang dulunya sangat sulit), mendistribusikan ruang antar elemen, dan membalik urutan tampilan.</p><pre><code>.container {\n  display: flex;\n  justify-content: space-between; /* horizontal */\n  align-items: center; /* vertikal */\n  gap: 1rem;\n}</code></pre><p>Kuasai properti-properti utama: <code>flex-direction</code>, <code>flex-wrap</code>, <code>justify-content</code>, <code>align-items</code>, <code>flex-grow</code>, dan <code>flex-shrink</code>.</p>',
                'course_id' => 3,
                'order' => 2,
            ],
            [
                'title' => 'Bab 3: CSS Grid — Layout Dua Dimensi yang Presisi',
                'content' => '<h2>Mengatur Baris dan Kolom Layaknya Arsitek Digital</h2><p>Jika Flexbox adalah untuk layout satu arah (baris atau kolom), maka CSS Grid adalah untuk layout dua dimensi sekaligus. Grid adalah sistem tata letak terkuat yang pernah hadir di CSS.</p><pre><code>.grid-container {\n  display: grid;\n  grid-template-columns: repeat(3, 1fr);\n  grid-template-rows: auto;\n  gap: 1.5rem;\n}</code></pre><p>Dengan Grid, Anda bisa membuat layout majalah yang kompleks, dashboard bento-style, atau galeri foto responsif hanya dalam beberapa baris CSS. Tidak ada yang bisa menandingi kekuatan Grid untuk layout halaman utuh.</p>',
                'course_id' => 3,
                'order' => 3,
            ],
            [
                'title' => 'Bab 4: CSS Custom Properties & Design System',
                'content' => '<h2>Satu Sumber Kebenaran untuk Seluruh Desain Anda</h2><p>CSS Custom Properties (sering disebut CSS Variables) memungkinkan Anda mendefinisikan nilai desain di satu tempat dan menggunakannya di mana saja. Ini adalah fondasi dari sebuah <em>Design System</em> yang konsisten dan mudah diubah.</p><pre><code>:root {\n  --color-primary: #6366f1;\n  --color-bg: #0f172a;\n  --font-size-base: 1rem;\n  --border-radius: 0.5rem;\n  --shadow: 0 4px 6px rgba(0,0,0,0.1);\n}\n\n.button {\n  background: var(--color-primary);\n  border-radius: var(--border-radius);\n}</code></pre><p>Ubah satu variabel di <code>:root</code>, dan seluruh tampilan website berubah secara konsisten. Inilah kekuatan sejati CSS Variables.</p>',
                'course_id' => 3,
                'order' => 4,
            ],
            [
                'title' => 'Bab 5: Animasi & Transisi CSS yang Memukau',
                'content' => '<h2>Menghidupkan Antarmuka dengan Gerakan yang Bermakna</h2><p>Animasi bukan sekadar hiasan — animasi yang tepat memberikan konteks, memandu perhatian pengguna, dan membuat antarmuka terasa hidup. CSS menyediakan dua mekanisme animasi: <strong>Transition</strong> (untuk perubahan status) dan <strong>Animation/Keyframes</strong> (untuk gerakan berulang atau kompleks).</p><pre><code>/* Hover effect elegan */\n.card {\n  transition: transform 0.3s ease, box-shadow 0.3s ease;\n}\n.card:hover {\n  transform: translateY(-8px);\n  box-shadow: 0 20px 40px rgba(0,0,0,0.2);\n}\n\n/* Animasi keyframe */\n@keyframes fadeIn {\n  from { opacity: 0; transform: translateY(20px); }\n  to { opacity: 1; transform: translateY(0); }\n}</code></pre>',
                'course_id' => 3,
                'order' => 5,
            ],
            [
                'title' => 'Bab 6: Responsive Design & Mobile-First Approach',
                'content' => '<h2>Website yang Tampil Sempurna di Semua Ukuran Layar</h2><p>Lebih dari 60% traffic internet kini berasal dari perangkat mobile. Mengabaikan mobile bukan hanya UX yang buruk — itu adalah kehilangan bisnis secara nyata. Metodologi <strong>Mobile-First</strong> menganjurkan kita untuk mendesain tampilan mobile terlebih dahulu, lalu secara progresif menambahkan kompleksitas untuk layar yang lebih besar.</p><pre><code>/* Base: Mobile */\n.card-grid { grid-template-columns: 1fr; }\n\n/* Tablet: >= 768px */\n@media (min-width: 768px) {\n  .card-grid { grid-template-columns: repeat(2, 1fr); }\n}\n\n/* Desktop: >= 1024px */\n@media (min-width: 1024px) {\n  .card-grid { grid-template-columns: repeat(3, 1fr); }\n}</code></pre>',
                'course_id' => 3,
                'order' => 6,
            ],
            [
                'title' => 'Bab 7: Project Akhir — Landing Page Premium Responsif',
                'content' => '<h2>Pameran Kemampuan CSS Anda yang Sesungguhnya</h2><p>Di bab penutup yang paling mengasyikkan ini, kita membangun sebuah <strong>Landing Page Produk</strong> yang premium dan fully responsive dari nol. Komponennya meliputi:</p><ul><li>Glassmorphism Navbar dengan backdrop-filter</li><li>Hero Section dengan animasi teks masuk (fade-in)</li><li>Bento Grid Feature Section menggunakan CSS Grid</li><li>Testimonial Cards dengan efek hover 3D</li><li>CTA Section dengan gradient animasi</li><li>Footer multi-kolom responsif</li></ul><blockquote>Selamat! Anda kini adalah seorang CSS Artisan yang memiliki portofolio yang bisa dibanggakan.</blockquote>',
                'course_id' => 3,
                'order' => 7,
            ],

            // ==========================================
            // Course 4: Laravel 11 Lengkap
            // ==========================================
            [
                'title' => 'Bab 1: Instalasi & Arsitektur Laravel 11',
                'content' => '<h2>Memahami Fondasi Framework Sebelum Membangun di Atasnya</h2><p>Laravel 11 membawa perubahan besar pada struktur aplikasi — lebih ramping, lebih sedikit file boilerplate, namun jauh lebih powerful. Di bab pertama ini, kita melakukan instalasi via Composer dan memahami setiap folder dalam struktur direktori Laravel.</p><pre><code>composer create-project laravel/laravel my-app\ncd my-app\nphp artisan serve</code></pre><p>Kenali alur <strong>Request Lifecycle</strong>: Mulai dari HTTP request masuk melalui <code>public/index.php</code>, melewati middleware, diarahkan oleh Router, diproses Controller, hingga response dikirim balik ke browser. Memahami siklus ini adalah fondasi dari segala sesuatu di Laravel.</p>',
                'course_id' => 4,
                'order' => 1,
            ],
            [
                'title' => 'Bab 2: Routing, Controller & Blade Template',
                'content' => '<h2>Arsitektur MVC dalam Praktik Nyata</h2><p>Routing di Laravel adalah peta jalan aplikasi Anda. File <code>routes/web.php</code> adalah titik pertama yang menentukan: URL ini ditangani oleh siapa? Di sinilah kita menghubungkan URL dengan Controller yang tepat.</p><pre><code>Route::get(\'/courses\', [CourseController::class, \'index\'])-&gt;name(\'courses.index\');\nRoute::resource(\'courses\', CourseController::class);</code></pre><p>Blade, sebagai template engine Laravel, jauh lebih dari sekadar PHP biasa. Dengan direktif seperti <code>@foreach</code>, <code>@if</code>, <code>@component</code>, <code>@yield</code>, dan <code>@extends</code>, Anda membangun tampilan yang terstruktur dengan inheritance layout yang elegan.</p>',
                'course_id' => 4,
                'order' => 2,
            ],
            [
                'title' => 'Bab 3: Eloquent ORM & Database Relationships',
                'content' => '<h2>Bicara dengan Database Layaknya Berbicara dengan Objek PHP</h2><p>Eloquent adalah ORM (Object-Relational Mapper) bawaan Laravel yang mengubah tabel database menjadi class PHP yang ekspresif. Tidak ada lagi query SQL mentah yang rawan human error dan SQL injection.</p><pre><code>// Tanpa Eloquent (rentan injeksi)\n$users = DB::select("SELECT * FROM users WHERE active = 1");\n\n// Dengan Eloquent (aman & ekspresif)\n$users = User::where(\'active\', true)->with(\'profile\')->get();</code></pre><p>Pelajari semua jenis relasi: <strong>hasOne</strong>, <strong>hasMany</strong>, <strong>belongsTo</strong>, <strong>belongsToMany</strong>, dan <strong>hasManyThrough</strong>. Relasi Eloquent adalah senjata terkuat Anda dalam membangun aplikasi yang kompleks.</p>',
                'course_id' => 4,
                'order' => 3,
            ],
            [
                'title' => 'Bab 4: Authentication, Gates & Policies',
                'content' => '<h2>Mengamankan Aplikasi dari Akses yang Tidak Berwenang</h2><p>Laravel menyediakan sistem autentikasi yang robust dan siap pakai. Di era modern, kita menggunakan <strong>Laravel Breeze</strong> atau <strong>Laravel Jetstream</strong> sebagai scaffolding awal, kemudian mengkustomisasinya sesuai kebutuhan.</p><p>Setelah autentikasi, datanglah otorisasi. Laravel menawarkan dua mekanisme:</p><ul><li><strong>Gates</strong>: Penutupan (Closure) sederhana untuk otorisasi cepat berbasis kondisi</li><li><strong>Policies</strong>: Class terstruktur untuk otorisasi terkait Model spesifik</li></ul><pre><code>// Policy: Hanya pemilik kursus yang bisa menghapusnya\npublic function delete(User $user, Course $course): bool {\n  return $user->id === $course->user_id;\n}</code></pre>',
                'course_id' => 4,
                'order' => 4,
            ],
            [
                'title' => 'Bab 5: RESTful API dengan Laravel Sanctum',
                'content' => '<h2>Membangun Backend API yang Siap Dikonsumsi Aplikasi Apapun</h2><p>Di era aplikasi mobile dan SPA (Single Page Application), backend Laravel harus mampu menjadi API server yang handal. Laravel Sanctum menyediakan sistem autentikasi berbasis token yang ringan, cocok untuk SPA dan aplikasi mobile.</p><pre><code>// routes/api.php\nRoute::middleware(\'auth:sanctum\')->group(function () {\n  Route::apiResource(\'courses\', CourseController::class);\n  Route::get(\'/user\', fn(Request $r) => $r->user());\n});</code></pre><p>Kita juga membahas best practice dalam mendesain API: penggunaan HTTP status code yang tepat, API versioning, dan transformasi data menggunakan <strong>API Resources</strong>.</p>',
                'course_id' => 4,
                'order' => 5,
            ],
            [
                'title' => 'Bab 6: Queue, Jobs & Performance Optimization',
                'content' => '<h2>Membangun Aplikasi yang Cepat & Skalabel</h2><p>Bayangkan pengguna mendaftar dan sistem harus mengirim email sambutan, membuat thumbnail foto profil, dan mencatat log aktivitas — semua di satu request yang sama. Hasilnya? Laman loading lambat dan pengguna frustrasi.</p><p>Solusinya adalah <strong>Laravel Queues & Jobs</strong>. Pekerjaan berat didelegasikan ke background worker, sehingga response ke pengguna tetap instan.</p><pre><code>// Mendispatch sebuah Job ke background\nSendWelcomeEmail::dispatch($user)->onQueue(\'emails\');</code></pre><p>Kita juga membahas optimasi N+1 Query Problem menggunakan <strong>Eager Loading</strong>, caching dengan Laravel Cache (Redis/Memcached), dan penggunaan Scout untuk full-text search.</p>',
                'course_id' => 4,
                'order' => 6,
            ],
            [
                'title' => 'Bab 7: Testing & Deployment ke Production',
                'content' => '<h2>Kode yang Teruji adalah Kode yang Terpercaya</h2><p>Developer profesional tidak hanya menulis kode yang berjalan — mereka menulis kode yang <em>terbukti</em> berjalan. Laravel hadir dengan dukungan testing kelas dunia menggunakan <strong>PHPUnit</strong> dan <strong>Pest PHP</strong> yang lebih modern dan ekspresif.</p><pre><code>// Test menggunakan Pest\nit(\'can create a new course\', function () {\n  $user = User::factory()->create();\n  $response = $this->actingAs($user)\n    ->post(\'/courses\', [\'title\' => \'Test Course\']);\n  $response->assertRedirect();\n  $this->assertDatabaseHas(\'courses\', [\'title\' => \'Test Course\']);\n});</code></pre><p>Di segmen akhir, kita melakukan deployment ke VPS menggunakan Nginx, menjalankan migrasi production, dan mengkonfigurasi supervisor untuk queue worker.</p>',
                'course_id' => 4,
                'order' => 7,
            ],

            // ==========================================
            // Course 5: React JS 19
            // ==========================================
            [
                'title' => 'Bab 1: Mengenal React & Cara Berpikirnya',
                'content' => '<h2>Paradigma Baru dalam Membangun UI</h2><p>React memperkenalkan cara berpikir baru: antarmuka pengguna adalah fungsi dari data (state). Ubah data, UI otomatis memperbarui dirinya sendiri. Konsep ini terdengar sederhana, namun implikasinya sangat dalam terhadap cara kita mengarsitektur aplikasi.</p><p>Di bab pertama ini, kita memahami apa itu <strong>JSX</strong> (sintaks seperti HTML di dalam JavaScript), apa itu <strong>Component</strong> (blok bangunan UI yang reusable), dan bagaimana aliran data bekerja di React (selalu dari atas ke bawah / one-way data flow).</p><pre><code>// Komponen React pertama Anda\nfunction Greeting({ name }) {\n  return &lt;h1&gt;Halo, {name}!&lt;/h1&gt;;\n}\n\n// Penggunaan\n&lt;Greeting name="Budi" /&gt;</code></pre>',
                'course_id' => 5,
                'order' => 1,
            ],
            [
                'title' => 'Bab 2: useState & useEffect — Dua Hook Terpenting',
                'content' => '<h2>Mengelola State Lokal & Efek Samping Komponen</h2><p><strong>useState</strong> adalah hook yang memungkinkan sebuah komponen mengingat sesuatu antar render. Setiap kali state berubah, React secara otomatis merender ulang komponen tersebut dengan data terbaru.</p><pre><code>const [count, setCount] = useState(0);\nconst [user, setUser] = useState(null);</code></pre><p><strong>useEffect</strong> adalah hook untuk "efek samping" — operasi yang terjadi di luar render cycle seperti fetch data dari API, subscription event, atau memanipulasi DOM secara langsung.</p><pre><code>useEffect(() => {\n  fetch(\'/api/user\')\n    .then(res => res.json())\n    .then(data => setUser(data));\n}, []); // [] berarti hanya berjalan sekali saat mount</code></pre>',
                'course_id' => 5,
                'order' => 2,
            ],
            [
                'title' => 'Bab 3: Props, Component Composition & Lifting State Up',
                'content' => '<h2>Membangun Hierarki Komponen yang Cerdas</h2><p>Props adalah mekanisme utama komunikasi antar komponen di React — dari komponen induk ke komponen anak. Ini adalah penerapan dari prinsip <em>one-way data flow</em> yang membuat aplikasi React mudah untuk di-debug dan diprediksi.</p><p>Namun bagaimana jika dua komponen saudara (sibling) perlu berbagi data? Jawabannya adalah <strong>Lifting State Up</strong> — memindahkan state ke komponen induk yang menjadi nenek moyang bersama, lalu meneruskan data dan fungsi pengubahannya via props.</p><p>Konsep <strong>Component Composition</strong> menggunakan props <code>children</code> memungkinkan pembuatan komponen yang jauh lebih fleksibel dibanding inheritance class.</p>',
                'course_id' => 5,
                'order' => 3,
            ],
            [
                'title' => 'Bab 4: Custom Hooks & Reusable Logic',
                'content' => '<h2>Mengekstrak Logika Menjadi Fungsi yang Dapat Digunakan Ulang</h2><p>Salah satu kekuatan terbesar React adalah kemampuannya untuk mengabstraksi logika stateful ke dalam <strong>Custom Hooks</strong> — fungsi JavaScript biasa yang namanya dimulai dengan <code>use</code>. Ini memungkinkan pembagian logika antar komponen tanpa perlu menyentuh hierarki komponen.</p><pre><code>// Custom Hook: useFetch\nfunction useFetch(url) {\n  const [data, setData] = useState(null);\n  const [loading, setLoading] = useState(true);\n  const [error, setError] = useState(null);\n\n  useEffect(() => {\n    fetch(url)\n      .then(res => res.json())\n      .then(setData)\n      .catch(setError)\n      .finally(() => setLoading(false));\n  }, [url]);\n\n  return { data, loading, error };\n}</code></pre>',
                'course_id' => 5,
                'order' => 4,
            ],
            [
                'title' => 'Bab 5: React Router v6 & Navigasi SPA',
                'content' => '<h2>Membuat Aplikasi Multi-Halaman Tanpa Reload Browser</h2><p>Salah satu daya tarik utama React adalah kemampuannya membangun <strong>Single Page Application (SPA)</strong> — pengguna berpindah "halaman" tanpa browser harus memuat ulang seluruh halaman. Semua ini dimungkinkan oleh React Router.</p><pre><code>import { BrowserRouter, Routes, Route } from \'react-router-dom\';\n\nfunction App() {\n  return (\n    &lt;BrowserRouter&gt;\n      &lt;Routes&gt;\n        &lt;Route path="/" element={&lt;HomePage /&gt;} /&gt;\n        &lt;Route path="/courses" element={&lt;CoursesPage /&gt;} /&gt;\n        &lt;Route path="/courses/:id" element={&lt;CourseDetailPage /&gt;} /&gt;\n        &lt;Route path="*" element={&lt;NotFoundPage /&gt;} /&gt;\n      &lt;/Routes&gt;\n    &lt;/BrowserRouter&gt;\n  );\n}</code></pre>',
                'course_id' => 5,
                'order' => 5,
            ],
            [
                'title' => 'Bab 6: State Management Global dengan Zustand',
                'content' => '<h2>Mengelola State Aplikasi yang Kompleks dengan Elegan</h2><p>Saat aplikasi tumbuh, passing props melewati banyak lapisan komponen (disebut <em>prop drilling</em>) menjadi mimpi buruk. Solusinya adalah state management global. Kita menggunakan <strong>Zustand</strong> — library yang ringan, modern, dan jauh lebih sederhana dibanding Redux.</p><pre><code>import { create } from \'zustand\';\n\nconst useCartStore = create((set) => ({\n  items: [],\n  addItem: (item) => set((state) => ({ items: [...state.items, item] })),\n  removeItem: (id) => set((state) => ({\n    items: state.items.filter(i => i.id !== id)\n  })),\n  total: 0,\n}));\n\n// Penggunaan di komponen mana saja\nconst { items, addItem } = useCartStore();</code></pre>',
                'course_id' => 5,
                'order' => 6,
            ],
            [
                'title' => 'Bab 7: Project Akhir — Build Frontend E-Commerce',
                'content' => '<h2>Mengintegrasikan Semua Skill dalam Satu Proyek Nyata</h2><p>Di chapter penutup yang paling menantang ini, kita membangun sebuah <strong>aplikasi E-Commerce frontend</strong> yang fungsional dan terhubung ke REST API. Fitur yang dibangun meliputi:</p><ul><li>Halaman Produk dengan filter & sorting (Zustand)</li><li>Keranjang Belanja persisten (localStorage)</li><li>Halaman Detail Produk dengan routing dinamis</li><li>Proses Checkout dengan form validasi</li><li>Autentikasi pengguna (Login/Register)</li><li>Protected Routes untuk halaman yang memerlukan login</li></ul><blockquote>Selamat! Anda kini adalah seorang React Developer yang siap bekerja di industri teknologi modern.</blockquote>',
                'course_id' => 5,
                'order' => 7,
            ],
        ];

        foreach ($lessons as $lesson) {
            Lessons::updateOrCreate(
                [
                    'title' => $lesson['title'],
                    'course_id' => $lesson['course_id'],
                ],
                $lesson
            );
        }
    }
}

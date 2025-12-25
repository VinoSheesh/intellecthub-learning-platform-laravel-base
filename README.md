# 🚀 IntellectHub

![Project Status](https://img.shields.io/badge/Status-In%20Development-yellow?style=for-the-badge)
![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-for-the-badge&logo=laravel&logoColor=white)
![Livewire](https://img.shields.io/badge/Livewire-4E56A6?style=for-for-the-badge&logo=livewire&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-for-the-badge&logo=tailwind-css&logoColor=white)

> **⚠️ Note:** Proyek ini masih dalam tahap pengembangan aktif (*Work In Progress*). Fitur mungkin belum lengkap dan dapat berubah sewaktu-waktu.

## 📖 Tentang Proyek

**IntellectHub** adalah sebuah platform *Learning Management System* (LMS) yang dikhususkan untuk pembelajaran pemrograman dan coding. Dibangun dengan performa dan reaktivitas modern menggunakan **Laravel** dan **Livewire**, serta dibalut dengan antarmuka yang bersih menggunakan **Tailwind CSS**.

Platform ini dirancang dengan model bisnis berbasis langganan (*subscription*), di mana pengguna harus berlangganan untuk mengakses materi kursus premium secara penuh.

## ✨ Fitur Saat Ini (v0.1 - Dev)

Berikut adalah fitur yang sudah diimplementasikan dan dapat digunakan:

* **🔐 Autentikasi User:** Sistem Login dan Register yang aman.
* **💎 Sistem Langganan:** Logika dasar untuk membatasi akses konten bagi pengguna non-subscriber.
* **👤 User Dashboard:** Halaman utama bagi pengguna untuk melihat status dan navigasi.
* **🛠 Admin Panel:**
    * Manajemen Course (CRUD: Create, Read, Update, Delete).
    * Manajemen materi dasar.

## 📸 Galeri Preview

*Berikut adalah tampilan antarmuka IntellectHub saat ini:*

<img width="400" alt="image_2025-11-28_102157573-front" src="https://github.com/user-attachments/assets/01392e10-665c-477f-b509-6eab44622c65" />
<img width="400" alt="image_2025-11-28_102115556-front" src="https://github.com/user-attachments/assets/4da409d8-528e-4dbe-b4a0-b35da94cd2de" />
<img width="400" alt="image_2025-11-28_102352954-front" src="https://github.com/user-attachments/assets/5a4285dc-a684-4f02-868c-b385d015c8f8" />
<img width="400" alt="image_2025-11-28_102302307-front" src="https://github.com/user-attachments/assets/cfe54056-51ca-4af1-9746-a31bef8008f2" />
<img width="400" alt="image_2025-11-28_102326897-front" src="https://github.com/user-attachments/assets/7df9bb7c-690c-4a04-b2e1-73744597e409" />
<img width="400" alt="image_2025-11-28_102232508-front" src="https://github.com/user-attachments/assets/bff30dac-f014-4cb6-8f91-f5191706d59d" />

*(Note: Gambar di atas adalah representasi tahap pengembangan)*

---

## 💾 Struktur Database (Schema) 📚

Proyek IntellectHub menggunakan skema database yang dirancang untuk mendukung sistem LMS berbasis langganan, pelacakan kursus, kuis, dan penghargaan.

### Detail Skema Tabel

| Tabel | Deskripsi | Relasi Kunci Asing (FK) |
| :--- | :--- | :--- |
| `users` | Informasi dasar pengguna (nama, email, password). | **role_id** (`roles.id`) |
| `roles` | Peran pengguna (e.g., Admin, Student). | - |
| `categories` | Kategori untuk pengelompokan kursus. | - |
| `courses` | Data utama setiap kursus (judul, deskripsi). | **category_id** (`categories.id`) |
| `lessons` | Materi individual di dalam sebuah kursus. | **course_id** (`courses.id`) |
| `enrollments` | Pendaftaran pengguna ke kursus tertentu. | **user_id** (`users.id`), **course_id** (`courses.id`) |
| `transactions` | Mencatat semua pembayaran (kursus atau langganan). | **user_id** (`users.id`), **course_id** (`courses.id`) |
| `quizzes` | Informasi kuis yang terkait dengan kursus. | **course_id** (`courses.id`) |
| `quiz_questions` | Pertanyaan dan pilihan jawaban kuis. | **quiz_id** (`quizzes.id`) |
| `quiz_results` | Skor dan hasil kuis yang dicapai pengguna. | **quiz_id** (`quizzes.id`), **user_id** (`users.id`) |
| `certificates` | Catatan sertifikat kelulusan yang diterbitkan. | **user_id** (`users.id`), **course_id** (`courses.id`) |
| `badges` | Data *badge* atau penghargaan. | - |
| `user_badges` | Mencatat *badge* yang telah diperoleh pengguna. | **user_id** (`users.id`), **badge_id** (`badges.id`) |
| `subscriptions` | Melacak paket langganan pengguna (monthly/yearly). | **user_id** (`users.id`) |

### Definisi Kolom Lengkap

#### `users`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **name** | `varchar(100)` | |
| **email** | `varchar(255)` | UNIQUE |
| **password** | `varchar(255)` | |
| **role_id** | `int` | FK: `roles.id` |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `roles`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **name** | `varchar(50)` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `categories`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **name** | `varchar(100)` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `courses`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **title** | `varchar(150)` | |
| **description** | `text` | |
| **category_id** | `int` | FK: `categories.id` |
| **thumbnail** | `varchar(255)` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `lessons`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **course_id** | `int` | FK: `courses.id` |
| **title** | `varchar(150)` | |
| **video_url** | `varchar(255)` | |
| **content** | `longtext` | |
| **order** | `int` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `enrollments`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **user_id** | `int` | FK: `users.id` |
| **course_id** | `int` | FK: `courses.id` |
| **status** | `enum` | ('active', 'completed', 'cancelled') |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `transactions`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **user_id** | `int` | FK: `users.id` |
| **course_id** | `int` | FK: `courses.id` |
| **amount** | `decimal(10,2)` | |
| **payment_status** | `enum` | ('pending', 'paid', 'failed') |
| **payment_gateway_response** | `json` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `quizzes`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **course_id** | `int` | FK: `courses.id` |
| **title** | `varchar(150)` | |
| **passing_score** | `int` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `quiz_questions`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **quiz_id** | `int` | FK: `quizzes.id` |
| **question** | `text` | |
| **options** | `json` | |
| **correct_answer** | `varchar(5)` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `quiz_results`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **quiz_id** | `int` | FK: `quizzes.id` |
| **user_id** | `int` | FK: `users.id` |
| **score** | `int` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `certificates`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **user_id** | `int` | FK: `users.id` |
| **course_id** | `int` | FK: `courses.id` |
| **certificate_url** | `varchar(255)` | |
| **issued_at** | `timestamp` | |

#### `badges`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **name** | `varchar(100)` | |
| **description** | `varchar(255)` | |
| **icon** | `varchar(255)` | |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

#### `user_badges`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **user_id** | `int` | FK: `users.id` |
| **badge_id** | `int` | FK: `badges.id` |
| **awarded_at** | `timestamp` | |

#### `subscriptions`
| Kolom | Tipe Data | Keterangan |
| :--- | :--- | :--- |
| **id** | `int` | PK, increment |
| **user_id** | `int` | FK: `users.id` |
| **plan** | `enum` | ('monthly', 'yearly') |
| **start_date** | `timestamp` | |
| **end_date** | `timestamp` | |
| **status** | `enum` | ('active', 'expired', 'cancelled') |
| **created_at** | `timestamp` | |
| **updated_at** | `timestamp` | |

---

## 🛠️ Teknologi (Tech Stack)

* **Framework:** [Laravel 11](https://laravel.com)
* **Frontend & Interactivity:** [Livewire 3](https://livewire.laravel.com)
* **Styling:** [Tailwind CSS](https://tailwindcss.com)
* **Database:** MySQL
* **PDF Generation:** (Coming Soon - DomPDF/Snappy)

## 🗺️ Roadmap Pengembangan

Fitur-fitur berikut sedang dalam pengerjaan atau direncanakan untuk rilis mendatang:

- [x] **Integrasi Payment Gateway** (Midtrans/Xendit) untuk otomatisasi langganan.
- [x] **Video Player** dengan fitur proteksi konten/materi.
- [ ] **Code Playground** (Compiler sederhana di browser untuk latihan coding).
- [x] **Sistem Quiz & Progress Tracking** untuk memantau kemajuan belajar.
- [x] **Cetak Sertifikat Otomatis** (Generate PDF sertifikat kelulusan setelah menyelesaikan course).
- [ ] **Halaman Profil User** yang lebih lengkap.

---

## ⚙️ Cara Install & Menjalankan (Local)

Ikuti langkah ini untuk menjalankan proyek di komputer lokal Anda:

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/VinoSheesh/intellecthub-learning-platform-laravel-base.git](https://github.com/VinoSheesh/intellecthub-learning-platform-laravel-base.git)
    cd intellecthub
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment**
    Salin file `.env.example` menjadi `.env` dan sesuaikan konfigurasi database Anda.
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Migrasi Database**
    ```bash
    php artisan migrate
    # atau jika ingin data dummy
    php artisan migrate --seed
    ```

5.  **Jalankan Server**
    Buka dua terminal terpisah untuk menjalankan server Laravel dan build aset frontend.
    ```bash
    # Terminal 1
    php artisan serve

    # Terminal 2
    npm run dev
    ```

6.  **Akses Website**
    Buka browser dan kunjungi `http://localhost:8000`

## 🤝 Kontribusi

Karena proyek ini masih dalam tahap awal, saran dan *pull request* sangat dihargai. Silakan buka *Issue* jika menemukan bug atau memiliki ide fitur.

---
Dibuat oleh [VinoSheesh]

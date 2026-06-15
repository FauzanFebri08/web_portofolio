<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB; // Digunakan jika kamu belum membuat semua Model-nya

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => 'fauzan@example.com'],
            [
                'name' => 'Fauzan',
                'password' => Hash::make('password123'), 
            ]
        );

        
        DB::table('profiles')->updateOrInsert(
            ['user_id' => $user->id], 
            [
                'description' => 'Junior Web Developer yang berfokus pada pengembangan backend menggunakan Laravel. Suka belajar hal baru dan memecahkan masalah lewat baris kode.',
                'professional_vision' => 'Menjadi Backend Engineer profesional yang mampu membangun sistem web yang scalable dan efisien.',
                'mission' => 'Terus mendalami ekosistem PHP/Laravel, mempelajari Best Practice koding, serta berkontribusi dalam proyek open-source.',
                'location' => 'Indonesia',
                'date_of_birth' => '2004-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        
        DB::table('skills')->insert([
            [
                'user_id' => $user->id,
                'skill_name' => 'PHP',
                'proficiency_level' => 'advanced',
                'category' => 'Backend',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'skill_name' => 'Laravel',
                'proficiency_level' => 'intermediate',
                'category' => 'Backend',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'skill_name' => 'MySQL',
                'proficiency_level' => 'intermediate',
                'category' => 'Database',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'skill_name' => 'Tailwind CSS',
                'proficiency_level' => 'beginner',
                'category' => 'Frontend',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'skill_name' => 'Git & GitHub',
                'proficiency_level' => 'intermediate',
                'category' => 'Tools',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);

        
        DB::table('experiences')->insert([
            [
                'user_id' => $user->id,
                'position_title' => 'Freelance Web Developer',
                'organization_name' => 'Self-Employed',
                'start_date' => '2025-01-01',
                'end_date' => '2026-06-01', // diisi tanggal karena tipe datanya date dan tidak nullable
                'is_curent' => true,
                'description' => 'Mengembangkan beberapa website landing page dan sistem informasi berbasis web untuk UMKM lokal.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'position_title' => 'Backend Developer Intern',
                'organization_name' => 'Tech Studio Indonesia',
                'start_date' => '2024-06-01',
                'end_date' => '2024-12-01',
                'is_curent' => false,
                'description' => 'Membantu tim backend dalam merancang API menggunakan Laravel dan mengoptimalkan query database.',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'position_title' => 'Laboratory Assistant',
                'organization_name' => 'Universitas Komputer',
                'start_date' => '2023-09-01',
                'end_date' => '2024-05-01',
                'is_curent' => false,
                'description' => 'Membantu dosen dalam memandu praktikum pemrograman dasar dan basis data untuk mahasiswa baru.',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
        
        DB::table('contacts')->insert([
            [
                'user_id' => $user->id,
                'contact_type' => 'email',
                'contact_value' => 'fauzan@example.com',
                'is_public' => true,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'contact_type' => 'linkedin',
                'contact_value' => 'https://linkedin.com/in/fauzan',
                'is_public' => true,
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'contact_type' => 'whatsapp',
                'contact_value' => 'https://wa.me/6281234567890',
                'is_public' => true,
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);

        
        DB::table('projects')->insert([
            [
                'user_id' => $user->id,
                'project_title' => 'Web Portofolio Pribadi',
                'project_type' => 'Web Application',
                'client_name' => 'Personal Project',
                'role' => 'Fullstack Developer',
                'start_date' => '2026-06-01',
                'end_date' => null,
                'is_ongoing' => true,
                'description' => 'Website portofolio yang sedang dibuat ini untuk menampilkan skill, pengalaman, dan proyek yang pernah dikerjakan.',
                'technologies' => 'Laravel, Tailwind CSS, MySQL',
                'project_url' => 'http://127.0.0.1:8000',
                'github_url' => 'https://github.com/fauzan-dev/web_portfolio_fauzan',
                'thumbnail' => 'images/project-portfolio.png',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'project_title' => 'Sistem Informasi Kasir Wisata',
                'project_type' => 'Web Application',
                'client_name' => 'UMKM Lokal',
                'role' => 'Backend Developer',
                'start_date' => '2025-10-01',
                'end_date' => '2026-02-01',
                'is_ongoing' => false,
                'description' => 'Aplikasi web manajemen transaksi tiket masuk tempat wisata berbasis Laravel dengan fitur cetak struk dan laporan pendapatan bulanan.',
                'technologies' => 'Laravel, Bootstrap, MySQL',
                'project_url' => null,
                'github_url' => 'https://github.com/fauzan-dev',
                'thumbnail' => 'images/project-pos.png',
                'created_at' => now(), 'updated_at' => now()
            ],
            [
                'user_id' => $user->id,
                'project_title' => 'Rest-API Marketplace Sederhana',
                'project_type' => 'RESTful API',
                'client_name' => 'Learning Project',
                'role' => 'Backend Engineer',
                'start_date' => '2025-05-01',
                'end_date' => '2025-08-01',
                'is_ongoing' => false,
                'description' => 'Pengembangan backend API untuk aplikasi e-commerce yang mendukung autentikasi JWT, manajemen produk, dan keranjang belanja.',
                'technologies' => 'Laravel, JWT, MySQL',
                'project_url' => null,
                'github_url' => 'https://github.com/fauzan-dev',
                'thumbnail' => 'images/project-api.png',
                'created_at' => now(), 'updated_at' => now()
            ],
        ]);
    }
}
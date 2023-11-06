<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\User;
use App\Models\jasa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


    // Membuat kategori "Seni dan Kreativitas"
Category::create([
    'name' => 'Seni dan Kreativitas',
    'slug' => 'seni-dan-kreativitas',
    'photo' => '/img/art.png',
    'description' => 'Kategori ini mengangkat berbagai bentuk seni dan ekspresi kreatif. Mulai dari lukisan, patung, fotografi, hingga desain grafis.'
]);

// Membuat kategori "Teknologi dan Ilmu Pengetahuan"
Category::create([
    'name' => 'Teknologi dan Ilmu Pengetahuan',
    'slug' => 'teknologi-dan-ilmu-pengetahuan',
    'photo' => '/img/teknologi.png',
    'description' => 'Menawarkan berbagai layanan terkait IT dan teknologi informasi. Dari pengembangan perangkat lunak hingga keamanan jaringan'
]);

// Membuat kategori "Olahraga dan Kebugaran"
Category::create([
    'name' => 'Olahraga dan Kebugaran',
    'slug' => 'olahraga-dan-kebugaran',
    'photo' => '/img/sports.png',
    'description' => 'Temukan jasa olahraga yang menawarkan pelatihan, konsultasi kebugaran, dan program kesehatan yang disesuaikan.'
]);

// Membuat kategori "Kuliner"
Category::create([
    'name' => 'Kuliner',
    'slug' => 'kuliner',
    'photo' => '/img/food.png',
    'description' => 'Tim ahli kami siap menyediakan hidangan lezat untuk acara khusus Anda atau membantu Anda menemukan pengalaman kuliner yang tak terlupakan.'
]);

// Membuat kategori "Musik dan Hiburan"
Category::create([
    'name' => 'Musik dan Hiburan',
    'slug' => 'musik-dan-hiburan',
    'photo' => '/img/music.png',
    'description' => 'Menyediakan berbagai layanan terkait musik dan hiburan, mulai dari penyelenggaraan acara hingga produksi musik.'
]);

// Membuat kategori "Fashion dan Gaya"
Category::create([
    'name' => 'Fashion dan Gaya',
    'slug' => 'fashion-dan-gaya',
    'photo' => '/img/fashion.png',
    'description' => 'Menawarkan solusi terkait dunia fashion dan gaya pribadi Anda, dari desain pakaian hingga konsultasi gaya.'
]);

// Membuat kategori "Pendidikan"
Category::create([
    'name' => 'Pendidikan',
    'slug' => 'pendidikan',
    'photo' => '/img/study.png',
    'description' => 'Menyediakan berbagai layanan pendidikan, termasuk tutor pribadi, pelatihan keterampilan, dan konsultasi akademik. Dengan pendidik berpengalaman, kami siap membantu Anda mencapai tujuan pendidikan dan pengembangan diri Anda'
]);

User::create([
    'name' => 'John Doe',
    'email' => 'john@example.com',
    'email_verified_at' => now(),
    'password' => Hash::make('password123'),
    'role' => 'admin',
    'remember_token' => Str::random(10),
]);

// Membuat user customer
User::create([
    'name' => 'Jane Smith',
    'email' => 'jane@example.com',
    'email_verified_at' => now(),
    'password' => Hash::make('password456'),
    'role' => 'customer',
    'remember_token' => Str::random(10),
]);

// Membuat user service provider
User::create([
    'name' => 'Alice Johnson',
    'email' => 'alice@example.com',
    'email_verified_at' => now(),
    'password' => Hash::make('password789'),
    'role' => 'service_provider',
    'remember_token' => Str::random(10),
]);

// Membuat user customer
User::create([
    'name' => 'Bob Wilson',
    'email' => 'bob@example.com',
    'email_verified_at' => now(),
    'password' => Hash::make('password123'),
    'role' => 'customer',
    'remember_token' => Str::random(10),
]);

// Membuat user customer
User::create([
    'name' => 'Eve Davis',
    'email' => 'eve@example.com',
    'email_verified_at' => now(),
    'password' => Hash::make('password456'),
    'role' => 'customer',
    'remember_token' => Str::random(10),
]);
$seniDanKreativitasCategory = Category::where('slug', 'seni-dan-kreativitas')->first();
$teknologiCategory = Category::where('slug', 'teknologi-dan-ilmu-pengetahuan')->first();
$olahragaCategory = Category::where('slug', 'olahraga-dan-kebugaran')->first();
Jasa::create([
    'nama_jasa' => 'Lukisan Kanvas',
    'deskripsi_jasa' => 'Lukisan kanvas berkualitas tinggi oleh seniman berpengalaman.',
    'image' => 'lukisan.jpg',
    'id_categories' => $seniDanKreativitasCategory->id,
]);

Jasa::create([
    'nama_jasa' => 'Fotografi Prewedding',
    'deskripsi_jasa' => 'Sesi foto prewedding untuk momen yang tak terlupakan.',
    'image' => 'prewedding.jpg',
    'id_categories' => $seniDanKreativitasCategory->id,
]);

Jasa::create([
    'nama_jasa' => 'Desain Grafis Kreatif',
    'deskripsi_jasa' => 'Desainer grafis profesional yang siap membantu Anda.',
    'image' => 'desain-grafis.jpg',
    'id_categories' => $seniDanKreativitasCategory->id,
]);

// Data untuk kategori "Teknologi dan Ilmu Pengetahuan"
Jasa::create([
    'nama_jasa' => 'Pengembangan Aplikasi Mobile',
    'deskripsi_jasa' => 'Pengembangan aplikasi mobile berbasis Android dan iOS.',
    'image' => 'aplikasi-mobile.jpg',
    'id_categories' => $teknologiCategory->id,
]);

Jasa::create([
    'nama_jasa' => 'Keamanan Jaringan',
    'deskripsi_jasa' => 'Konsultasi keamanan jaringan dan analisis risiko.',
    'image' => 'keamanan-jaringan.jpg',
    'id_categories' => $teknologiCategory->id,
]);

Jasa::create([
    'nama_jasa' => 'Pengembangan Perangkat Lunak',
    'deskripsi_jasa' => 'Pengembangan perangkat lunak kustom untuk bisnis Anda.',
    'image' => 'perangkat-lunak.jpg',
    'id_categories' => $teknologiCategory->id,
]);



    }
}

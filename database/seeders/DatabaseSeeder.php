<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // Categories
        $musik = Category::create([
            'name' => 'Musik',
            'slug' => 'musik',
        ]);

        $teknologi = Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);

        $seni = Category::create([
            'name' => 'Seni',
            'slug' => 'seni',
        ]);

        $esport = Category::create([
            'name' => 'E-Sport',
            'slug' => 'e-sport',
        ]);

        $uiux = Category::create([
            'name' => 'UI/UX Design',
            'slug' => 'ui-ux',
        ]);

        $cybersecurity = Category::create([
            'name' => 'Cyber Security',
            'slug' => 'cyber-security',
        ]);

        // Events from EventController/HomeController
        Event::create([
            'category_id' => $musik->id,
            'title' => 'Jazz Night 2024: A Celebration',
            'slug' => 'jazz-night-2024',
            'description' => 'Nikmati malam penuh harmoni dengan alunan jazz terbaik dari musisi ternama. Sebuah perayaan musik yang tak terlupakan di jantung kota.',
            'description2' => 'Jangan lewatkan kesempatan langka ini untuk menyaksikan penampilan spektakuler dari **The Saxophone Legends** dan bintang tamu spesial, **Vocalist of the Year**.',
            'date' => '2024-11-16 19:30:00',
            'location' => 'The Blue Note Lounge',
            'price' => 150000,
            'stock' => 150,
            'poster_path' => 'assets/concert.png',
            'organizer_name' => 'Jogja Jazz Community',
            'organizer_initials' => 'JJC',
        ]);

        Event::create([
            'category_id' => $teknologi->id,
            'title' => 'Tech Summit 2024: Future of AI',
            'slug' => 'tech-summit-2024',
            'description' => 'Konferensi teknologi terbesar tahun ini membahas inovasi terbaru dalam kecerdasan buatan dan dampaknya bagi masa depan.',
            'description2' => 'Pembicara utama: **Dr. Evelyn Reed** (MIT) dan **CEO of TechCorp Global**. Dapatkan insight eksklusif dan networking dengan para pemimpin industri.',
            'date' => '2024-11-23 09:00:00',
            'location' => 'Jogja Expo Center',
            'price' => 450000,
            'stock' => 80,
            'poster_path' => 'assets/workshop.png',
            'organizer_name' => 'Inovasi Digital Indonesia',
            'organizer_initials' => 'IDI',
        ]);

        Event::create([
            'category_id' => $seni->id,
            'title' => 'Community Art Exhibition',
            'slug' => 'community-art-exhibition',
            'description' => 'Pameran seni dari komunitas lokal. Temukan karya-karya inspiratif dan dukung seniman berbakat.',
            'description2' => 'Jangan lewatkan kesempatan langka ini untuk menyaksikan penampilan spektakuler dari **The Saxophone Legends** dan bintang tamu spesial, **Vocalist of the Year**.',
            'date' => '2024-11-30 10:00:00',
            'location' => 'City Gallery',
            'price' => 0,
            'stock' => 150,
            'poster_path' => 'assets/hackathon.png',
            'organizer_name' => 'Jogja Jazz Community',
            'organizer_initials' => 'JJC',
        ]);
    }
}

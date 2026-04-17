<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show($slug)
    {
        // Data event (simulasi database)
        $events = [
            'jazz-night-2024' => [
                'title' => 'Jazz Night 2024: A Celebration',
                'slug' => 'jazz-night-2024',
                'description' => 'Nikmati malam penuh harmoni dengan alunan jazz terbaik dari musisi ternama. Sebuah perayaan musik yang tak terlupakan di jantung kota.',
                'description2' => 'Jangan lewatkan kesempatan langka ini untuk menyaksikan penampilan spektakuler dari **The Saxophone Legends** dan bintang tamu spesial, **Vocalist of the Year**.',
                'date' => '16 November 2024',
                'location' => 'The Blue Note Lounge',
                'price' => 'Rp 150.000',
                'price_value' => 150000,
                'stock' => 150,
                'image' => 'assets/concert.png',
                'category' => 'Musik',
                'organizer_name' => 'Jogja Jazz Community',
                'organizer_initials' => 'JJC',
            ],
            'tech-summit-2024' => [
                'title' => 'Tech Summit 2024: Future of AI',
                'slug' => 'tech-summit-2024',
                'description' => 'Konferensi teknologi terbesar tahun ini membahas inovasi terbaru dalam kecerdasan buatan dan dampaknya bagi masa depan.',
                'description2' => 'Pembicara utama: **Dr. Evelyn Reed** (MIT) dan **CEO of TechCorp Global**. Dapatkan insight eksklusif dan networking dengan para pemimpin industri.',
                'date' => '22-23 November 2024',
                'location' => 'Jogja Expo Center',
                'price' => 'Rp 450.000',
                'price_value' => 450000,
                'stock' => 80,
                'image' => 'assets/workshop.png',
                'category' => 'Teknologi',
                'organizer_name' => 'Inovasi Digital Indonesia',
                'organizer_initials' => 'IDI',
            ],
            'community-art-exhibition' => [
                'title' => 'Community Art Exhibition',
                'slug' => 'community-art-exhibition',
                'description' => 'Pameran seni dari komunitas lokal. Temukan karya-karya inspiratif dan dukung seniman berbakat.',
                'description2' => 'Jangan lewatkan kesempatan langka ini untuk menyaksikan penampilan spektakuler dari **The Saxophone Legends** dan bintang tamu spesial, **Vocalist of the Year**.',
                'date' => '30 November 2024',
                'location' => 'City Gallery',
                'price' => 'Gratis',
                'price_value' => 0,
                'stock' => 150,
                'image' => 'assets/hackathon.png',
                'category' => 'Seni',
                'organizer_name' => 'Jogja Jazz Community',
                'organizer_initials' => 'JJC',
            ],
        ];

        if (!isset($events[$slug])) {
            abort(404);
        }

        return view('event-detail', [
            'event' => $events[$slug]
        ]);
    }

    public function checkout($slug)
    {
        // Data event (simulasi database)
        $events = [
            'jazz-night-2024' => [
                'id' => 'TRX-99210',
                'title' => 'Jazz Night 2024: A Celebration',
                'slug' => 'jazz-night-2024',
                'description' => 'Nikmati malam penuh harmoni dengan alunan jazz terbaik dari musisi ternama. Sebuah perayaan musik yang tak terlupakan di jantung kota.',
                'description2' => 'Jangan lewatkan kesempatan langka ini untuk menyaksikan penampilan spektakuler dari **The Saxophone Legends** dan bintang tamu spesial, **Vocalist of the Year**.',
                'date' => '16 November 2024',
                'location' => 'The Blue Note Lounge',
                'price' => 'Rp 150.000',
                'price_value' => 150000,
                'stock' => 150,
                'image' => 'assets/concert.png',
                'category' => 'Musik',
                'organizer_name' => 'Jogja Jazz Community',
                'organizer_initials' => 'JJC',
            ],
            'tech-summit-2024' => [
                'id' => 'TRX-99211',
                'title' => 'Tech Summit 2024: Future of AI',
                'slug' => 'tech-summit-2024',
                'description' => 'Konferensi teknologi terbesar tahun ini membahas inovasi terbaru dalam kecerdasan buatan dan dampaknya bagi masa depan.',
                'description2' => 'Pembicara utama: **Dr. Evelyn Reed** (MIT) dan **CEO of TechCorp Global**. Dapatkan insight eksklusif dan networking dengan para pemimpin industri.',
                'date' => '22-23 November 2024',
                'location' => 'Jogja Expo Center',
                'price' => 'Rp 450.000',
                'price_value' => 450000,
                'stock' => 80,
                'image' => 'assets/workshop.png',
                'category' => 'Teknologi',
                'organizer_name' => 'Inovasi Digital Indonesia',
                'organizer_initials' => 'IDI',
            ],
            'community-art-exhibition' => [
                'id' => 'TRX-99212',
                'title' => 'Community Art Exhibition',
                'slug' => 'community-art-exhibition',
                'description' => 'Pameran seni dari komunitas lokal. Temukan karya-karya inspiratif dan dukung seniman berbakat.',
                'description2' => 'Jangan lewatkan kesempatan langka ini untuk menyaksikan penampilan spektakuler dari **The Saxophone Legends** dan bintang tamu spesial, **Vocalist of the Year**.',
                'date' => '30 November 2024',
                'location' => 'City Gallery',
                'price' => 'Gratis',
                'price_value' => 0,
                'stock' => 150,
                'image' => 'assets/hackathon.png',
                'category' => 'Seni',
                'organizer_name' => 'Jogja Jazz Community',
                'organizer_initials' => 'JJC',
            ],
        ];

        if (!isset($events[$slug])) {
            abort(404);
        }

        return view('checkout', [
            'event' => $events[$slug]
        ]);
    }
}

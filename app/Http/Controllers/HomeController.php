<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = [
            [
                'id' => 1,
                'title' => 'Jazz Night 2024: A Celebration',
                'slug' => 'jazz-night-2024',
                'image' => 'assets/concert.png',
                'description' => 'Nikmati malam penuh harmoni dengan alunan jazz terbaik dari musisi ternama. Suasana intim dan elegan di The Blue Note Lounge.',
                'date' => '16 November 2024, 19:30',
                'location' => 'The Blue Note Lounge',
                'price' => 'Rp 150.000',
                'category' => 'Musik',
            ],
            [
                'id' => 2,
                'title' => 'AI & Future Tech Summit',
                'slug' => 'tech-summit-2024',
                'image' => 'assets/workshop.png',
                'description' => 'Upgrade skill Anda dengan workshop teknologi terkini. Belajar langsung dari pakar AI tentang tren masa depan.',
                'date' => '23 November 2024, 09:00',
                'location' => 'Innovation Center',
                'price' => 'Rp 50.000',
                'category' => 'Teknologi',
            ],
            [
                'id' => 3,
                'title' => 'Community Art Exhibition',
                'slug' => 'community-art-exhibition',
                'image' => 'assets/hackathon.png',
                'description' => 'Pameran seni dari komunitas lokal. Temukan karya-karya inspiratif dan dukung seniman berbakat.',
                'date' => '30 November 2024, 10:00',
                'location' => 'City Gallery',
                'price' => 'Gratis',
                'category' => 'Seni',
            ],
        ];
        // echo "<pre>";
        // print_r($events);
        // die;
        return view('welcome', compact('events'));
    }
}

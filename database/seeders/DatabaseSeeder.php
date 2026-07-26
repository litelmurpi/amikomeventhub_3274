<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use App\Models\Organization;
use App\Models\Partner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users
        $superadmin = User::factory()->create([
            'name' => 'Super Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
        ]);

        $userAzfa = User::factory()->create([
            'name' => 'Yudistira Azfa',
            'email' => 'azfa@dev.id',
            'password' => bcrypt('12345678'),
            'role' => 'user',
        ]);

        $organizerUser = User::factory()->create([
            'name' => 'Panitia HIMA IF',
            'email' => 'organizer@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'organizer',
        ]);

        // 2. Organizations
        $orgHimaIF = Organization::create([
            'name' => 'HIMA Informatika Amikom',
            'slug' => 'hima-informatika-amikom',
            'description' => 'Himpunan Mahasiswa Informatika Universitas Amikom Yogyakarta.',
            'logo_path' => 'assets/logo-icon.svg',
            'owner_id' => $organizerUser->id,
            'phone_number' => '6281234567890',
            'social_media' => 'https://instagram.com/himaif_amikom',
            'organization_type' => 'internal',
            'status' => 'approved',
            'is_verified' => true,
        ]);

        $orgGdsc = Organization::create([
            'name' => 'GDSC Amikom',
            'slug' => 'gdsc-amikom',
            'description' => 'Google Developer Student Clubs Universitas Amikom Yogyakarta.',
            'logo_path' => 'assets/logo-icon.svg',
            'owner_id' => $superadmin->id,
            'phone_number' => '6281987654321',
            'social_media' => 'https://instagram.com/gdsc_amikom',
            'organization_type' => 'internal',
            'status' => 'approved',
            'is_verified' => true,
        ]);

        // 3. Categories
        $teknologi = Category::create([
            'name' => 'Teknologi',
            'slug' => 'teknologi',
        ]);

        $musik = Category::create([
            'name' => 'Musik',
            'slug' => 'musik',
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

        $seni = Category::create([
            'name' => 'Seni & Kebudayaan',
            'slug' => 'seni-kebudayaan',
        ]);

        // 4. Relevant Events (8 Events total)
        Event::create([
            'organization_id' => $orgHimaIF->id,
            'category_id' => $teknologi->id,
            'title' => 'Amikom TechFest 2026: Building Scalable Web Apps with Laravel & AI',
            'slug' => 'amikom-techfest-2026',
            'description' => 'Konferensi & seminar teknologi terbesar Kampus Amikom Yogyakarta yang membahas arsitektur web modern, integrasi AI, dan praktik arsitektur cloud.',
            'description2' => 'Sesi eksklusif bersama Praktisi Industri & Dosen Informatika. Dapatkan e-certificate, sertifikat fisik, merchandise, serta ilmu langsung dari ahlinya.',
            'date' => '2026-08-15 09:00:00',
            'location' => 'Ruang Cinema Amikom Yogyakarta (Gedung 01)',
            'price' => 0, // Bypass Free Event
            'stock' => 200,
            'poster_path' => 'assets/workshop.png',
            'organizer_name' => 'HIMA Informatika Amikom',
            'organizer_initials' => 'HIF',
        ]);

        Event::create([
            'organization_id' => $orgHimaIF->id,
            'category_id' => $musik->id,
            'title' => 'Sound of Amikom: Campus Music Festival 2026',
            'slug' => 'sound-of-amikom-2026',
            'description' => 'Konser musik tahunan Amikom yang menampilkan grup band independen kampus, guest star nasional, dan bazaar kuliner mahasiswa.',
            'description2' => 'Bintang tamu spesial: **Nadin Amizah & Reality Club**. Jangan lewatkan keseruan malam festival terbesar semester ini!',
            'date' => '2026-08-28 18:30:00',
            'location' => 'Halaman Utama Gedung 4 Amikom Yogyakarta',
            'price' => 75000,
            'stock' => 500,
            'poster_path' => 'assets/concert.png',
            'organizer_name' => 'UKM Musik Amikom',
            'organizer_initials' => 'UMA',
        ]);

        Event::create([
            'organization_id' => $orgHimaIF->id,
            'category_id' => $esport->id,
            'title' => 'Amikom E-Sports Championship: Mobile Legends & Valorant',
            'slug' => 'amikom-esports-championship-2026',
            'description' => 'Turnamen esport bergengsi antar mahasiswa dan umum se-DIY & Jateng dengan prizepool total puluhan juta rupiah.',
            'description2' => 'Sistem pertandingannya online qualifier dan Offline Grand Final disiarkan live streaming YouTube dengan caster profesional.',
            'date' => '2026-09-05 10:00:00',
            'location' => 'Auditorium Gedung 3 Amikom Yogyakarta',
            'price' => 50000,
            'stock' => 64,
            'poster_path' => 'assets/hackathon.png',
            'organizer_name' => 'Amikom Esports Club',
            'organizer_initials' => 'AEC',
        ]);

        Event::create([
            'organization_id' => $orgGdsc->id,
            'category_id' => $uiux->id,
            'title' => 'UI/UX Masterclass: Product Design Sprint for Beginners',
            'slug' => 'uiux-masterclass-design-sprint',
            'description' => 'Hands-on workshop perancangan desain produk aplikasi mobile dari ideasi, wireframing Figma, hingga prototyping interaktif.',
            'description2' => 'Peserta wajib membawa laptop dengan Figma terinstall. Semua peserta mendapat starter kit UI Kit & Sertifikat Kompetensi.',
            'date' => '2026-09-12 13:00:00',
            'location' => 'Lab Komputer 3 Amikom Yogyakarta',
            'price' => 0, // Bypass Free Event
            'stock' => 80,
            'poster_path' => 'assets/workshop.png',
            'organizer_name' => 'GDSC Amikom',
            'organizer_initials' => 'GSC',
        ]);

        Event::create([
            'organization_id' => $orgHimaIF->id,
            'category_id' => $cybersecurity->id,
            'title' => 'Cyber Security Workshop: Ethical Hacking & Web Penetration Testing',
            'slug' => 'cyber-security-workshop-2026',
            'description' => 'Pelatihan keamanan siber yang membahas analisis kerentanan web application, OWASP Top 10, serta simulasi Capture The Flag (CTF).',
            'description2' => 'Narasumber pakar Keamanan Siber nasional dan Praktisi Certified Ethical Hacker (CEH). Tempat sangat terbatas.',
            'date' => '2026-09-26 09:00:00',
            'location' => 'Ruang Seminar Gedung 5 Amikom Yogyakarta',
            'price' => 120000,
            'stock' => 100,
            'poster_path' => 'assets/hackathon.png',
            'organizer_name' => 'HIMA Informatika Amikom',
            'organizer_initials' => 'HIF',
        ]);

        Event::create([
            'organization_id' => $orgHimaIF->id,
            'category_id' => $seni->id,
            'title' => 'Jogja Creative Art & Digital Illustration Exhibition',
            'slug' => 'jogja-creative-art-exhibition',
            'description' => 'Pameran karya ilustrasi digital, animasi 3D, dan fotografi kreatif dari mahasiswa dan kreator lokal Yogyakarta.',
            'description2' => 'Acara ini dilengkapi live drawing session, bursa merchandise art print, dan talkshow bersama komikus profesional.',
            'date' => '2026-10-10 10:00:00',
            'location' => 'Galeri Seni Amikom Yogyakarta',
            'price' => 25000,
            'stock' => 300,
            'poster_path' => 'assets/concert.png',
            'organizer_name' => 'UKM KOMA Amikom',
            'organizer_initials' => 'KOM',
        ]);

        Event::create([
            'organization_id' => $orgGdsc->id,
            'category_id' => $teknologi->id,
            'title' => 'National AI & Cloud Computing Summit 2026',
            'slug' => 'national-ai-cloud-summit-2026',
            'description' => 'Simposium nasional yang menghadirkan pakar Artificial Intelligence dan Cloud Infrastructure untuk ekosistem startup Indonesia.',
            'description2' => 'Topik bahasan meliputi Large Language Models (LLM), MLOps, Microservices, dan arsitektur serverless modern.',
            'date' => '2026-10-24 08:30:00',
            'location' => 'Grand Pacific Hall Yogyakarta',
            'price' => 150000,
            'stock' => 250,
            'poster_path' => 'assets/workshop.png',
            'organizer_name' => 'Google Cloud Student Community',
            'organizer_initials' => 'GCS',
        ]);

        Event::create([
            'organization_id' => $orgHimaIF->id,
            'category_id' => $teknologi->id,
            'title' => 'Web3 & Blockchain Developer Hackathon 2026',
            'slug' => 'web3-blockchain-hackathon-2026',
            'description' => 'Kompetisi hackathon 24 jam membangun aplikasi terdesentralisasi (DApps) dan smart contract untuk mahasiswa Indonesia.',
            'description2' => 'Total hadiah senilai Rp 50.000.000 + pendampingan inkubasi startup dari investor Web3 ternama.',
            'date' => '2026-11-05 09:00:00',
            'location' => 'Ruang Innovation Center Amikom Yogyakarta',
            'price' => 0, // Bypass Free Event
            'stock' => 120,
            'poster_path' => 'assets/hackathon.png',
            'organizer_name' => 'Inovasi Digital Amikom',
            'organizer_initials' => 'IDA',
        ]);

        // 5. Partners Seed Data
        Partner::create([
            'name' => 'Universitas Amikom Yogyakarta',
            'logo_url' => 'https://ui-avatars.com/api/?name=Amikom+University&background=6366f1&color=fff&size=128'
        ]);

        Partner::create([
            'name' => 'Gojek Indonesia',
            'logo_url' => 'https://ui-avatars.com/api/?name=Gojek&background=10b981&color=fff&size=128'
        ]);

        Partner::create([
            'name' => 'Google Cloud',
            'logo_url' => 'https://ui-avatars.com/api/?name=Google+Cloud&background=ef4444&color=fff&size=128'
        ]);

        Partner::create([
            'name' => 'Dinas Kebudayaan DIY',
            'logo_url' => 'https://ui-avatars.com/api/?name=Disbud+DIY&background=f59e0b&color=fff&size=128'
        ]);
    }
}

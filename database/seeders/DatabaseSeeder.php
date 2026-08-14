<?php

namespace Database\Seeders;

use App\Models\Capability;
use App\Models\CompanyPillar;
use App\Models\Partner;
use App\Models\PlatformStep;
use App\Models\Project;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@dotscorporate.com'],
            [
                'name' => 'DOTS Admin',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Site Settings
        SiteSetting::updateOrCreate(
            ['key' => 'hero'],
            ['value' => [
                'badge' => [
                    'en' => 'PT. Digital Otentikasi Teknologi Semesta (DOTS)',
                    'id' => 'PT. Digital Otentikasi Teknologi Semesta (DOTS)',
                ],
                'headline1' => [
                    'en' => 'AI Parking & Security',
                    'id' => 'Sistem Parkir Cerdas &',
                ],
                'headline2' => [
                    'en' => 'Smart Innovation Ecosystem',
                    'id' => 'Keamanan Berbasis AI Engine',
                ],
                'desc' => [
                    'en' => 'Empowering smart cities and corporate properties through ANPR EV detection, biometric face recognition, OCR add-on, and real-time security event alerts.',
                    'id' => 'Memberdayakan perumahan & properti korporat melalui teknologi ANPR EV, biometrik pengenal wajah, add-on OCR, dan notifikasi peringatan keamanan real-time.',
                ],
                'primary' => [
                    'en' => 'Explore AI Systems',
                    'id' => 'Jelajahi Sistem AI',
                ],
                'secondary' => [
                    'en' => 'Contact Us',
                    'id' => 'Hubungi Kami',
                ],
            ]]
        );

        SiteSetting::updateOrCreate(
            ['key' => 'about_stats'],
            ['value' => [
                'en' => [
                    ['value' => '50+', 'label' => 'Enterprise Deployments'],
                    ['value' => '99.8%', 'label' => 'ANPR Accuracy'],
                    ['value' => '8+', 'label' => 'Years AI Tech Innovation'],
                ],
                'id' => [
                    ['value' => '50+', 'label' => 'Penerapan Korporat'],
                    ['value' => '99.8%', 'label' => 'Akurasi ANPR AI'],
                    ['value' => '8+', 'label' => 'Tahun Inovasi Teknologi AI'],
                ],
            ]]
        );

        SiteSetting::updateOrCreate(
            ['key' => 'contact_info'],
            ['value' => [
                'address' => [
                    'TRIO Building',
                    'Jl. Mampang Prapatan Raya No.17E-F',
                    'RT.004/RW 006, Mampang Prapatan',
                    'Jakarta Selatan 12790',
                ],
                'email' => 'marketing@dotscorporate.com',
                'phones' => ['+62 878-3811-3470', '+62 813-1538-8229'],
                'map_label' => 'Jakarta Selatan, ID',
            ]]
        );

        // 3. Company Pillars
        CompanyPillar::truncate();
        $pillars = [
            [
                'icon' => 'lightbulb',
                'title' => [
                    'en' => 'AI Innovation-First',
                    'id' => 'Inovasi Berbasis AI',
                ],
                'description' => [
                    'en' => 'Continuous R&D in computer vision, OCR text extraction, and biometric face recognition algorithms.',
                    'id' => 'R&D berkelanjutan pada computer vision, ekstraksi teks OCR, dan algoritma pengenalan wajah biometrik.',
                ],
                'sort_order' => 1,
            ],
            [
                'icon' => 'shield-check',
                'title' => [
                    'en' => 'Comprehensive Security',
                    'id' => 'Keamanan Komprehensif',
                ],
                'description' => [
                    'en' => 'Double plate fraud detection, blacklisting alert triggers, and biometric driver-vehicle pairing.',
                    'id' => 'Deteksi kecurangan pelat ganda, notifikasi blacklist, dan penambatan biometrik pengemudi-kendaraan.',
                ],
                'sort_order' => 2,
            ],
            [
                'icon' => 'trending-up',
                'title' => [
                    'en' => 'Data-Driven Analytics',
                    'id' => 'Analitik Berbasis Data',
                ],
                'description' => [
                    'en' => 'Real-time vehicle counting, occupancy trends, and multi-parameter historical data filtering.',
                    'id' => 'Penghitungan kendaraan real-time, tren okupansi, dan penyaringan data historis multi-parameter.',
                ],
                'sort_order' => 3,
            ],
        ];

        foreach ($pillars as $pillar) {
            CompanyPillar::create($pillar);
        }

        // 4. Capabilities (All 8 Brochure Technical System Specifications)
        Capability::truncate();
        $capabilities = [
            [
                'badge' => ['en' => 'ANPR Engine', 'id' => 'ANPR Engine'],
                'title' => ['en' => 'ANPR : Electric Vehicle (EV) Detection', 'id' => 'ANPR : Deteksi Mobil Listrik (EV)'],
                'description' => [
                    'en' => 'AI recognizes the blue line design on EV plate numbers to automatically grant gate barrier access into dedicated EV Charging & Parking Clusters.',
                    'id' => 'AI mengenali garis biru khas pelat kendaraan listrik (EV) secara otomatis untuk mengizinkan akses ke kluster khusus EV Charging & Parkir.',
                ],
                'icon' => 'zap',
                'sort_order' => 1,
            ],
            [
                'badge' => ['en' => 'Member Access', 'id' => 'Akses Member'],
                'title' => ['en' => 'ANPR : Member & Tenant Auto-Gate', 'id' => 'ANPR : Auto-Gate Member & Penghuni'],
                'description' => [
                    'en' => 'Automatically recognizes registered tenant/member license plates for apartments and residential complexes, opening barrier gates instantly.',
                    'id' => 'Secara otomatis mengenali pelat nomor member/penghuni terdaftar untuk apartemen & perumahan, lalu membuka gerbang palang secara instan.',
                ],
                'icon' => 'shield-check',
                'sort_order' => 2,
            ],
            [
                'badge' => ['en' => 'Biometric Routing', 'id' => 'Navigasi Biometrik'],
                'title' => ['en' => 'Face Recognition : Ladies Driver Zone', 'id' => 'Pengenal Wajah : Zona Parkir Wanita'],
                'description' => [
                    'en' => 'Identifies woman/ladies drivers at the entry gate dispenser, printing tickets with dedicated routing guidance to the Ladies Parking Zone.',
                    'id' => 'Mengidentifikasi pengemudi wanita di dispenser gerbang masuk, mencetak tiket berpetunjuk khusus ke Zona Parkir Wanita.',
                ],
                'icon' => 'user-check',
                'sort_order' => 3,
            ],
            [
                'badge' => ['en' => 'Biometric Security', 'id' => 'Biometrik Keamanan'],
                'title' => ['en' => 'Face Recognition Ticketing & Security Audit', 'id' => 'Face Recognition Ticketing & Audit Keamanan'],
                'description' => [
                    'en' => 'Captures driver facial biometrics at ticket dispensers, pairing face data with vehicle images into Database for post-incident security audits.',
                    'id' => 'Mengambil sampel wajah pengemudi di dispenser tiket, memasangkannya dengan foto kendaraan ke Database untuk audit investigasi keamanan.',
                ],
                'icon' => 'scan-face',
                'sort_order' => 4,
            ],
            [
                'badge' => ['en' => 'Fraud Detection', 'id' => 'Deteksi Kecurangan'],
                'title' => ['en' => 'Double Number & Cloned Plate Alert', 'id' => 'Peringatan Pelat Ganda & Pemalsuan'],
                'description' => [
                    'en' => 'Detects duplicated or cloned plate numbers entering simultaneously, immediately dispatching real-time security alerts to officers.',
                    'id' => 'Mendeteksi nomor pelat ganda atau pemalsuan yang masuk bersamaan, langsung mengutus notifikasi alert real-time ke petugas sekuriti.',
                ],
                'icon' => 'alert-triangle',
                'sort_order' => 5,
            ],
            [
                'badge' => ['en' => 'Security Alert', 'id' => 'Alert Keamanan'],
                'title' => ['en' => 'Event Notification & Vehicle Blacklisting', 'id' => 'Notifikasi Event & Blacklist Kendaraan'],
                'description' => [
                    'en' => 'Triggers security alerts for suspicious vehicles based on custom event definitions and maintains automated vehicle blacklisting.',
                    'id' => 'Memicu peringatan keamanan untuk kendaraan mencurigakan berdasarkan definisi event khusus dan mengelola blacklist kendaraan otomatis.',
                ],
                'icon' => 'bell-ring',
                'sort_order' => 6,
            ],
            [
                'badge' => ['en' => 'OCR Add-On', 'id' => 'Add-On OCR'],
                'title' => ['en' => 'OCR Image-to-Text Conversion Add-On', 'id' => 'Add-On OCR Ekstraksi Gambar ke Teks'],
                'description' => [
                    'en' => 'Retrofits legacy parking systems by converting captured plate images into searchable digital text strings stored in database.',
                    'id' => 'Memutakhirkan sistem parkir lama dengan mengubah gambar pelat menjadi teks digital yang dapat dicari dan tersimpan di database.',
                ],
                'icon' => 'file-text',
                'sort_order' => 7,
            ],
            [
                'badge' => ['en' => 'Analytics Dashboard', 'id' => 'Dashboard Analitik'],
                'title' => ['en' => 'Historical Data & Occupancy Trend Dashboard', 'id' => 'Dashboard Data Historis & Tren Okupansi'],
                'description' => [
                    'en' => 'Interactive analytics visualizing vehicle flow, daily/weekly/12-month slot occupancy trends, vehicle color/type filtering, and PDF/Excel exporting.',
                    'id' => 'Analitik interaktif memvisualisasikan arus kendaraan, tren okupansi slot harian/mingguan/12 bulan, filter warna/tipe kendaraan, & ekspor PDF/Excel.',
                ],
                'icon' => 'bar-chart-3',
                'sort_order' => 8,
            ],
        ];

        foreach ($capabilities as $cap) {
            Capability::create($cap);
        }

        // 5. Projects
        Project::truncate();
        Project::create([
            'client_name' => 'Menara Bank Danamon',
            'category' => [
                'en' => 'Smart Attendance & Biometric Control',
                'id' => 'Akses Biometrik & Absensi Cerdas',
            ],
            'title' => [
                'en' => 'Hikvision MinMoe Biometric Access Control System',
                'id' => 'Sistem Kontrol Akses Biometrik Hikvision MinMoe',
            ],
            'description' => [
                'en' => 'A seamless integration of Hikvision hardware terminals into the Menara Bank Danamon ecosystem, providing deep learning face detection and anti-spoofing security.',
                'id' => 'Integrasi mulus terminal Hikvision ke ekosistem Menara Bank Danamon, memberikan deteksi wajah deep learning dan keamanan anti-spoofing.',
            ],
            'points' => [
                'en' => [
                    'Integrated Hikvision MinMoe series terminals at main building access points.',
                    'Deep Learning algorithms for real-time face detection and high accuracy.',
                    'Direct integration with Dots Thing cloud and local server architecture.',
                    'Anti-spoofing security features to prevent biometric fraud.',
                ],
                'id' => [
                    'Integrasi Hikvision Terminal seri MinMoe di titik akses utama gedung.',
                    'Algoritma Deep Learning untuk deteksi wajah real-time dengan akurasi tinggi.',
                    'Integrasi langsung dengan arsitektur cloud dan server lokal Dots Thing.',
                    'Fitur keamanan anti-spoofing untuk mencegah kecurangan biometrik.',
                ],
            ],
            'tags' => ['Hikvision Integrated', 'Cloud Sync', 'Face Biometrics'],
            'is_featured' => true,
            'sort_order' => 1,
        ]);

        $otherProjects = [
            [
                'title' => ['en' => 'Sky Parking & Lippo Mall Puri', 'id' => 'Sky Parking & Lippo Mall Puri'],
                'category' => ['en' => 'Smart Parking, EV ANPR & OCR', 'id' => 'Parkir Cerdas, EV ANPR & OCR'],
                'description' => [
                    'en' => 'Deployed ANPR EV detection, OCR image-to-text conversion, and automated barrier control across major retail property parking bays.',
                    'id' => 'Menerapkan deteksi EV ANPR, konversi gambar ke teks OCR, dan kontrol barrier otomatis di area parkir properti retail terkemuka.',
                ],
                'icon' => 'car-front',
                'sort_order' => 2,
            ],
            [
                'title' => ['en' => 'Linknet', 'id' => 'Linknet'],
                'category' => ['en' => 'Traffic & Vehicle Volume Analytics', 'id' => 'Analitik lalu Lintas & Volume Kendaraan'],
                'description' => [
                    'en' => 'Integrated CCTV video stream vehicle counting algorithms and live slot occupancy analytics to optimize traffic management.',
                    'id' => 'Mengintegrasikan algoritma penghitungan kendaraan stream CCTV dan analitik okupansi slot live untuk efisiensi lalu lintas.',
                ],
                'icon' => 'wifi-high',
                'sort_order' => 3,
            ],
            [
                'title' => ['en' => 'Ithaca Resources', 'id' => 'Ithaca Resources'],
                'category' => ['en' => 'IoT Totem & Security Integration', 'id' => 'Integrasi IoT Totem & Keamanan'],
                'description' => [
                    'en' => 'Delivered Smart Totem solutions, tenant whitelist auto-gate opening, and comprehensive energy monitoring systems.',
                    'id' => 'Menghadirkan solusi Smart Totem, auto-gate whitelist penghuni, dan sistem pemantauan energi komprehensif.',
                ],
                'icon' => 'factory',
                'sort_order' => 4,
            ],
            [
                'title' => ['en' => 'Zoning Parking & Robotics', 'id' => 'Zoning Parking & Robotics'],
                'category' => ['en' => 'Automation & Event Security Alerts', 'id' => 'Sistem Otomasi & Peringatan Keamanan'],
                'description' => [
                    'en' => 'Advanced automation, double plate fraud detection alerts, and intelligent parking management with robotics integration.',
                    'id' => 'Otomasi canggih, peringatan kecurangan pelat ganda, dan manajemen parkir cerdas terintegrasi robotika.',
                ],
                'icon' => 'database',
                'sort_order' => 5,
            ],
        ];

        foreach ($otherProjects as $proj) {
            Project::create($proj);
        }

        // 6. Platform Steps
        PlatformStep::truncate();
        $steps = [
            [
                'step_number' => 1,
                'icon' => 'cpu',
                'title' => ['en' => 'IoT Devices & Cameras', 'id' => 'Perangkat IoT & Kamera'],
                'description' => ['en' => 'ANPR, EV Sensors & Face Cameras', 'id' => 'Sensor ANPR, EV & Kamera Wajah'],
            ],
            [
                'step_number' => 2,
                'icon' => 'wifi',
                'title' => ['en' => 'IoT Gateway Edge AI', 'id' => 'Gateway IoT Edge AI'],
                'description' => ['en' => 'OCR & Biometric Real-time Processing', 'id' => 'Pemrosesan Real-time OCR & Biometrik'],
            ],
            [
                'step_number' => 3,
                'icon' => 'zap',
                'title' => ['en' => 'Connectivity & Auto-Gate', 'id' => 'Konektivitas & Auto-Gate'],
                'description' => ['en' => 'Whitelist Relay & Ticket Routing', 'id' => 'Relai Whitelist & Tiket Otomatis'],
            ],
            [
                'step_number' => 4,
                'icon' => 'server',
                'title' => ['en' => 'Cloud & Database Analytics', 'id' => 'Cloud & Analitik Database'],
                'description' => ['en' => 'Occupancy Trends & Security Alerts', 'id' => 'Tren Okupansi & Alert Keamanan'],
            ],
        ];

        foreach ($steps as $step) {
            PlatformStep::create($step);
        }

        // 7. Strategic Partners
        Partner::truncate();
        $partners = [
            ['name' => 'Hikvision', 'website_url' => 'https://www.hikvision.com', 'sort_order' => 1],
            ['name' => 'Bank Danamon', 'website_url' => 'https://www.danamon.co.id', 'sort_order' => 2],
            ['name' => 'Lippo Mall Puri', 'website_url' => 'https://www.lippomalls.com', 'sort_order' => 3],
            ['name' => 'Linknet', 'website_url' => 'https://www.linknet.co.id', 'sort_order' => 4],
            ['name' => 'Ithaca Resources', 'website_url' => '#', 'sort_order' => 5],
            ['name' => 'Sky Parking', 'website_url' => '#', 'sort_order' => 6],
        ];

        foreach ($partners as $p) {
            Partner::create($p);
        }
    }
}

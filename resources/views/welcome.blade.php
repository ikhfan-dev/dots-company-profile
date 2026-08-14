<!DOCTYPE html>
<html lang="{{ $lang }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Otentikasi Teknologi Semesta - Smart Innovation for a Connected System</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('logo.svg') }}">
    
    <!-- Google Fonts: Sora -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Sora', 'sans-serif'],
                    },
                    colors: {
                        darkBg: '#05070A',
                        cardBg: '#0A0D14',
                        cardBgHover: '#12161D',
                        cyanGlow: '#00D1FF',
                    }
                }
            }
        }
    </script>
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        @keyframes scan {
            0% { transform: translateY(0); }
            50% { transform: translateY(320px); }
            100% { transform: translateY(0); }
        }
        .animate-scanner {
            animation: scan 3s linear infinite;
        }

        /* Marquee Running Animation */
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        @keyframes marquee-reverse {
            0% { transform: translateX(-50%); }
            100% { transform: translateX(0%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 30s linear infinite;
        }
        .animate-marquee-slow {
            display: flex;
            width: max-content;
            animation: marquee 40s linear infinite;
        }
        .animate-marquee:hover, .animate-marquee-slow:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="bg-[#05070A] min-h-screen font-['Sora',sans-serif] text-gray-200 selection:bg-[#00D1FF]/30 selection:text-white overflow-x-hidden" x-data="{ scrolled: false, langOpen: false, mobileMenu: false }" @scroll.window="scrolled = (window.scrollY > 50)">

    <!-- Floating Toast Notification on Success -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 7000)" x-transition:enter="transition ease-out duration-300 transform" x-transition:enter-start="opacity-0 translate-y-[-20px] scale-95" x-transition:enter-end="opacity-100 translate-y-0 scale-100" x-transition:leave="transition ease-in duration-200 transform" x-transition:leave-start="opacity-100 translate-y-0 scale-100" x-transition:leave-end="opacity-0 translate-y-[-20px] scale-95" class="fixed top-24 right-6 z-[100] max-w-md bg-[#0A0D14]/95 border border-[#00D1FF] rounded-2xl p-5 shadow-[0_0_30px_rgba(0,209,255,0.4)] backdrop-blur-md flex items-start gap-4" style="display: none;">
            <div class="w-10 h-10 rounded-xl bg-[#00D1FF]/10 border border-[#00D1FF]/30 flex items-center justify-center shrink-0 shadow-[0_0_12px_rgba(0,209,255,0.2)]">
                <i data-lucide="check-circle" class="w-6 h-6 text-[#00D1FF]"></i>
            </div>
            <div class="flex-grow">
                <h4 class="text-white font-bold text-base mb-1">
                    {{ $lang === 'id' ? 'Pesan Berhasil Terkirim!' : 'Message Successfully Sent!' }}
                </h4>
                <p class="text-gray-300 text-xs leading-relaxed">
                    {{ $lang === 'id' ? 'Terima kasih telah menghubungi DOTS. Pesan Anda telah kami terima dan tim konsultan kami akan segera merespons.' : 'Thank you for contacting DOTS. Your inquiry has been received and our team will respond shortly.' }}
                </p>
            </div>
            <button @click="show = false" class="text-gray-400 hover:text-white transition-colors">
                <i data-lucide="x" class="w-4 h-4"></i>
            </button>
        </div>
    @endif

    <!-- Navbar -->
    <nav :class="scrolled ? 'bg-[#05070A]/80 backdrop-blur-md border-b border-[#00D1FF]/20' : 'bg-transparent'" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <!-- Logo -->
            <a href="#" @click.prevent="window.scrollTo({ top: 0, behavior: 'smooth' })" class="flex items-center group cursor-pointer">
                <div class="bg-[#00D1FF]/0 backdrop-blur-sm px-4 py-2.5 rounded-xl shadow-[0_0_15px_rgba(0,209,255,0.15)] border border-[#00D1FF]/20 transition-all duration-300 group-hover:scale-105 group-hover:border-[#00D1FF]/50 group-hover:shadow-[0_0_20px_rgba(0,209,255,0.3)]">
                    <img src="{{ asset('logo.svg') }}" alt="DOTS Logo" class="h-7 w-auto object-contain" />
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-7">
                <a href="#about" class="text-gray-300 hover:text-[#00D1FF] transition-colors text-sm font-medium">{{ $lang === 'id' ? 'Tentang' : 'About' }}</a>
                <a href="#capabilities" class="text-gray-300 hover:text-[#00D1FF] transition-colors text-sm font-medium">{{ $lang === 'id' ? 'Modul AI & Sistem' : 'AI Capabilities' }}</a>
                <a href="#brochure-workflows" class="text-gray-300 hover:text-[#00D1FF] transition-colors text-sm font-medium">{{ $lang === 'id' ? 'Alur Kerja Brosur' : 'System Workflows' }}</a>
                <a href="#partners" class="text-gray-300 hover:text-[#00D1FF] transition-colors text-sm font-medium">{{ $lang === 'id' ? 'Mitra Kami' : 'Our Partners' }}</a>
                <a href="#portfolio" class="text-gray-300 hover:text-[#00D1FF] transition-colors text-sm font-medium">{{ $lang === 'id' ? 'Portofolio' : 'Portfolio' }}</a>
                <a href="#contact" class="text-gray-300 hover:text-[#00D1FF] transition-colors text-sm font-medium">{{ $lang === 'id' ? 'Kontak' : 'Contact' }}</a>

                <!-- Language Switcher -->
                <div class="relative" @click.away="langOpen = false">
                    <button @click="langOpen = !langOpen" class="flex items-center gap-2 px-3 py-2 rounded-lg border border-gray-700 hover:border-[#00D1FF]/60 bg-[#0A0D14] hover:bg-[#12161D] transition-all duration-200 text-sm text-gray-300 hover:text-white">
                        <i data-lucide="globe" class="w-4 h-4 text-[#00D1FF]"></i>
                        <span>{{ $lang === 'id' ? '🇮🇩' : '🇬🇧' }}</span>
                        <span class="font-medium">{{ strtoupper($lang) }}</span>
                        <i data-lucide="chevron-down" class="w-3.5 h-3.5 transition-transform" :class="langOpen ? 'rotate-180' : ''"></i>
                    </button>

                    <div x-show="langOpen" x-transition class="absolute right-0 mt-2 w-44 bg-[#0A0D14] border border-[#1A2333] rounded-xl shadow-[0_8px_32px_rgba(0,0,0,0.5)] overflow-hidden z-50" style="display: none;">
                        <a href="{{ route('lang.switch', 'en') }}" class="w-full flex items-center gap-3 px-4 py-3 text-sm transition-colors {{ $lang === 'en' ? 'bg-[#00D1FF]/10 text-[#00D1FF] font-semibold' : 'text-gray-300 hover:bg-[#12161D] hover:text-white' }}">
                            <span class="text-base">🇬🇧</span>
                            <span>English</span>
                            @if($lang === 'en') <span class="ml-auto w-1.5 h-1.5 rounded-full bg-[#00D1FF]"></span> @endif
                        </a>
                        <a href="{{ route('lang.switch', 'id') }}" class="w-full flex items-center gap-3 px-4 py-3 text-sm transition-colors {{ $lang === 'id' ? 'bg-[#00D1FF]/10 text-[#00D1FF] font-semibold' : 'text-gray-300 hover:bg-[#12161D] hover:text-white' }}">
                            <span class="text-base">🇮🇩</span>
                            <span>Indonesia</span>
                            @if($lang === 'id') <span class="ml-auto w-1.5 h-1.5 rounded-full bg-[#00D1FF]"></span> @endif
                        </a>
                    </div>
                </div>
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden flex items-center gap-3">
                <a href="{{ route('lang.switch', $lang === 'en' ? 'id' : 'en') }}" class="flex items-center gap-1.5 px-2.5 py-1.5 rounded-lg border border-gray-700 bg-[#0A0D14] text-xs text-gray-300">
                    <span>{{ $lang === 'id' ? '🇮🇩 ID' : '🇬🇧 EN' }}</span>
                </a>
                <button class="text-white" @click="mobileMenu = !mobileMenu">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Nav Menu -->
        <div x-show="mobileMenu" x-transition class="md:hidden bg-[#05070A] border-b border-[#00D1FF]/20 px-6 py-4 flex flex-col gap-4" style="display: none;">
            <a href="#about" @click="mobileMenu = false" class="text-gray-300 hover:text-[#00D1FF]">{{ $lang === 'id' ? 'Tentang' : 'About' }}</a>
            <a href="#capabilities" @click="mobileMenu = false" class="text-gray-300 hover:text-[#00D1FF]">{{ $lang === 'id' ? 'Modul AI & Sistem' : 'AI Capabilities' }}</a>
            <a href="#brochure-workflows" @click="mobileMenu = false" class="text-gray-300 hover:text-[#00D1FF]">{{ $lang === 'id' ? 'Alur Kerja Brosur' : 'System Workflows' }}</a>
            <a href="#partners" @click="mobileMenu = false" class="text-gray-300 hover:text-[#00D1FF]">{{ $lang === 'id' ? 'Mitra Kami' : 'Our Partners' }}</a>
            <a href="#portfolio" @click="mobileMenu = false" class="text-gray-300 hover:text-[#00D1FF]">{{ $lang === 'id' ? 'Portofolio' : 'Portfolio' }}</a>
            <a href="#contact" @click="mobileMenu = false" class="text-gray-300 hover:text-[#00D1FF]">{{ $lang === 'id' ? 'Kontak' : 'Contact' }}</a>
            <a href="/cms" class="text-[#00D1FF] font-semibold">DOTS CMS Dashboard</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-[#05070A] pt-20">
        <div class="absolute inset-0 z-0">
            <img src="https://images.unsplash.com/photo-1750365919971-7dd273e7b317?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxmdXR1cmlzdGljJTIwZGlnaXRhbCUyMG5ldHdvcmt8ZW58MXx8fHwxNzczMDkzNDA4fDA&ixlib=rb-4.1.0&q=80&w=1080" alt="Futuristic Digital Network" class="w-full h-full object-cover opacity-20" />
            <div class="absolute inset-0 bg-gradient-to-b from-[#05070A]/80 via-[#05070A]/50 to-[#05070A]"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 flex flex-col items-center text-center">
            <span class="text-[#00D1FF] font-semibold tracking-wider text-sm uppercase mb-4 block">
                {{ $heroSetting['badge'][$lang] ?? 'Digital Otentikasi Teknologi Semesta' }}
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-6 leading-tight max-w-4xl">
                {{ $heroSetting['headline1'][$lang] ?? 'Sistem Parkir Cerdas &' }} <br class="hidden md:block" />
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#00D1FF] to-blue-500">
                    {{ $heroSetting['headline2'][$lang] ?? 'Keamanan Berbasis AI Engine' }}
                </span>
            </h1>

            <p class="text-gray-400 text-lg md:text-xl max-w-2xl mb-10">
                {{ $heroSetting['desc'][$lang] ?? 'Memberdayakan perumahan & properti korporat melalui teknologi ANPR EV, biometrik pengenal wajah, add-on OCR, dan notifikasi peringatan keamanan real-time.' }}
            </p>

            <div class="flex flex-col sm:flex-row items-center gap-4">
                <a href="#capabilities" class="group relative px-8 py-4 bg-[#00D1FF] text-[#05070A] font-bold rounded overflow-hidden shadow-[0_0_20px_rgba(0,209,255,0.4)] hover:shadow-[0_0_40px_rgba(0,209,255,0.8)] transition-all duration-300 flex items-center gap-3">
                    <span class="relative z-10">{{ $heroSetting['primary'][$lang] ?? 'Jelajahi Sistem AI' }}</span>
                    <i data-lucide="arrow-right" class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform"></i>
                    <div class="absolute inset-0 bg-white/20 -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
                </a>

                <a href="#contact" class="group px-8 py-4 border border-[#00D1FF]/60 text-[#00D1FF] font-bold rounded hover:bg-[#00D1FF]/10 hover:border-[#00D1FF] transition-all duration-300 flex items-center gap-3">
                    <i data-lucide="message-circle" class="w-5 h-5"></i>
                    <span>{{ $heroSetting['secondary'][$lang] ?? 'Hubungi Kami' }}</span>
                </a>
            </div>
        </div>

        <div class="absolute bottom-6 left-0 right-0 w-full flex flex-col items-center justify-center text-center gap-2 text-gray-500 animate-bounce pointer-events-none z-20">
            <span class="text-xs uppercase tracking-widest text-center font-medium">{{ $lang === 'id' ? 'Gulir untuk menjelajahi' : 'Scroll to explore' }}</span>
            <div class="w-[1px] h-8 bg-gradient-to-b from-[#00D1FF] to-transparent"></div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="about" class="py-24 bg-[#05070A] relative overflow-hidden border-t border-gray-900">
        <div class="absolute top-1/2 right-0 w-[500px] h-[500px] bg-[#00D1FF]/4 blur-[150px] rounded-full pointer-events-none -translate-y-1/2"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <!-- Left -->
                <div>
                    <span class="text-[#00D1FF] font-semibold tracking-wider text-sm uppercase mb-2 block">
                        {{ $lang === 'id' ? 'Tentang DOTS' : 'About DOTS' }}
                    </span>
                    <h2 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight">
                        {{ $lang === 'id' ? 'Membangun Kemitraan Strategis' : 'Forging Strategic Partnerships' }}
                    </h2>
                    <p class="text-gray-400 leading-relaxed mb-8">
                        {{ $lang === 'id' ? 'DOTS berspesialisasi dalam mengembangkan sistem mutakhir seperti ekspansi IoT dan Kecerdasan Buatan (AI). Selama bertahun-tahun, kami terus beradaptasi dengan kemajuan teknologi terbaru, secara konsisten memberikan solusi yang praktis dan andal.' : 'DOTS specializes in developing cutting-edge systems such as IoT and Artificial Intelligence (AI) expansion. Over the years, we have evolved and adapted to the latest technological advancements, consistently delivering practical and reliable solutions.' }}
                    </p>

                    <div class="flex flex-wrap gap-8">
                        @if(isset($aboutStats[$lang]))
                            @foreach($aboutStats[$lang] as $s)
                                <div>
                                    <p class="text-3xl font-extrabold text-[#00D1FF]">{{ $s['value'] }}</p>
                                    <p class="text-gray-500 text-sm mt-1">{{ $s['label'] }}</p>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>

                <!-- Right Pillars -->
                <div class="flex flex-col gap-5">
                    @foreach($pillars as $p)
                        <div class="group flex items-start gap-5 bg-[#0A0D14] border border-[#1A2333] hover:border-[#00D1FF]/40 rounded-2xl p-6 transition-colors duration-300">
                            <div class="w-12 h-12 rounded-xl bg-[#05070A] border border-[#00D1FF]/20 flex items-center justify-center shrink-0 shadow-[0_0_12px_rgba(0,209,255,0.1)] group-hover:shadow-[0_0_20px_rgba(0,209,255,0.25)] transition-shadow">
                                <i data-lucide="{{ $p->icon ?? 'lightbulb' }}" class="w-6 h-6 text-[#00D1FF]"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold mb-1">{{ $p->getTranslation('title', $lang) }}</h4>
                                <p class="text-gray-400 text-sm leading-relaxed">{{ $p->getTranslation('description', $lang) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- 8 Full Capabilities & Technical System Modules -->
    <section id="capabilities" class="py-24 bg-[#05070A] relative">
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] bg-[#00D1FF]/4 blur-[140px] rounded-full pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="mb-16 text-center">
                <span class="text-[#00D1FF] font-semibold tracking-wider text-sm uppercase mb-2 block">
                    {{ $lang === 'id' ? 'Spesifikasi Sistem Resmi (Hasil Analisis Brosur)' : 'Official System Specifications' }}
                </span>
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">
                    {{ $lang === 'id' ? '8 Kapabilitas & Modul Spesifikasi AI Engine' : '8 AI Engine Capabilities & Technical Specs' }}
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-sm">
                    {{ $lang === 'id' ? 'Seluruh modul teknologi yang dikembangkan oleh DOTS meliputi ANPR EV, biometrik pengenal wajah, deteksi pelat ganda, add-on OCR, hingga analisis tren okupansi.' : 'Full suite of technology modules engineered by DOTS covering EV ANPR, face biometrics, double plate detection, OCR add-on, and occupancy trend analytics.' }}
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($capabilities as $cap)
                    <div class="group relative rounded-2xl overflow-hidden bg-[#0A0D14] border border-[#1A2333] hover:border-[#00D1FF]/60 transition-all duration-500 p-6 flex flex-col shadow-lg hover:-translate-y-1">
                        <div class="absolute inset-0 bg-gradient-to-br from-[#00D1FF]/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
                        <div class="absolute bottom-0 left-0 w-full h-[1px] bg-gradient-to-r from-transparent via-[#00D1FF]/40 to-transparent scale-x-0 group-hover:scale-x-100 transition-transform duration-700"></div>

                        <div class="relative z-10 flex flex-col h-full">
                            <div class="flex items-center justify-between mb-5">
                                <div class="w-12 h-12 rounded-xl bg-[#05070A] border border-[#00D1FF]/30 flex items-center justify-center shadow-[0_0_12px_rgba(0,209,255,0.1)] group-hover:shadow-[0_0_20px_rgba(0,209,255,0.3)] transition-shadow duration-300">
                                    <i data-lucide="{{ $cap->icon ?? 'sparkles' }}" class="w-6 h-6 text-[#00D1FF]"></i>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-[9px] font-mono font-semibold uppercase tracking-wider bg-[#00D1FF]/10 text-[#00D1FF] border border-[#00D1FF]/20">
                                    {{ $cap->getTranslation('badge', $lang) }}
                                </span>
                            </div>

                            <h3 class="text-base font-bold text-white mb-2.5 group-hover:text-[#00D1FF] transition-colors leading-snug">{{ $cap->getTranslation('title', $lang) }}</h3>
                            <p class="text-gray-400 text-xs leading-relaxed flex-grow">{{ $cap->getTranslation('description', $lang) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Interactive Brochure System Workflows & Simulator -->
    <section id="brochure-workflows" class="py-24 bg-[#05070A] relative border-t border-gray-900 overflow-hidden" x-data="{ tab: 'ev' }">
        <div class="absolute top-1/2 right-0 w-[600px] h-[400px] bg-[#00D1FF]/4 blur-[160px] rounded-full pointer-events-none -translate-y-1/2"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="mb-16 text-center">
                <span class="text-[#00D1FF] font-semibold tracking-wider text-sm uppercase mb-2 block">
                    {{ $lang === 'id' ? 'Visualisasi Alur Kerja Teknis' : 'Technical Workflow Diagram' }}
                </span>
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">
                    {{ $lang === 'id' ? 'Simulasi Alur Kerja Sistem AI' : 'Interactive System Workflows' }}
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto text-sm">
                    {{ $lang === 'id' ? 'Pahami alur proses operasional dari modul-modul utama brosur resmi DOTS secara interaktif di bawah ini.' : 'Understand the operational process flow of core DOTS brochure modules interactively below.' }}
                </p>

                <!-- Workflow Navigation Tabs -->
                <div class="flex flex-wrap items-center justify-center gap-3 mt-8">
                    <button @click="tab = 'ev'" :class="tab === 'ev' ? 'bg-[#00D1FF] text-[#05070A] font-bold shadow-[0_0_20px_rgba(0,209,255,0.4)]' : 'bg-[#0A0D14] text-gray-300 border border-[#1A2333] hover:border-[#00D1FF]/50'" class="px-5 py-2.5 rounded-xl text-xs transition-all duration-300 flex items-center gap-2">
                        <i data-lucide="zap" class="w-4 h-4"></i>
                        <span>1. ANPR Mobil Listrik (EV)</span>
                    </button>
                    <button @click="tab = 'ladies'" :class="tab === 'ladies' ? 'bg-[#00D1FF] text-[#05070A] font-bold shadow-[0_0_20px_rgba(0,209,255,0.4)]' : 'bg-[#0A0D14] text-gray-300 border border-[#1A2333] hover:border-[#00D1FF]/50'" class="px-5 py-2.5 rounded-xl text-xs transition-all duration-300 flex items-center gap-2">
                        <i data-lucide="user-check" class="w-4 h-4"></i>
                        <span>2. Parkir Wanita (Ladies Zone)</span>
                    </button>
                    <button @click="tab = 'alert'" :class="tab === 'alert' ? 'bg-[#00D1FF] text-[#05070A] font-bold shadow-[0_0_20px_rgba(0,209,255,0.4)]' : 'bg-[#0A0D14] text-gray-300 border border-[#1A2333] hover:border-[#00D1FF]/50'" class="px-5 py-2.5 rounded-xl text-xs transition-all duration-300 flex items-center gap-2">
                        <i data-lucide="alert-triangle" class="w-4 h-4"></i>
                        <span>3. Alert Pelat Ganda & Blacklist</span>
                    </button>
                    <button @click="tab = 'ocr'" :class="tab === 'ocr' ? 'bg-[#00D1FF] text-[#05070A] font-bold shadow-[0_0_20px_rgba(0,209,255,0.4)]' : 'bg-[#0A0D14] text-gray-300 border border-[#1A2333] hover:border-[#00D1FF]/50'" class="px-5 py-2.5 rounded-xl text-xs transition-all duration-300 flex items-center gap-2">
                        <i data-lucide="file-text" class="w-4 h-4"></i>
                        <span>4. Add-On OCR Gambar ke Teks</span>
                    </button>
                </div>
            </div>

            <!-- Tab 1: EV ANPR Workflow -->
            <div x-show="tab === 'ev'" x-transition class="bg-[#0A0D14] border border-[#1A2333] rounded-2xl p-8 shadow-[0_8px_32px_rgba(0,0,0,0.5)]">
                <div class="flex items-center gap-3 mb-6 border-b border-[#1A2333] pb-4">
                    <div class="w-10 h-10 rounded-xl bg-[#00D1FF]/10 border border-[#00D1FF]/30 flex items-center justify-center text-[#00D1FF]">
                        <i data-lucide="zap" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">Automatic Number Plate Recognition : Electric Vehicle (EV)</h3>
                        <p class="text-xs text-gray-400">Deteksi khusus pelat nomor berbintang/garis biru untuk pengarahan otomatis ke area EV Charging</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 items-center relative">
                    <!-- Step 1 -->
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-[#12161D] text-[#00D1FF] font-bold flex items-center justify-center mb-3 text-xs border border-[#00D1FF]/30">01</div>
                        <h4 class="text-white font-bold text-sm mb-1">Scan Pelat EV</h4>
                        <p class="text-gray-400 text-xs">Kamera meng-capture pelat kendaraan di gerbang masuk.</p>
                    </div>
                    <!-- Step 2 -->
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-[#12161D] text-[#00D1FF] font-bold flex items-center justify-center mb-3 text-xs border border-[#00D1FF]/30">02</div>
                        <h4 class="text-white font-bold text-sm mb-1">AI Garis Biru</h4>
                        <p class="text-gray-400 text-xs">Algoritma mengidentifikasi penanda khusus garis biru pelat EV.</p>
                    </div>
                    <!-- Step 3 -->
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full bg-[#12161D] text-[#00D1FF] font-bold flex items-center justify-center mb-3 text-xs border border-[#00D1FF]/30">03</div>
                        <h4 class="text-white font-bold text-sm mb-1">Validasi Cluster</h4>
                        <p class="text-gray-400 text-xs">Sistem memverifikasi ketersediaan slot di EV Parking Zone.</p>
                    </div>
                    <!-- Step 4 -->
                    <div class="bg-[#00D1FF]/10 border border-[#00D1FF]/50 rounded-xl p-5 text-center flex flex-col items-center shadow-[0_0_20px_rgba(0,209,255,0.2)]">
                        <div class="w-10 h-10 rounded-full bg-[#00D1FF] text-[#05070A] font-bold flex items-center justify-center mb-3 text-xs">04</div>
                        <h4 class="text-[#00D1FF] font-bold text-sm mb-1">Buka Auto-Gate EV</h4>
                        <p class="text-gray-200 text-xs">Gerbang terbuka & pengemudi diarahkan ke area stasioner cas EV.</p>
                    </div>
                </div>
            </div>

            <!-- Tab 2: Ladies Driver Workflow -->
            <div x-show="tab === 'ladies'" x-transition class="bg-[#0A0D14] border border-[#1A2333] rounded-2xl p-8 shadow-[0_8px_32px_rgba(0,0,0,0.5)]" style="display: none;">
                <div class="flex items-center gap-3 mb-6 border-b border-[#1A2333] pb-4">
                    <div class="w-10 h-10 rounded-xl bg-[#00D1FF]/10 border border-[#00D1FF]/30 flex items-center justify-center text-[#00D1FF]">
                        <i data-lucide="user-check" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">Face Recognition : Ladies Driver Zone Routing</h3>
                        <p class="text-xs text-gray-400">Pengenalan sampel biometrik wajah pengemudi wanita untuk pencetakan tiket rute khusus Ladies Parking</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <i data-lucide="scan-face" class="w-8 h-8 text-[#00D1FF] mb-3"></i>
                        <h4 class="text-white font-bold text-sm mb-1">Deteksi Wajah Pengemudi</h4>
                        <p class="text-gray-400 text-xs">Kamera dispenser tiket meng-capture wajah pengemudi secara real-time.</p>
                    </div>
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <i data-lucide="sparkles" class="w-8 h-8 text-[#00D1FF] mb-3"></i>
                        <h4 class="text-white font-bold text-sm mb-1">Klasifikasi Gender AI</h4>
                        <p class="text-gray-400 text-xs">AI mendeteksi sampel biometrik pengemudi wanita.</p>
                    </div>
                    <div class="bg-[#00D1FF]/10 border border-[#00D1FF]/50 rounded-xl p-5 text-center flex flex-col items-center shadow-[0_0_20px_rgba(0,209,255,0.2)]">
                        <i data-lucide="ticket" class="w-8 h-8 text-[#00D1FF] mb-3"></i>
                        <h4 class="text-[#00D1FF] font-bold text-sm mb-1">Cetak Tiket & Rute Ladies Zone</h4>
                        <p class="text-gray-200 text-xs">Tiket mencetak saran lokasi parkir di Zona Parkir Khusus Wanita.</p>
                    </div>
                </div>
            </div>

            <!-- Tab 3: Security Fraud Alert Workflow -->
            <div x-show="tab === 'alert'" x-transition class="bg-[#0A0D14] border border-[#1A2333] rounded-2xl p-8 shadow-[0_8px_32px_rgba(0,0,0,0.5)]" style="display: none;">
                <div class="flex items-center gap-3 mb-6 border-b border-[#1A2333] pb-4">
                    <div class="w-10 h-10 rounded-xl bg-red-500/10 border border-red-500/30 flex items-center justify-center text-red-400">
                        <i data-lucide="alert-triangle" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">Double Number Plate Detection & Blacklist Alert</h3>
                        <p class="text-xs text-gray-400">Pencegahan kecurangan pelat nomor ganda/pemalsuan dan notifikasi otomatis ke petugas keamanan</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <i data-lucide="camera" class="w-8 h-8 text-[#00D1FF] mb-3"></i>
                        <h4 class="text-white font-bold text-sm mb-1">Capture Pelat Masuk</h4>
                        <p class="text-gray-400 text-xs">Kamera meng-capture pelat nomor yang masuk di pos gerbang.</p>
                    </div>
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <i data-lucide="database" class="w-8 h-8 text-[#00D1FF] mb-3"></i>
                        <h4 class="text-white font-bold text-sm mb-1">Cross-check Database Live</h4>
                        <p class="text-gray-400 text-xs">Sistem mendeteksi pelat yang sama sudah tercatat ada di dalam lokasi.</p>
                    </div>
                    <div class="bg-red-500/10 border border-red-500/50 rounded-xl p-5 text-center flex flex-col items-center shadow-[0_0_20px_rgba(239,68,68,0.2)]">
                        <i data-lucide="bell-ring" class="w-8 h-8 text-red-400 mb-3 animate-bounce"></i>
                        <h4 class="text-red-400 font-bold text-sm mb-1">ALERT : Palang Kunci & Kirim Notifikasi Sekuriti</h4>
                        <p class="text-gray-200 text-xs">Palang tetap terkunci dan notifikasi kecurangan terikirim ke sekuriti.</p>
                    </div>
                </div>
            </div>

            <!-- Tab 4: OCR Add-on Workflow -->
            <div x-show="tab === 'ocr'" x-transition class="bg-[#0A0D14] border border-[#1A2333] rounded-2xl p-8 shadow-[0_8px_32px_rgba(0,0,0,0.5)]" style="display: none;">
                <div class="flex items-center gap-3 mb-6 border-b border-[#1A2333] pb-4">
                    <div class="w-10 h-10 rounded-xl bg-[#00D1FF]/10 border border-[#00D1FF]/30 flex items-center justify-center text-[#00D1FF]">
                        <i data-lucide="file-text" class="w-5 h-5"></i>
                    </div>
                    <div>
                        <h3 class="text-lg font-bold text-white">OCR Add-On : Retrofitting Sistem Parkir Lama</h3>
                        <p class="text-xs text-gray-400">Mengonversi kamera parkir konvensional menjadi ekstraksi data teks digital yang dapat dicari</p>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-center">
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <i data-lucide="image" class="w-8 h-8 text-[#00D1FF] mb-3"></i>
                        <h4 class="text-white font-bold text-sm mb-1">Input Kamera Lama (Hanya Foto)</h4>
                        <p class="text-gray-400 text-xs">Sistem parkir lama hanya menyimpan gambar JPG tanpa data teks.</p>
                    </div>
                    <div class="bg-[#05070A] border border-[#1A2333] rounded-xl p-5 text-center flex flex-col items-center">
                        <i data-lucide="cpu" class="w-8 h-8 text-[#00D1FF] mb-3"></i>
                        <h4 class="text-white font-bold text-sm mb-1">Add-On Engine OCR DOTS</h4>
                        <p class="text-gray-400 text-xs">Mesin OCR mengekstrak karakter huruf & angka dari foto secara otomatis.</p>
                    </div>
                    <div class="bg-[#00D1FF]/10 border border-[#00D1FF]/50 rounded-xl p-5 text-center flex flex-col items-center shadow-[0_0_20px_rgba(0,209,255,0.2)]">
                        <i data-lucide="binary" class="w-8 h-8 text-[#00D1FF] mb-3"></i>
                        <h4 class="text-[#00D1FF] font-bold text-sm mb-1">Data Teks Digital Terindeks SQL</h4>
                        <p class="text-gray-200 text-xs">Hasil ekstraksi siap dicari via filter plat, tipe mobil, & diekspor ke Excel/PDF.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Strategic Partners Section (Infinite Marquee) -->
    <section id="partners" class="py-20 bg-[#05070A] relative overflow-hidden border-t border-gray-900">
        <div class="absolute top-1/2 left-0 w-[400px] h-[400px] bg-[#00D1FF]/3 blur-[120px] rounded-full pointer-events-none -translate-y-1/2"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="mb-12 text-center">
                <span class="text-[#00D1FF] font-semibold tracking-wider text-sm uppercase mb-2 block">
                    {{ $lang === 'id' ? 'Ekosistem Terpercaya' : 'Trusted Ecosystem' }}
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-3">
                    {{ $lang === 'id' ? 'Mitra Strategis Kami' : 'Our Strategic Partners' }}
                </h2>
                <p class="text-gray-400 max-w-xl mx-auto text-sm">
                    {{ $lang === 'id' ? 'Bekerja sama dengan berbagai perusahaan terkemuka untuk menghadirkan integrasi teknologi tingkat tinggi.' : 'Collaborating with industry leaders to deliver top-tier technological integrations.' }}
                </p>
            </div>

            <!-- Continuous Infinite Marquee Banner -->
            <div class="relative w-full overflow-hidden py-4">
                <!-- Left & Right Gradient Fades -->
                <div class="absolute top-0 bottom-0 left-0 w-24 bg-gradient-to-r from-[#05070A] to-transparent z-10 pointer-events-none"></div>
                <div class="absolute top-0 bottom-0 right-0 w-24 bg-gradient-to-l from-[#05070A] to-transparent z-10 pointer-events-none"></div>

                <div class="animate-marquee flex gap-6 items-center">
                    @php
                        $partnerList = $partners->concat($partners)->concat($partners);
                    @endphp
                    @foreach($partnerList as $partner)
                        <a href="{{ $partner->website_url ?? '#' }}" target="_blank" rel="noopener noreferrer" class="group shrink-0 w-52 bg-[#0A0D14] border border-[#1A2333] hover:border-[#00D1FF]/60 rounded-xl p-5 flex flex-col items-center justify-center transition-all duration-300 hover:-translate-y-1 shadow-[0_4px_20px_rgba(0,0,0,0.4)] hover:shadow-[0_0_25px_rgba(0,209,255,0.2)] cursor-pointer">
                            @if($partner->logo)
                                <img src="{{ \Illuminate\Support\Facades\Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="h-10 w-auto object-contain mb-3 filter grayscale opacity-70 group-hover:grayscale-0 group-hover:opacity-100 transition-all" />
                            @else
                                <div class="w-12 h-12 rounded-lg bg-[#05070A] border border-[#00D1FF]/20 flex items-center justify-center mb-3 group-hover:border-[#00D1FF]/60 group-hover:shadow-[0_0_15px_rgba(0,209,255,0.3)] transition-all">
                                    <i data-lucide="building-2" class="w-6 h-6 text-[#00D1FF]"></i>
                                </div>
                            @endif
                            <span class="text-gray-300 group-hover:text-white font-semibold text-xs text-center transition-colors">
                                {{ $partner->name }}
                            </span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-24 bg-[#05070A] relative overflow-hidden border-t border-gray-900">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="mb-16">
                <span class="text-[#00D1FF] font-semibold tracking-wider text-sm uppercase mb-2 block">{{ $lang === 'id' ? 'Etalase Proyek' : 'Project Showcase' }}</span>
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ $lang === 'id' ? 'Rekam Jejak Kami' : 'Our Track Record' }}</h2>
            </div>

            @if($featuredProject)
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-24">
                    <div class="flex flex-col gap-6">
                        <div>
                            <h3 class="text-4xl font-extrabold text-white mb-2">{{ $featuredProject->client_name }}</h3>
                            <p class="text-xl text-[#00D1FF] font-medium mb-6">{{ $featuredProject->getTranslation('category', $lang) }}</p>
                            <p class="text-gray-400 text-lg leading-relaxed">{{ $featuredProject->getTranslation('description', $lang) }}</p>
                        </div>

                        <div class="space-y-4 mt-4">
                            @if(isset($featuredProject->points[$lang]))
                                @foreach($featuredProject->points[$lang] as $pt)
                                    <div class="flex items-start gap-4">
                                        <i data-lucide="check-circle" class="w-6 h-6 text-[#00D1FF] shrink-0 mt-0.5"></i>
                                        <p class="text-gray-300">{{ $pt }}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <div class="mt-8 flex gap-4 flex-wrap">
                            @if($featuredProject->tags)
                                @foreach($featuredProject->tags as $tag)
                                    <div class="px-4 py-2 rounded-md bg-[#12161D] border border-gray-800 flex items-center gap-2">
                                        <i data-lucide="shield-check" class="w-5 h-5 text-[#00D1FF]"></i>
                                        <span class="text-white text-sm font-semibold">{{ $tag }}</span>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <!-- Scanner Showcase Box -->
                    <div class="relative">
                        <div class="absolute -inset-4 bg-gradient-to-r from-[#00D1FF]/20 to-blue-600/20 blur-xl rounded-3xl pointer-events-none"></div>
                        <div class="relative rounded-2xl overflow-hidden border border-gray-800 bg-[#12161D] aspect-[4/3] flex items-center justify-center p-2">
                            <img src="https://images.unsplash.com/photo-1768270181430-3e3672a32283?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtb2Rlcm4lMjBjb3Jwb3JhdGUlMjBsb2JieSUyMGVsZXZhdG9yfGVufDF8fHx8MTc3MzA5MzQwOHww&ixlib=rb-4.1.0&q=80&w=1080" alt="Corporate Lobby" class="w-full h-full object-cover rounded-xl opacity-60 mix-blend-luminosity" />
                            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                <div class="relative w-64 h-80 border-2 border-[#00D1FF] rounded-lg shadow-[0_0_30px_rgba(0,209,255,0.4)] bg-[#05070A]/40 backdrop-blur-sm overflow-hidden">
                                    <div class="w-full h-1 bg-gradient-to-r from-transparent via-[#00D1FF] to-transparent absolute top-0 left-0 shadow-[0_0_10px_#00D1FF] animate-scanner"></div>
                                    <div class="absolute inset-0 flex flex-col justify-end p-4">
                                        <div class="flex justify-between items-center text-[10px] text-[#00D1FF] font-mono mb-1">
                                            <span>ID: 984-A2</span>
                                            <span>MATCH: 99.8%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Additional Projects Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($otherProjects as $proj)
                    <div class="bg-[#12161D]/50 border border-gray-800 rounded-xl p-6 hover:bg-[#12161D] hover:border-[#00D1FF]/40 transition-all duration-300 flex flex-col group">
                        <div class="w-12 h-12 rounded-lg bg-[#05070A] border border-[#00D1FF]/20 flex items-center justify-center mb-5 group-hover:shadow-[0_0_15px_rgba(0,209,255,0.2)] transition-shadow">
                            <i data-lucide="{{ $proj->icon ?? 'briefcase' }}" class="w-6 h-6 text-[#00D1FF]"></i>
                        </div>
                        <h4 class="text-lg font-bold text-white mb-1 group-hover:text-[#00D1FF] transition-colors">{{ $proj->getTranslation('title', $lang) }}</h4>
                        <p class="text-xs text-[#00D1FF] font-medium uppercase tracking-wider mb-3">{{ $proj->getTranslation('category', $lang) }}</p>
                        <p class="text-gray-400 text-sm leading-relaxed flex-grow">{{ $proj->getTranslation('description', $lang) }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Dedicated Infrastructure Section (Infinite Flow Marquee) -->
    <section id="platform" class="py-24 bg-[#05070A] relative border-t border-gray-900 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10 text-center">
            <div class="mb-16 flex flex-col items-center">
                <span class="text-[#00D1FF] font-semibold tracking-wider text-sm uppercase mb-2 block">"Dots Thing" IoT Platform</span>
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ $lang === 'id' ? 'Infrastruktur Khusus' : 'Dedicated Infrastructure' }}</h2>
                <p class="text-gray-400 max-w-2xl text-sm">{{ $lang === 'id' ? 'Kerangka IoT komprehensif yang dirancang untuk mengelola dan menganalisis data yang dikumpulkan dari sensor dan aktuator.' : 'A comprehensive IoT framework designed to manage and analyze data collected from sensors and actuators.' }}</p>
            </div>

            <!-- Running Infrastructure Flow Marquee -->
            <div class="relative w-full overflow-hidden py-6">
                <!-- Left & Right Gradient Fades -->
                <div class="absolute top-0 bottom-0 left-0 w-24 bg-gradient-to-r from-[#05070A] to-transparent z-10 pointer-events-none"></div>
                <div class="absolute top-0 bottom-0 right-0 w-24 bg-gradient-to-l from-[#05070A] to-transparent z-10 pointer-events-none"></div>

                <div class="animate-marquee-slow flex gap-8 items-center">
                    @php
                        $stepList = $platformSteps->concat($platformSteps)->concat($platformSteps);
                    @endphp
                    @foreach($stepList as $st)
                        <div class="shrink-0 relative group">
                            <div class="bg-[#0A0D14] border border-[#1A2333] hover:border-[#00D1FF] rounded-2xl p-6 flex flex-col items-center justify-center w-64 h-56 transition-all duration-300 shadow-[0_4px_25px_rgba(0,0,0,0.5)] hover:shadow-[0_0_30px_rgba(0,209,255,0.25)] hover:-translate-y-1">
                                <div class="w-14 h-14 rounded-full bg-[#05070A] border border-[#00D1FF]/30 flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300 shadow-[0_0_15px_rgba(0,209,255,0.2)]">
                                    <i data-lucide="{{ $st->icon ?? 'cpu' }}" class="w-7 h-7 text-[#00D1FF]"></i>
                                </div>
                                <span class="text-[10px] font-mono text-[#00D1FF] uppercase tracking-widest mb-1">Step {{ $st->step_number }}</span>
                                <h3 class="text-base font-bold text-white text-center mb-1">{{ $st->getTranslation('title', $lang) }}</h3>
                                <p class="text-xs text-gray-400 text-center uppercase tracking-wider">{{ $st->getTranslation('description', $lang) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-[#05070A] relative overflow-hidden border-t border-gray-900">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="mb-16 text-center">
                <span class="text-[#00D1FF] font-semibold tracking-wider text-sm uppercase mb-2 block">{{ $lang === 'id' ? 'Hubungi Kami' : 'Contact Us' }}</span>
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-4">{{ $lang === 'id' ? 'Siap Memutakhirkan Sistem Anda?' : 'Ready to Upgrade Your System?' }}</h2>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-start">
                <!-- Info + Map -->
                <div class="flex flex-col gap-8">
                    <div class="flex flex-col gap-6">
                        <div class="flex items-start gap-4">
                            <div class="w-11 h-11 rounded-lg bg-[#12161D] border border-[#00D1FF]/20 flex items-center justify-center shrink-0 shadow-[0_0_12px_rgba(0,209,255,0.1)]">
                                <i data-lucide="map-pin" class="w-5 h-5 text-[#00D1FF]"></i>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm mb-1">{{ $lang === 'id' ? 'Kantor Pusat' : 'Head Office' }}</p>
                                <p class="text-gray-400 text-sm leading-relaxed">
                                    TRIO Building<br>
                                    Jl. Mampang Prapatan Raya No.17E-F<br>
                                    RT.004/RW 006, Mampang Prapatan<br>
                                    Jakarta Selatan 12790
                                </p>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-lg bg-[#12161D] border border-[#00D1FF]/20 flex items-center justify-center shrink-0 shadow-[0_0_12px_rgba(0,209,255,0.1)]">
                                <i data-lucide="mail" class="w-5 h-5 text-[#00D1FF]"></i>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm mb-1">Email</p>
                                <a href="mailto:marketing@dotscorporate.com" class="text-gray-400 hover:text-[#00D1FF] text-sm">marketing@dotscorporate.com</a>
                            </div>
                        </div>

                        <div class="flex items-center gap-4">
                            <div class="w-11 h-11 rounded-lg bg-[#12161D] border border-[#00D1FF]/20 flex items-center justify-center shrink-0 shadow-[0_0_12px_rgba(0,209,255,0.1)]">
                                <i data-lucide="phone" class="w-5 h-5 text-[#00D1FF]"></i>
                            </div>
                            <div>
                                <p class="text-white font-semibold text-sm mb-1">{{ $lang === 'id' ? 'Telepon' : 'Phone' }}</p>
                                <p class="text-gray-400 text-sm">+62 878-3811-3470 / +62 813-1538-8229</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div>
                    <div class="relative bg-[#0A0D14] border border-[#1A2333] rounded-2xl p-8 md:p-10 overflow-hidden">
                        @if(session('success'))
                            <div class="flex flex-col items-center justify-center gap-5 py-10 text-center bg-[#00D1FF]/5 border border-[#00D1FF]/30 rounded-xl p-6">
                                <div class="w-16 h-16 rounded-full bg-[#00D1FF]/10 border border-[#00D1FF]/40 flex items-center justify-center shadow-[0_0_25px_rgba(0,209,255,0.3)]">
                                    <i data-lucide="check-circle" class="w-10 h-10 text-[#00D1FF]"></i>
                                </div>
                                <h3 class="text-2xl font-bold text-white">{{ $lang === 'id' ? 'Pesan Berhasil Terkirim!' : 'Message Successfully Sent!' }}</h3>
                                <p class="text-gray-300 text-sm max-w-sm leading-relaxed">
                                    {{ $lang === 'id' ? 'Terima kasih telah menghubungi kami. Pesan Anda telah kami terima dan tim konsultan DOTS akan segera membalas dalam 1 hari kerja.' : 'Thank you for reaching out. Your message has been received and our consultants will get back to you within 1 business day.' }}
                                </p>
                                <a href="{{ route('home') }}" class="mt-2 px-6 py-3 rounded-lg bg-[#00D1FF]/10 border border-[#00D1FF] text-[#00D1FF] font-semibold text-sm hover:bg-[#00D1FF] hover:text-[#05070A] transition-all">
                                    {{ $lang === 'id' ? 'Kirim Pesan Lain' : 'Send Another Message' }}
                                </a>
                            </div>
                        @else
                            <form action="{{ route('contact.store') }}" method="POST" class="relative z-10 flex flex-col gap-5">
                                @csrf
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                    <div>
                                        <label class="block text-gray-300 text-sm font-medium mb-2">{{ $lang === 'id' ? 'Nama Anda' : 'Your Name' }}</label>
                                        <input type="text" name="name" required placeholder="{{ $lang === 'id' ? 'Budi Santoso' : 'John Doe' }}" class="w-full bg-[#05070A] border border-gray-700 focus:border-[#00D1FF] rounded-lg px-4 py-3 text-white text-sm outline-none transition-colors" />
                                    </div>
                                    <div>
                                        <label class="block text-gray-300 text-sm font-medium mb-2">{{ $lang === 'id' ? 'Email Anda' : 'Your Email' }}</label>
                                        <input type="email" name="email" required placeholder="you@company.com" class="w-full bg-[#05070A] border border-gray-700 focus:border-[#00D1FF] rounded-lg px-4 py-3 text-white text-sm outline-none transition-colors" />
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-gray-300 text-sm font-medium mb-2">{{ $lang === 'id' ? 'Subjek' : 'Subject' }}</label>
                                    <input type="text" name="subject" required placeholder="{{ $lang === 'id' ? 'Bagaimana kami dapat membantu Anda?' : 'How can we help you?' }}" class="w-full bg-[#05070A] border border-gray-700 focus:border-[#00D1FF] rounded-lg px-4 py-3 text-white text-sm outline-none transition-colors" />
                                </div>

                                <div>
                                    <label class="block text-gray-300 text-sm font-medium mb-2">{{ $lang === 'id' ? 'Pesan Anda' : 'Your Message' }}</label>
                                    <textarea name="message" required rows="5" placeholder="{{ $lang === 'id' ? 'Ceritakan proyek Anda...' : 'Tell us about your project...' }}" class="w-full bg-[#05070A] border border-gray-700 focus:border-[#00D1FF] rounded-lg px-4 py-3 text-white text-sm outline-none transition-colors resize-none"></textarea>
                                </div>

                                <button type="submit" class="group relative w-full py-4 bg-[#00D1FF] text-[#05070A] font-bold rounded-lg flex items-center justify-center gap-3 overflow-hidden shadow-[0_0_20px_rgba(0,209,255,0.3)] hover:shadow-[0_0_35px_rgba(0,209,255,0.6)] transition-all duration-300">
                                    <span>{{ $lang === 'id' ? 'Kirim Pesan' : 'Send Message' }}</span>
                                    <i data-lucide="send" class="w-4 h-4"></i>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[#05070A] border-t border-gray-900 pt-20 pb-10 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
                <!-- Brand -->
                <div class="flex flex-col gap-4">
                    <div class="flex items-center">
                        <div class="px-5 py-3 rounded-xl shadow-[0_0_15px_rgba(0,209,255,0.1)] border border-[#00D1FF]/10 inline-block">
                            <img src="{{ asset('logo.svg') }}" alt="DOTS Logo" class="h-8 w-auto object-contain" />
                        </div>
                    </div>
                    <div>
                        <h4 class="text-white font-semibold mb-2">PT. Digital Otentikasi Teknologi Semesta</h4>
                        <p class="text-gray-400 text-sm leading-relaxed max-w-xs">
                            {{ $lang === 'id' ? 'Memberdayakan bisnis melalui solusi IoT mutakhir, otomatisasi berbasis AI, dan sistem keamanan perusahaan yang tangguh.' : 'Empowering businesses through cutting-edge IoT solutions, AI-enriched automation, and robust enterprise security systems.' }}
                        </p>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold mb-6 uppercase tracking-wider text-sm">{{ $lang === 'id' ? 'Tautan Cepat' : 'Quick Links' }}</h4>
                    <ul class="flex flex-col gap-3">
                        <li><a href="#capabilities" class="text-gray-400 hover:text-[#00D1FF] text-sm">{{ $lang === 'id' ? '8 Modul Spesifikasi AI Engine' : '8 AI Engine Modules' }}</a></li>
                        <li><a href="#brochure-workflows" class="text-gray-400 hover:text-[#00D1FF] text-sm">{{ $lang === 'id' ? 'Alur Kerja Sistem Brosur' : 'Brochure Workflows' }}</a></li>
                        <li><a href="#partners" class="text-gray-400 hover:text-[#00D1FF] text-sm">{{ $lang === 'id' ? 'Mitra Strategis' : 'Strategic Partners' }}</a></li>
                        <li><a href="#portfolio" class="text-gray-400 hover:text-[#00D1FF] text-sm">{{ $lang === 'id' ? 'Keamanan Perusahaan' : 'Enterprise Security' }}</a></li>
                        <li><a href="/cms" class="text-gray-400 hover:text-[#00D1FF] text-sm">Dashboard CMS</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="flex flex-col gap-4">
                    <h4 class="text-white font-bold mb-2 uppercase tracking-wider text-sm">{{ $lang === 'id' ? 'Hubungi Kami' : 'Contact Us' }}</h4>
                    <div class="flex items-start gap-3">
                        <i data-lucide="map-pin" class="w-5 h-5 text-[#00D1FF] mt-0.5 shrink-0"></i>
                        <p class="text-gray-400 text-sm leading-relaxed">
                            TRIO Building, Jl. Mampang Prapatan Raya No.17E-F, Jakarta Selatan 12790
                        </p>
                    </div>
                    <div class="flex items-center gap-3">
                        <i data-lucide="mail" class="w-5 h-5 text-[#00D1FF] shrink-0"></i>
                        <a href="mailto:marketing@dotscorporate.com" class="text-gray-400 hover:text-[#00D1FF] text-sm">marketing@dotscorporate.com</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i data-lucide="phone" class="w-5 h-5 text-[#00D1FF] shrink-0"></i>
                        <span class="text-gray-400 text-sm">+62 878-3811-3470 / +62 813-1538-8229</span>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-800 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-gray-500 text-xs text-center md:text-left">
                    &copy; {{ date('Y') }} PT. Digital Otentikasi Teknologi Semesta. All rights reserved.
                </p>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-500 hover:text-white text-xs">{{ $lang === 'id' ? 'Kebijakan Privasi' : 'Privacy Policy' }}</a>
                    <a href="#" class="text-gray-500 hover:text-white text-xs">{{ $lang === 'id' ? 'Syarat Layanan' : 'Terms of Service' }}</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>

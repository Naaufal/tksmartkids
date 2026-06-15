<!DOCTYPE html>
<html lang="id" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'TK SmartKids adalah taman kanak-kanak berbasis rumahan yang menyenangkan di Bekasi. Menggunakan Kurikulum Merdeka dengan pendekatan bermain sambil belajar.')">
    <title>@yield('title', 'Beranda') - TK SmartKids</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js CDN (Deferred) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @if(config('services.google_analytics.id'))
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google_analytics.id') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('services.google_analytics.id') }}');
        </script>
    @endif
</head>
<body class="flex flex-col min-h-full font-sans text-dark bg-white antialiased">

    <!-- Sticky Navbar -->
    <header class="sticky top-0 z-50 w-full h-16 md:h-[72px] bg-white border-b-4 border-black" x-data="{ mobileMenuOpen: false }">
        <div class="max-w-[1200px] h-full mx-auto px-4 md:px-8 flex items-center justify-between">
            
            <!-- Logo / Brand -->
            <a href="{{ route('home') }}" class="flex items-center gap-2 group focus:outline-none">
                <!-- Playful Block Logo -->
                <div class="w-10 h-10 bg-yellow border-2 border-black flex items-center justify-center font-display text-2xl text-black shadow-brutalist-sm group-hover:bg-red group-hover:text-white transition-colors">
                    SK
                </div>
                <span class="font-display text-2xl md:text-3xl text-black tracking-wide leading-none group-hover:text-blue-pop transition-colors">
                    TK SMARTKIDS
                </span>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-1">
                @php
                    $links = [
                        ['route' => 'home', 'label' => 'Beranda'],
                        ['route' => 'about', 'label' => 'Tentang Kami'],
                        ['route' => 'fasilitas', 'label' => 'Fasilitas'],
                        ['route' => 'gallery', 'label' => 'Galeri'],
                        ['route' => 'pricing', 'label' => 'Biaya & Kontak'],
                    ];
                @endphp
                @foreach($links as $link)
                    @php
                        $isActive = request()->routeIs($link['route']);
                    @endphp
                    <a href="{{ route($link['route']) }}" 
                       class="px-4 py-2 font-sans font-bold text-sm uppercase tracking-wider transition-all border-2 {{ $isActive ? 'bg-yellow border-black shadow-brutalist-sm text-black' : 'border-transparent text-black hover:bg-yellow hover:border-black hover:shadow-brutalist-sm' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </nav>

            <!-- Desktop CTA -->
            <div class="hidden md:block">
                <a href="https://wa.me/6283895285804" 
                   target="_blank"
                   rel="noopener noreferrer" 
                   class="btn-brutalist bg-red hover:bg-orange text-white font-sans font-black text-sm uppercase tracking-widest px-5 py-2.5 inline-block text-center select-none">
                    Daftar Sekarang
                </a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" 
                    type="button"
                    class="md:hidden w-10 h-10 border-2 border-black bg-yellow text-black flex items-center justify-center font-bold text-xl shadow-brutalist-sm focus:outline-none"
                    aria-label="Toggle Menu">
                <span x-show="!mobileMenuOpen">☰</span>
                <span x-show="mobileMenuOpen" x-cloak>✕</span>
            </button>
        </div>

        <!-- Mobile Drawer (Alpine.js) -->
        <div class="fixed inset-0 top-16 md:hidden z-40 bg-black flex flex-col border-t-2 border-black transform transition-transform duration-300"
             x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="translate-x-full"
             x-cloak>
            
            <nav class="flex flex-col gap-4 p-8 flex-grow">
                @foreach($links as $link)
                    @php
                        $isActive = request()->routeIs($link['route']);
                    @endphp
                    <a href="{{ route($link['route']) }}" 
                       @click="mobileMenuOpen = false"
                       class="font-display text-3xl uppercase tracking-wider py-2 transition-colors border-b-2 border-zinc-800 {{ $isActive ? 'text-yellow' : 'text-white hover:text-yellow' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach

                <!-- Mobile CTA inside drawer -->
                <a href="https://wa.me/6283895285804" 
                   target="_blank"
                   rel="noopener noreferrer"
                   @click="mobileMenuOpen = false"
                   class="btn-brutalist bg-red hover:bg-orange text-white font-sans font-black text-lg uppercase tracking-wider py-4 mt-6 text-center block">
                    Daftar Via WhatsApp
                </a>
            </nav>

            <div class="p-8 border-t border-zinc-800 text-zinc-500 font-sans text-xs text-center">
                &copy; {{ date('Y') }} {{ $contents['contact_school_name'] ?? 'TK SmartKids' }}
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full bg-black text-white border-t-4 border-black">
        <!-- Accent Strip -->
        <div class="divider-yellow"></div>
        
        <div class="max-w-[1200px] mx-auto px-4 md:px-8 py-12 md:py-16">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12">
                
                <!-- School Intro Col -->
                <div class="md:col-span-5 flex flex-col items-start gap-4">
                    <div class="flex items-center gap-2">
                        <div class="w-8 h-8 bg-yellow border-2 border-black flex items-center justify-center font-display text-lg text-black shadow-brutalist-sm">
                            SK
                        </div>
                        <span class="font-display text-2xl uppercase text-yellow">
                            {{ $contents['contact_school_name'] ?? 'TK SmartKids' }}
                        </span>
                    </div>
                    <p class="font-sans text-zinc-400 text-sm leading-relaxed max-w-sm">
                        {{ $contents['home_hero_subtitle'] ?? 'Membantu anak tumbuh cerdas, kreatif, dan mandiri dengan suasana belajar yang menyenangkan.' }}
                    </p>
                    <span class="stamp stamp-red mt-2 text-sm uppercase">
                        7 Tahun Berkarya!
                    </span>
                </div>

                <!-- Info Col -->
                <div class="md:col-span-4 flex flex-col gap-3">
                    <h4 class="font-display text-lg text-yellow uppercase tracking-wider border-b border-zinc-800 pb-2">
                        Lokasi & Jam Kerja
                    </h4>
                    <p class="font-sans text-zinc-300 text-sm leading-relaxed">
                        <strong class="text-white block font-bold mb-1">Alamat:</strong>
                        {{ $contents['contact_address'] ?? 'Perumahan Sukaraya Indah Blok D02 No.01, Desa Sukaraya, Kec. Karang Bahagia, Kab. Bekasi' }}
                    </p>
                    <p class="font-sans text-zinc-300 text-sm leading-relaxed mt-2">
                        <strong class="text-white block font-bold mb-1">Jam Operasional:</strong>
                        {{ $contents['contact_hours'] ?? 'Senin – Jumat, 07:30 – 12:00 WIB' }}
                    </p>
                </div>

                <!-- Action Col -->
                <div class="md:col-span-3 flex flex-col gap-3">
                    <h4 class="font-display text-lg text-yellow uppercase tracking-wider border-b border-zinc-800 pb-2">
                        Hubungi Kami
                    </h4>
                    <p class="font-sans text-zinc-400 text-sm">
                        Ingin mendaftar atau tanya-tanya? Silakan hubungi langsung via WhatsApp:
                    </p>
                    <a href="https://wa.me/{{ $contents['contact_whatsapp'] ?? '6283895285804' }}" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-extrabold text-sm uppercase py-3 px-4 text-center mt-1 block tracking-wider">
                        💬 Chat WhatsApp
                    </a>
                </div>

            </div>

            <!-- Footer Bottom -->
            <div class="border-t border-zinc-900 mt-12 pt-6 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-zinc-500 font-sans">
                <div>
                    &copy; {{ date('Y') }} {{ $contents['contact_school_name'] ?? 'TK SmartKids' }}. Semua Hak Dilindungi.
                </div>
                <div>
                    Neo Brutalism Edition
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

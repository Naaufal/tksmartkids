@extends('layouts.layout')

@section('title', 'Beranda')

@section('content')
    <!-- Hero Section -->
    <section class="bg-halftone py-16 md:py-24 border-b-4 border-black relative overflow-hidden">
        <!-- Absolute Decorative Sticker -->
        <div class="absolute top-4 right-4 md:top-12 md:right-12 z-10 hidden sm:block">
            <span class="stamp stamp-red text-xl uppercase tracking-widest font-black">
                7 TAHUN!
            </span>
        </div>

        <div class="max-w-[1200px] mx-auto px-4 md:px-8 grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-center">
            
            <!-- Left Content: Hero Text -->
            <div class="md:col-span-7 flex flex-col items-start text-left gap-6">
                
                <div class="stamp stamp-black uppercase tracking-wider text-sm">
                    Aset Digital Resmi Pertama
                </div>

                <h1 class="text-comic text-4xl sm:text-5xl md:text-6xl uppercase tracking-wide leading-[0.95] max-w-xl text-black">
                    @php
                        $tagline = $contents['home_hero_tagline'] ?? 'BELAJAR, BERMAIN, BERKEMBANG.';
                        $words = explode(',', $tagline);
                    @endphp
                    @foreach($words as $index => $word)
                        @if($index === count($words) - 1)
                            <span class="block text-red select-none text-comic" style="-webkit-text-stroke: 3px #0D0D0D;">{{ trim($word) }}</span>
                        @else
                            <span class="block select-none text-comic-black" style="-webkit-text-stroke: 3px #0D0D0D; color: #0D0D0D;">{{ trim($word) }}</span>
                        @endif
                    @endforeach
                </h1>

                <p class="font-sans font-medium text-lg md:text-xl text-black max-w-lg leading-relaxed">
                    {{ $contents['home_hero_subtitle'] ?? 'Membantu anak tumbuh cerdas, kreatif, dan mandiri dengan suasana belajar yang menyenangkan.' }}
                </p>

                <div class="flex flex-col sm:flex-row gap-4 w-full sm:w-auto">
                    <a href="https://wa.me/{{ $contents['contact_whatsapp'] ?? '6283895285804' }}" 
                       target="_blank"
                       rel="noopener noreferrer"
                       class="btn-brutalist bg-red hover:bg-orange text-white font-sans font-black text-base uppercase tracking-wider px-8 py-4 text-center">
                        💬 Hubungi via WhatsApp
                    </a>
                    <a href="{{ route('gallery') }}" 
                       class="btn-brutalist bg-white hover:bg-yellow text-black font-sans font-black text-base uppercase tracking-wider px-8 py-4 text-center">
                        Lihat Galeri Foto
                    </a>
                </div>
            </div>

            <!-- Right Content: Playful Hero Illustration Box -->
            <div class="md:col-span-5 flex justify-center">
                <div class="relative w-full max-w-[340px] md:max-w-none aspect-square bg-blue-pop border-4 border-black shadow-brutalist-lg tilt-right-2 overflow-hidden flex flex-col justify-end p-6">
                    <!-- Retro Pop-Art Circles Grid -->
                    <div class="absolute inset-0 grid grid-cols-6 grid-rows-6 opacity-30 p-2 gap-2">
                        @for($i = 0; $i < 36; $i++)
                            <div class="rounded-full bg-white aspect-square"></div>
                        @endfor
                    </div>

                    <!-- Comic Style Content Box -->
                    <div class="relative z-10 bg-white border-2 border-black p-4 shadow-brutalist-sm tilt-left-2">
                        <span class="font-display text-2xl text-black block mb-1">
                            Pendaftaran 2025/2026
                        </span>
                        <p class="font-sans text-xs text-zinc-600 leading-relaxed mb-3">
                            Kapasitas terbatas hanya 20 siswa per kelas untuk TK A & TK B. Hubungi kami untuk mengamankan kursi!
                        </p>
                        <span class="inline-block bg-yellow text-black font-sans font-black text-xs uppercase px-2.5 py-1 border-2 border-black shadow-brutalist-sm">
                            Kuota Terbatas!
                        </span>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Introduction Section -->
    <section class="bg-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-center">
                
                <div class="md:col-span-6 flex flex-col items-start gap-4">
                    <span class="stamp stamp-red uppercase tracking-wider text-xs">
                        Kenalan Yuk
                    </span>
                    <h2 class="font-display text-4xl sm:text-5xl text-black uppercase tracking-wider border-b-4 border-black pb-2">
                        {{ $contents['home_intro_title'] ?? 'Selamat Datang di TK SmartKids' }}
                    </h2>
                    <p class="font-sans text-zinc-700 text-base md:text-lg leading-relaxed mt-2">
                        {{ $contents['home_intro_content'] ?? 'TK SmartKids adalah taman kanak-kanak berbasis rumahan yang berlokasi di Perumahan Sukaraya Indah, Bekasi. Kami berdedikasi untuk mendidik anak-anak usia dini melalui pendekatan bermain sambil belajar.' }}
                    </p>
                    <a href="{{ route('about') }}" 
                       class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-sm uppercase px-6 py-3 mt-4">
                        Selengkapnya Tentang Kami →
                    </a>
                </div>

                <div class="md:col-span-6 flex justify-center">
                    <div class="w-full max-w-[400px] aspect-[4/3] bg-yellow border-4 border-black shadow-brutalist-md tilt-left-1 flex items-center justify-center relative overflow-hidden">
                        <!-- Playful Grid Pattern -->
                        <div class="absolute inset-0 bg-halftone opacity-50"></div>
                        <span class="font-display text-4xl text-black uppercase tracking-wider relative z-10 rotate-3 border-4 border-black bg-white px-4 py-2 shadow-brutalist-sm">
                            TK SmartKids
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Highlights Section -->
    <section class="bg-halftone-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            
            <div class="text-center flex flex-col items-center gap-3 mb-12">
                <span class="stamp stamp-black uppercase tracking-wider text-xs">
                    Keunggulan
                </span>
                <h2 class="font-display text-4xl sm:text-5xl text-black uppercase tracking-wider">
                    Kenapa Memilih Kami?
                </h2>
            </div>

            <!-- Highlights Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">
                
                <!-- Card 1 -->
                <div class="bg-white border-4 border-black shadow-brutalist-md p-6 tilt-left-2 hover:rotate-0 hover:scale-102 hover:shadow-brutalist-lg transition-all duration-150">
                    <div class="w-16 h-16 bg-red border-4 border-black flex items-center justify-center shadow-brutalist-sm mb-6 text-white font-sans text-3xl font-black">
                        🏠
                    </div>
                    <h3 class="font-sans font-black text-xl uppercase tracking-wider text-black mb-3">
                        {{ $contents['home_highlight_1_title'] ?? 'Lingkungan Aman & Nyaman' }}
                    </h3>
                    <p class="font-sans text-zinc-600 text-sm leading-relaxed">
                        {{ $contents['home_highlight_1_desc'] ?? 'Sekolah berbasis rumahan memberikan suasana hangat seperti rumah sendiri sehingga anak merasa tenang.' }}
                    </p>
                </div>

                <!-- Card 2 -->
                <div class="bg-white border-4 border-black shadow-brutalist-md p-6 tilt-right-1 hover:rotate-0 hover:scale-102 hover:shadow-brutalist-lg transition-all duration-150">
                    <div class="w-16 h-16 bg-yellow border-4 border-black flex items-center justify-center shadow-brutalist-sm mb-6 text-black font-sans text-3xl font-black">
                        👩‍🏫
                    </div>
                    <h3 class="font-sans font-black text-xl uppercase tracking-wider text-black mb-3">
                        {{ $contents['home_highlight_2_title'] ?? 'Guru Berpengalaman' }}
                    </h3>
                    <p class="font-sans text-zinc-600 text-sm leading-relaxed">
                        {{ $contents['home_highlight_2_desc'] ?? 'Dididik oleh pengajar profesional yang ramah, sabar, dan berpengalaman luas membimbing anak usia dini.' }}
                    </p>
                </div>

                <!-- Card 3 -->
                <div class="bg-white border-4 border-black shadow-brutalist-md p-6 tilt-left-1 hover:rotate-0 hover:scale-102 hover:shadow-brutalist-lg transition-all duration-150">
                    <div class="w-16 h-16 bg-blue-pop border-4 border-black flex items-center justify-center shadow-brutalist-sm mb-6 text-white font-sans text-3xl font-black">
                        📖
                    </div>
                    <h3 class="font-sans font-black text-xl uppercase tracking-wider text-black mb-3">
                        {{ $contents['home_highlight_3_title'] ?? 'Kurikulum Holistik' }}
                    </h3>
                    <p class="font-sans text-zinc-600 text-sm leading-relaxed">
                        {{ $contents['home_highlight_3_desc'] ?? 'Kurikulum Merdeka dengan metode pembelajaran berbasis projek untuk melatih motorik halus dan karakter anak.' }}
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Gallery Preview Section -->
    <section class="bg-black py-16 md:py-20 border-b-4 border-black text-white">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
                <div>
                    <span class="stamp stamp-red uppercase tracking-wider text-xs">
                        Keseruan Kami
                    </span>
                    <h2 class="font-display text-4xl sm:text-5xl text-yellow uppercase tracking-wider mt-2">
                        Galeri Kegiatan Terkini
                    </h2>
                </div>
                <div>
                    <a href="{{ route('gallery') }}" 
                       class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-sm uppercase px-6 py-3 mt-1 inline-block">
                        Lihat Semua Foto →
                    </a>
                </div>
            </div>

            <!-- Gallery Grid -->
            @if($photos->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                    @foreach($photos as $index => $photo)
                        @php
                            // alternate tilts: rotate-1, rotate-2, tilt-left, etc.
                            $tilts = ['tilt-left-1', 'tilt-right-1', 'tilt-left-2', 'tilt-right-2', 'tilt-right-1', 'tilt-left-1'];
                            $tiltClass = $tilts[$index % count($tilts)];
                        @endphp
                        <div class="relative bg-white border-4 border-black shadow-brutalist-red overflow-hidden group hover:-translate-y-1 hover:shadow-brutalist-yellow hover:rotate-0 transition-all duration-150 {{ $tiltClass }}">
                            <div class="aspect-[4/3] w-full overflow-hidden bg-zinc-800">
                                <img src="{{ $photo->public_url }}" 
                                     alt="{{ $photo->alt_text ?? 'Foto Kegiatan TK SmartKids' }}" 
                                     loading="lazy"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            </div>
                            <!-- Tags overlay -->
                            <div class="absolute bottom-3 left-3 flex flex-wrap gap-1">
                                @foreach($photo->categories as $category)
                                    <span class="bg-black text-white text-[10px] font-sans font-bold uppercase tracking-wide px-2 py-0.5 border border-white">
                                        {{ $category->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="bg-white text-black border-4 border-black p-8 md:p-12 text-center rounded flex flex-col items-center gap-4 max-w-lg mx-auto shadow-brutalist-lg rotate-[-1.5deg]">
                    <div class="w-16 h-16 bg-red border-4 border-black flex items-center justify-center shadow-brutalist-sm text-3xl">
                        📸
                    </div>
                    <h3 class="font-display text-2xl uppercase tracking-wider text-black">
                        Belum Ada Foto Kegiatan
                    </h3>
                    <p class="font-sans text-zinc-600 text-sm leading-relaxed max-w-sm">
                        Kami sedang menyiapkan dokumentasi kegiatan seru di kelas. Nantikan keseruan belajar dan bermain kami segera!
                    </p>
                    <span class="stamp stamp-black text-sm uppercase">
                        Coming Soon!
                    </span>
                </div>
            @endif

        </div>
    </section>

    <!-- Bottom CTA Section -->
    <section class="bg-halftone-red py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8 text-center flex flex-col items-center gap-6">
            
            <span class="stamp stamp-black text-lg uppercase">
                Tempat Sangat Terbatas!
            </span>

            <h2 class="text-comic-yellow text-4xl sm:text-5xl md:text-6xl uppercase tracking-wider leading-none max-w-2xl" style="-webkit-text-stroke: 3px #0D0D0D;">
                {{ $contents['home_cta_title'] ?? 'TERTARIK? LANGSUNG TANYA KE KAMI.' }}
            </h2>

            <p class="font-sans font-black text-lg text-white max-w-lg leading-relaxed">
                {{ $contents['home_cta_subtitle'] ?? 'Hubungi admin kami hari ini untuk konsultasi, penjadwalan kunjungan sekolah, atau pendaftaran.' }}
            </p>

            <a href="https://wa.me/{{ $contents['contact_whatsapp'] ?? '6283895285804' }}" 
               target="_blank"
               rel="noopener noreferrer"
               class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-lg uppercase tracking-wider px-10 py-5 inline-block">
                💬 Chat Kami via WhatsApp
            </a>
        </div>
    </section>
@endsection

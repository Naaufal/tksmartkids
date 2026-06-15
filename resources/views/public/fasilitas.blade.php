@extends('layouts.layout')

@section('title', 'Fasilitas & Kurikulum')

@section('content')
    <!-- Hero Fasilitas -->
    <section class="bg-halftone py-16 text-center border-b-4 border-black relative overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8 relative z-10">
            <h1 class="text-comic-black text-5xl md:text-6xl uppercase tracking-wider mb-3 leading-none" style="-webkit-text-stroke: 3px #0D0D0D; color: #0D0D0D;">
                {{ $contents['facilities_hero_title'] ?? 'FASILITAS & METODE' }}
            </h1>
            <p class="font-sans font-medium text-lg md:text-xl text-black max-w-md mx-auto">
                {{ $contents['facilities_hero_subtitle'] ?? 'Lingkungan belajar terbaik untuk si kecil.' }}
            </p>
        </div>
    </section>

    <!-- Facilities List Grid Section -->
    <section class="bg-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            
            <div class="text-center flex flex-col items-center gap-3 mb-12">
                <span class="stamp stamp-red text-white uppercase tracking-wider text-xs">
                    Fasilitas Sekolah
                </span>
                <h2 class="font-display text-4xl sm:text-5xl text-black uppercase tracking-wider">
                    Sarana Penunjang Belajar
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">
                
                <!-- Facility 1: Ruang Belajar (Yellow Bg) -->
                <div class="bg-yellow border-4 border-black shadow-brutalist-lg p-6 md:p-8 flex flex-col items-start gap-4 tilt-left-2 hover:rotate-0 hover:scale-102 transition-all duration-150">
                    <div class="w-12 h-12 bg-white border-3 border-black flex items-center justify-center text-2xl shadow-brutalist-sm select-none">
                        🏫
                    </div>
                    <h3 class="font-sans font-black text-xl uppercase tracking-wider text-black">
                        {{ $contents['facilities_item_1_title'] ?? 'Ruang Belajar' }}
                    </h3>
                    <p class="font-sans text-black text-sm md:text-base leading-relaxed">
                        {{ $contents['facilities_item_1_desc'] ?? 'Ruangan bersih, ber-AC, dan dilengkapi berbagai alat peraga edukatif untuk merangsang kreativitas.' }}
                    </p>
                </div>

                <!-- Facility 2: Area Bermain (White Bg) -->
                <div class="bg-white border-4 border-black shadow-brutalist-md p-6 md:p-8 flex flex-col items-start gap-4 tilt-right-1 hover:rotate-0 hover:scale-102 transition-all duration-150">
                    <div class="w-12 h-12 bg-yellow border-3 border-black flex items-center justify-center text-2xl shadow-brutalist-sm select-none">
                        🛝
                    </div>
                    <h3 class="font-sans font-black text-xl uppercase tracking-wider text-black">
                        {{ $contents['facilities_item_2_title'] ?? 'Area Bermain' }}
                    </h3>
                    <p class="font-sans text-zinc-700 text-sm md:text-base leading-relaxed">
                        {{ $contents['facilities_item_2_desc'] ?? 'Area bermain yang aman dan menyenangkan di dalam dan luar ruangan untuk melatih motorik kasar anak.' }}
                    </p>
                </div>

                <!-- Facility 3: Penyimpanan Murid (Black Bg, Yellow Text) -->
                <div class="bg-black text-white border-4 border-black shadow-brutalist-blue p-6 md:p-8 flex flex-col items-start gap-4 tilt-left-1 hover:rotate-0 hover:scale-102 transition-all duration-150">
                    <div class="w-12 h-12 bg-yellow border-3 border-black flex items-center justify-center text-2xl shadow-brutalist-sm select-none">
                        🎒
                    </div>
                    <h3 class="font-sans font-black text-xl uppercase tracking-wider text-yellow">
                        {{ $contents['facilities_item_3_title'] ?? 'Penyimpanan Murid' }}
                    </h3>
                    <p class="font-sans text-zinc-300 text-sm md:text-base leading-relaxed">
                        {{ $contents['facilities_item_3_desc'] ?? 'Rak penyimpanan khusus barang pribadi murid agar anak terbiasa tertib, mandiri, dan merapikan barangnya sendiri.' }}
                    </p>
                </div>

            </div>

        </div>
    </section>

    <!-- Curriculum Section (Split Layout) -->
    <section class="bg-halftone-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-center">
                
                <!-- Left: Text content -->
                <div class="md:col-span-7 flex flex-col items-start gap-4">
                    <span class="stamp stamp-black uppercase tracking-wider text-xs">
                        Sistem Belajar
                    </span>
                    <h2 class="font-display text-4xl sm:text-5xl text-black uppercase tracking-wider">
                        {{ $contents['facilities_curriculum_title'] ?? 'Kurikulum Merdeka' }}
                    </h2>
                    <p class="font-sans text-zinc-700 text-base md:text-lg leading-relaxed mt-2">
                        {{ $contents['facilities_curriculum_desc'] ?? 'Kami menerapkan Kurikulum Merdeka yang memberikan keleluasaan bagi pendidik untuk menciptakan pembelajaran berkualitas yang sesuai dengan kebutuhan dan lingkungan belajar anak.' }}
                    </p>
                </div>

                <!-- Right: Graphic Card -->
                <div class="md:col-span-5 flex justify-center">
                    <div class="w-full max-w-[360px] bg-red text-white border-4 border-black shadow-brutalist-lg p-6 md:p-8 tilt-right-2 text-center flex flex-col items-center gap-4">
                        <div class="text-5xl select-none mb-2">⭐</div>
                        <h3 class="font-display text-3xl uppercase tracking-wide text-white">
                            Belajar Berdampak
                        </h3>
                        <p class="font-sans text-sm text-zinc-150 leading-relaxed">
                            Membentuk Profil Pelajar Pancasila yang mandiri, kreatif, berakhlak mulia, dan bernalar kritis sejak dini.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Learning Method / Approach Section -->
    <section class="bg-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-center">
                
                <!-- Left: Illustration -->
                <div class="md:col-span-5 flex justify-center order-last md:order-first">
                    <div class="w-full max-w-[360px] bg-blue-pop text-white border-4 border-black shadow-brutalist-lg p-6 md:p-8 tilt-left-2 text-center flex flex-col items-center gap-4">
                        <div class="text-5xl select-none mb-2">🎨</div>
                        <h3 class="font-display text-3xl uppercase tracking-wide text-white">
                            Bermain & Eksplorasi
                        </h3>
                        <p class="font-sans text-sm text-zinc-100 leading-relaxed">
                            Pembelajaran interaktif motorik halus, melukis, bercerita, dan bersosialisasi aktif dengan lingkungan.
                        </p>
                    </div>
                </div>

                <!-- Right: Text -->
                <div class="md:col-span-7 flex flex-col items-start gap-4">
                    <span class="stamp stamp-red text-white uppercase tracking-wider text-xs">
                        Metode Belajar
                    </span>
                    <h2 class="font-display text-4xl sm:text-5xl text-black uppercase tracking-wider">
                        {{ $contents['facilities_method_title'] ?? 'Pendekatan Pembelajaran' }}
                    </h2>
                    <p class="font-sans text-zinc-700 text-base md:text-lg leading-relaxed mt-2">
                        {{ $contents['facilities_method_desc'] ?? 'Pembelajaran berbasis projek dan bermain yang bermakna. Kami merangsang aspek perkembangan anak (kognitif, bahasa, fisik-motorik, sosial-emosional, nilai agama dan moral) secara terintegrasi.' }}
                    </p>
                </div>

            </div>
        </div>
    </section>

    <!-- Bottom Whatsapp CTA Section -->
    <section class="bg-yellow py-12 md:py-16 text-center border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8 flex flex-col items-center gap-4">
            <h2 class="font-display text-3xl sm:text-4xl text-black uppercase tracking-wider">
                Ingin Lihat Langsung Fasilitas Kami?
            </h2>
            <p class="font-sans text-black text-sm md:text-base max-w-md leading-relaxed mb-2">
                Jadwalkan kunjungan sekolah bersama anak Anda. Kami menyambut kehadiran Anda dengan senang hati!
            </p>
            <a href="https://wa.me/{{ $contents['contact_whatsapp'] ?? '6283895285804' }}" 
               target="_blank"
               rel="noopener noreferrer"
               class="btn-brutalist bg-red hover:bg-orange text-white font-sans font-black text-base uppercase tracking-wider px-8 py-3.5 inline-block">
                💬 Jadwalkan Kunjungan (WhatsApp)
            </a>
        </div>
    </section>
@endsection

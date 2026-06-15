@extends('layouts.layout')

@section('title', 'Tentang Kami')

@section('content')
    <!-- Hero About -->
    <section class="bg-black py-16 text-center border-b-4 border-black relative overflow-hidden">
        <!-- Graphic elements -->
        <div class="absolute -top-10 -left-10 w-40 h-40 bg-yellow rounded-full border-4 border-black opacity-40"></div>
        <div class="absolute -bottom-10 -right-10 w-48 h-48 bg-red rounded-full border-4 border-black opacity-30"></div>

        <div class="max-w-[1200px] mx-auto px-4 md:px-8 relative z-10">
            <h1 class="text-comic-yellow text-5xl md:text-6xl uppercase tracking-wider mb-3 leading-none" style="-webkit-text-stroke: 3px #0D0D0D;">
                {{ $contents['about_hero_title'] ?? 'TENTANG KAMI' }}
            </h1>
            <p class="font-sans font-medium italic text-lg md:text-xl text-white max-w-md mx-auto">
                {{ $contents['about_hero_subtitle'] ?? 'Sekolah rumahan. Hati yang besar.' }}
            </p>
        </div>
    </section>

    <!-- History Section -->
    <section class="bg-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[800px] mx-auto px-4 md:px-8 text-center flex flex-col items-center gap-6">
            <span class="stamp stamp-black uppercase tracking-wider text-xs">
                Perjalanan Kami
            </span>
            <h2 class="font-display text-4xl sm:text-5xl text-black uppercase tracking-wider">
                {{ $contents['about_history_title'] ?? 'Sejarah Singkat' }}
            </h2>
            <p class="font-sans text-zinc-700 text-base md:text-lg leading-relaxed">
                {{ $contents['about_history_content'] ?? 'TK SmartKids telah berdiri selama 7 tahun di Perumahan Sukaraya Indah, Kabupaten Bekasi. Dimulai dari kepedulian terhadap pendidikan anak usia dini di lingkungan sekitar, kini TK SmartKids telah mendidik puluhan anak dengan penuh kasih sayang dan dedikasi.' }}
            </p>
            <div class="mt-4 border-2 border-black bg-yellow text-black font-sans font-black uppercase text-sm px-6 py-2 shadow-brutalist-sm">
                Sejak 2019 • Bekasi, Jawa Barat
            </div>
        </div>
    </section>

    <!-- Visi & Misi Section -->
    <section class="bg-halftone-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                
                <!-- Visi Card -->
                <div class="bg-white border-4 border-black shadow-brutalist-lg p-6 md:p-8 flex flex-col items-start gap-4 tilt-left-1 hover:rotate-0 transition-all duration-150">
                    <span class="stamp stamp-black uppercase tracking-wider text-sm">
                        VISI
                    </span>
                    <hr class="w-full border-black border-2 my-2">
                    <p class="font-sans font-bold italic text-lg md:text-xl text-black leading-relaxed">
                        "{{ $contents['about_visi'] ?? 'Menjadi lembaga pendidikan anak usia dini yang unggul dalam membentuk karakter mandiri, kreatif, cerdas, dan berakhlak mulia sejak dini.' }}"
                    </p>
                </div>

                <!-- Misi Card -->
                <div class="bg-white border-4 border-black shadow-brutalist-red p-6 md:p-8 flex flex-col items-start gap-4 tilt-right-1 hover:rotate-0 transition-all duration-150">
                    <span class="stamp stamp-red uppercase tracking-wider text-sm text-white">
                        MISI
                    </span>
                    <hr class="w-full border-black border-2 my-2">
                    <ol class="flex flex-col gap-3 font-sans text-sm md:text-base text-zinc-800 list-none pl-0">
                        @php
                            $misiItems = [
                                $contents['about_misi_1'] ?? 'Menyelenggarakan kegiatan bermain sambil belajar yang menyenangkan bagi anak.',
                                $contents['about_misi_2'] ?? 'Menanamkan nilai-nilai karakter dasar, kemandirian, dan budi pekerti luhur.',
                                $contents['about_misi_3'] ?? 'Mengembangkan kreativitas, bakat, dan potensi anak secara optimal.',
                                $contents['about_misi_4'] ?? 'Membangun kerja sama yang harmonis dengan orang tua untuk mendukung tumbuh kembang anak.'
                            ];
                        @endphp
                        @foreach($misiItems as $index => $item)
                            <li class="flex gap-3 items-start">
                                <span class="flex-shrink-0 w-6 h-6 bg-yellow border-2 border-black flex items-center justify-center font-display text-black font-black text-sm select-none">
                                    {{ $index + 1 }}
                                </span>
                                <span class="leading-relaxed">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ol>
                </div>

            </div>
        </div>
    </section>

    <!-- Profile & Kepala Sekolah Section -->
    <section class="bg-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-center">
                
                <!-- Left: Headmaster Avatar/Photo -->
                <div class="md:col-span-5 flex justify-center">
                    <div class="relative w-full max-w-[320px] aspect-square bg-yellow border-4 border-black shadow-brutalist-lg tilt-right-2 overflow-hidden flex flex-col justify-end p-6">
                        <!-- Pop Art Portrait Placeholder -->
                        <div class="absolute inset-0 bg-halftone opacity-40"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <!-- Pop Art Portrait Graphic using SVGs -->
                            <div class="w-32 h-32 bg-red rounded-full border-4 border-black flex items-center justify-center text-white text-5xl font-sans select-none shadow-brutalist-sm">
                                SH
                            </div>
                        </div>
                        
                        <!-- Header sticker -->
                        <div class="relative z-10 bg-white border-2 border-black p-2 shadow-brutalist-sm text-center">
                            <span class="font-display text-lg text-black block">
                                {{ $contents['about_kepsek_name'] ?? 'Sri Handayani' }}
                            </span>
                            <span class="font-sans text-xs text-zinc-500 font-bold uppercase tracking-wider">
                                {{ $contents['about_kepsek_title'] ?? 'Kepala Sekolah' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right: Bio Info -->
                <div class="md:col-span-7 flex flex-col items-start gap-4">
                    <span class="stamp stamp-black text-sm uppercase">
                        Profil Pimpinan
                    </span>
                    <h2 class="font-display text-4xl sm:text-5xl text-black uppercase tracking-wider">
                        Pesan Kepala Sekolah
                    </h2>
                    <p class="font-sans text-zinc-700 text-base md:text-lg leading-relaxed">
                        {{ $contents['about_kepsek_content'] ?? 'Sri Handayani adalah pendiri dan kepala sekolah TK SmartKids. Dengan pengalaman bertahun-tahun di dunia pendidikan anak, beliau memimpin para guru dengan kasih sayang untuk mewujudkan generasi yang cerdas, kreatif, dan mandiri.' }}
                    </p>
                    
                    <div class="flex items-center gap-3 mt-4">
                        <span class="stamp stamp-red text-sm uppercase font-bold tracking-wider">
                            7 Tahun Mengabdi
                        </span>
                        <span class="font-display text-xl text-black">
                            — Sri Handayani, S.Pd.
                        </span>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Class Info & Operating Hours Section -->
    <section class="bg-yellow py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12">
                
                <!-- Class Info -->
                <div class="bg-white border-4 border-black shadow-brutalist-lg p-6 md:p-8 flex flex-col items-start gap-4">
                    <div class="w-12 h-12 bg-blue-pop border-3 border-black flex items-center justify-center text-white text-2xl">
                        👶
                    </div>
                    <h3 class="font-display text-3xl text-black uppercase tracking-wider">
                        {{ $contents['about_class_info_title'] ?? 'Informasi Kelas' }}
                    </h3>
                    <p class="font-sans text-zinc-700 text-sm md:text-base leading-relaxed">
                        {{ $contents['about_class_info_content'] ?? 'Kami membuka kelas untuk jenjang TK A dan TK B dengan kapasitas maksimal 20 siswa per kelas guna menjamin fokus pembelajaran dan perhatian penuh kepada setiap anak.' }}
                    </p>
                    <span class="inline-block bg-yellow text-black font-sans font-black text-xs uppercase px-3 py-1 border-2 border-black">
                        Maks. 20 Murid / Kelas
                    </span>
                </div>

                <!-- Operating Hours -->
                <div class="bg-white border-4 border-black shadow-brutalist-lg p-6 md:p-8 flex flex-col items-start gap-4">
                    <div class="w-12 h-12 bg-red border-3 border-black flex items-center justify-center text-white text-2xl">
                        ⏰
                    </div>
                    <h3 class="font-display text-3xl text-black uppercase tracking-wider">
                        {{ $contents['about_hours_title'] ?? 'Jam Operasional' }}
                    </h3>
                    <p class="font-sans text-zinc-700 text-sm md:text-base leading-relaxed">
                        {{ $contents['about_hours_content'] ?? 'Senin – Jumat, pukul 07:30 – 12:00 WIB.' }}
                    </p>
                    <span class="inline-block bg-red text-white font-sans font-black text-xs uppercase px-3 py-1 border-2 border-black">
                        Senin - Jumat
                    </span>
                </div>

            </div>
        </div>
    </section>
@endsection

@extends('layouts.layout')

@section('title', 'Galeri Kegiatan')

@section('content')
    <!-- Hero Gallery -->
    <section class="bg-halftone py-16 text-center border-b-4 border-black relative overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8 relative z-10">
            <h1 class="text-comic-black text-5xl md:text-6xl uppercase tracking-wider mb-3 leading-none" style="-webkit-text-stroke: 3px #0D0D0D; color: #0D0D0D;">
                {{ $contents['gallery_hero_title'] ?? 'GALERI KEGIATAN' }}
            </h1>
            <p class="font-sans font-medium text-lg md:text-xl text-black max-w-md mx-auto">
                {{ $contents['gallery_hero_subtitle'] ?? 'Momen seru anak-anak di TK SmartKids.' }}
            </p>
        </div>
    </section>

    <!-- Gallery Grid & Filter Section -->
    <section class="bg-white py-16 md:py-20 border-b-4 border-black" x-data="{ activeCategory: 'all' }">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            
            @if($photos->count() > 0)
                <!-- Dynamic Category Filter Tabs (Alpine.js) -->
                <div class="flex flex-wrap gap-3 justify-center mb-12">
                    <!-- 'Semua' button -->
                    <button @click="activeCategory = 'all'"
                            :class="activeCategory === 'all' ? 'bg-black text-yellow border-black shadow-none translate-y-[3px] translate-x-[3px]' : 'bg-white text-black border-black shadow-brutalist-sm'"
                            class="px-4 py-2 font-sans font-black text-sm uppercase tracking-wider border-3 transition-all duration-100 focus:outline-none cursor-pointer">
                        Semua
                    </button>

                    <!-- DB categories -->
                    @foreach($categories as $category)
                        <button @click="activeCategory = '{{ $category->slug }}'"
                                :class="activeCategory === '{{ $category->slug }}' ? 'bg-black text-yellow border-black shadow-none translate-y-[3px] translate-x-[3px]' : 'bg-white text-black border-black shadow-brutalist-sm'"
                                class="px-4 py-2 font-sans font-black text-sm uppercase tracking-wider border-3 transition-all duration-100 focus:outline-none cursor-pointer">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>

                <!-- Grid of Photos -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 md:gap-8">
                    @foreach($photos as $index => $photo)
                        @php
                            // Generate random tilts from predefined array for styling rhythm
                            $tilts = ['tilt-left-1', 'tilt-right-1', 'tilt-left-2', 'tilt-right-2', 'tilt-right-1', 'tilt-left-1'];
                            $tiltClass = $tilts[$index % count($tilts)];
                            // extract list of category slugs
                            $photoSlugs = $photo->categories->pluck('slug')->toArray();
                            $jsonSlugs = json_encode($photoSlugs);
                        @endphp
                        
                        <div x-show="activeCategory === 'all' || {{ $jsonSlugs }}.includes(activeCategory)"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-90"
                             x-transition:enter-end="opacity-100 scale-100"
                             class="relative bg-white border-4 border-black shadow-brutalist-red overflow-hidden group hover:rotate-0 hover:scale-[1.03] hover:shadow-brutalist-lg transition-all duration-150 {{ $tiltClass }}"
                             x-cloak>
                            
                            <!-- Image Frame -->
                            <div class="aspect-[4/3] w-full overflow-hidden bg-zinc-100 border-b-4 border-black">
                                <img src="{{ $photo->public_url }}" 
                                     alt="{{ $photo->alt_text ?? 'Foto Kegiatan TK SmartKids' }}" 
                                     loading="lazy"
                                     class="w-full h-full object-cover">
                            </div>

                            <!-- Photo Details / Metadata -->
                            <div class="p-4 bg-white flex flex-col gap-2">
                                @if($photo->alt_text)
                                    <p class="font-sans text-xs text-zinc-500 italic lowercase leading-tight">
                                        "{{ $photo->alt_text }}"
                                    </p>
                                @else
                                    <p class="font-sans text-xs text-zinc-400 italic lowercase leading-tight">
                                        dokumentasi kegiatan kelas
                                    </p>
                                @endif
                                
                                <div class="flex flex-wrap gap-1 mt-1">
                                    @foreach($photo->categories as $photoCat)
                                        <span class="bg-yellow text-black border border-black font-sans font-black text-[9px] uppercase px-1.5 py-0.5 select-none">
                                            {{ $photoCat->name }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

                <!-- Fallback if Alpine filters hide everything -->
                <div x-show="activeCategory !== 'all' && document.querySelectorAll('[x-show*=\'activeCategory\']:not([style*=\'display: none\'])').length === 0" 
                     class="text-center py-12"
                     x-cloak>
                    <p class="font-sans text-zinc-500 italic">Tidak ada foto dalam kategori ini.</p>
                </div>

            @else
                <!-- Empty State when no photos in database -->
                <div class="bg-yellow border-4 border-black p-8 md:p-12 text-center rounded flex flex-col items-center gap-4 max-w-lg mx-auto shadow-brutalist-lg rotate-[-1.5deg]">
                    <div class="w-16 h-16 bg-red border-4 border-black flex items-center justify-center shadow-brutalist-sm text-3xl text-white">
                        📸
                    </div>
                    <h3 class="font-display text-2xl uppercase tracking-wider text-black">
                        Belum Ada Foto Kegiatan
                    </h3>
                    <p class="font-sans text-zinc-650 text-sm leading-relaxed max-w-xs">
                        Dokumentasi kegiatan belajar dan bermain anak-anak sedang disiapkan oleh guru. Nantikan keseruan aktivitas kami segera!
                    </p>
                    <span class="stamp stamp-black text-sm uppercase">
                        Coming Soon!
                    </span>
                </div>
            @endif

        </div>
    </section>

    <!-- Bottom WhatsApp CTA -->
    <section class="bg-halftone-red py-12 md:py-16 text-center border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8 flex flex-col items-center gap-4 text-white">
            <h2 class="font-display text-3xl sm:text-4xl text-yellow uppercase tracking-wider leading-none" style="-webkit-text-stroke: 1.5px #000;">
                Ingin Tahu Lebih Banyak Kegiatan Kami?
            </h2>
            <p class="font-sans text-zinc-100 text-sm md:text-base max-w-md leading-relaxed mb-2">
                Jangan ragu untuk bertanya langsung kepada kami mengenai jadwal aktivitas harian siswa.
            </p>
            <a href="https://wa.me/{{ $contents['contact_whatsapp'] ?? '6283895285804' }}" 
               target="_blank"
               rel="noopener noreferrer"
               class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-base uppercase tracking-wider px-8 py-3.5 inline-block">
                💬 Chat via WhatsApp
            </a>
        </div>
    </section>
@endsection

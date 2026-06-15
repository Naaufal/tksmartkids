@extends('layouts.layout')

@section('title', 'Biaya & Kontak')

@section('content')
    <!-- Hero Pricing -->
    <section class="bg-halftone-white py-16 text-center border-b-4 border-black relative overflow-hidden">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8 relative z-10">
            <h1 class="text-comic text-5xl md:text-6xl uppercase tracking-wider mb-3 leading-none" style="-webkit-text-stroke: 3px #0D0D0D;">
                {{ $contents['pricing_hero_title'] ?? 'BIAYA & KONTAK' }}
            </h1>
            <p class="font-sans font-medium text-lg md:text-xl text-black max-w-md mx-auto">
                {{ $contents['pricing_hero_subtitle'] ?? 'Transparan dan mudah dihubungi.' }}
            </p>
        </div>
    </section>

    <!-- Pricing Cards Section -->
    <section class="bg-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            
            <div class="text-center flex flex-col items-center gap-3 mb-12">
                <span class="stamp stamp-black uppercase tracking-wider text-xs">
                    Investasi Pendidikan
                </span>
                <h2 class="font-display text-4xl sm:text-5xl text-black uppercase tracking-wider">
                    Rincian Biaya Sekolah
                </h2>
            </div>

            <!-- Pricing Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-10">
                @foreach($pricings as $index => $pricing)
                    @php
                        // Alternate card styles
                        $bgClasses = ['bg-white', 'bg-yellow', 'bg-white'];
                        $shadowClasses = ['shadow-brutalist-lg', 'shadow-brutalist-red', 'shadow-brutalist-blue'];
                        $bgClass = $bgClasses[$index % count($bgClasses)];
                        $shadowClass = $shadowClasses[$index % count($shadowClasses)];
                    @endphp

                    <div class="border-4 border-black p-6 md:p-8 flex flex-col justify-between {{ $bgClass }} {{ $shadowClass }} rounded">
                        <div class="flex flex-col gap-4">
                            <span class="inline-block bg-black text-white text-[10px] font-sans font-black uppercase tracking-widest px-3 py-1 border border-black max-w-max">
                                Komponen {{ $index + 1 }}
                            </span>
                            
                            <h3 class="font-sans font-black text-2xl uppercase tracking-wider text-black">
                                {{ $pricing->label }}
                            </h3>

                            <p class="font-sans text-zinc-650 text-sm leading-relaxed min-h-[50px]">
                                {{ $pricing->description }}
                            </p>
                        </div>

                        <div class="mt-8 pt-6 border-t-2 border-black flex flex-col gap-2">
                            <span class="font-sans text-xs text-zinc-500 uppercase tracking-widest block">
                                Nominal:
                            </span>
                            @if($pricing->amount !== null)
                                <span class="font-display text-4xl text-orange select-none leading-none" style="-webkit-text-stroke: 1.5px #0D0D0D; paint-order: stroke fill;">
                                    Rp {{ number_format($pricing->amount, 0, ',', '.') }}
                                </span>
                            @else
                                <span class="font-sans italic font-bold text-lg text-zinc-500">
                                    (Belum diisi)
                                </span>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 bg-black text-white p-6 md:p-8 border-4 border-black shadow-brutalist-yellow text-center flex flex-col items-center gap-4 max-w-2xl mx-auto rounded tilt-left-1">
                <h3 class="font-display text-2xl text-yellow uppercase tracking-wider">
                    Butuh Informasi Angsuran / Keringanan?
                </h3>
                <p class="font-sans text-sm text-zinc-300 max-w-md leading-relaxed">
                    Kami sangat mengerti kebutuhan orang tua. Silakan chat admin WhatsApp sekolah untuk konsultasi cara pembayaran atau potongan harga jika ada program khusus.
                </p>
                <a href="https://wa.me/{{ $contents['contact_whatsapp'] ?? '6283895285804' }}" 
                   target="_blank"
                   rel="noopener noreferrer"
                   class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-sm uppercase px-6 py-3 tracking-wider">
                    💬 Hubungi via WhatsApp
                </a>
            </div>

        </div>
    </section>

    <!-- Contacts & Maps Section -->
    <section class="bg-halftone-white py-16 md:py-20 border-b-4 border-black">
        <div class="max-w-[1200px] mx-auto px-4 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 md:gap-12 items-stretch">
                
                <!-- Left: Complete Contact Information -->
                <div class="md:col-span-6 bg-white border-4 border-black shadow-brutalist-lg p-6 md:p-8 flex flex-col justify-between rounded">
                    
                    <div class="flex flex-col gap-6">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-yellow border-2 border-black flex items-center justify-center font-display text-lg text-black shadow-brutalist-sm">
                                SK
                            </div>
                            <span class="font-display text-2xl uppercase text-black">
                                {{ $contents['contact_school_name'] ?? 'TK SmartKids' }}
                            </span>
                        </div>

                        <hr class="border-black border-2 my-1">

                        <!-- Address Info -->
                        <div class="flex items-start gap-3">
                            <span class="text-2xl flex-shrink-0">📍</span>
                            <div>
                                <h4 class="font-sans font-bold text-sm uppercase tracking-wider text-black">Alamat Sekolah</h4>
                                <p class="font-sans text-zinc-650 text-sm leading-relaxed mt-1">
                                    {{ $contents['contact_address'] ?? 'Perumahan Sukaraya Indah Blok D02 No.01, Desa Sukaraya, Kecamatan Karang Bahagia, Kabupaten Bekasi' }}
                                </p>
                            </div>
                        </div>

                        <!-- Hours Info -->
                        <div class="flex items-start gap-3">
                            <span class="text-2xl flex-shrink-0">⏰</span>
                            <div>
                                <h4 class="font-sans font-bold text-sm uppercase tracking-wider text-black">Jam Operasional</h4>
                                <p class="font-sans text-zinc-650 text-sm leading-relaxed mt-1">
                                    {{ $contents['contact_hours'] ?? 'Senin – Jumat, 07:30 – 12:00 WIB' }}
                                </p>
                            </div>
                        </div>

                        <!-- WhatsApp Info -->
                        <div class="flex items-start gap-3">
                            <span class="text-2xl flex-shrink-0">💬</span>
                            <div>
                                <h4 class="font-sans font-bold text-sm uppercase tracking-wider text-black">Hubungi Langsung</h4>
                                <p class="font-sans text-zinc-650 text-sm leading-relaxed mt-1">
                                    WhatsApp: +{{ $contents['contact_whatsapp'] ?? '6283895285804' }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <a href="https://wa.me/{{ $contents['contact_whatsapp'] ?? '6283895285804' }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="btn-brutalist bg-red hover:bg-orange text-white font-sans font-black text-sm uppercase tracking-widest py-3.5 w-full text-center block">
                            💬 Chat WhatsApp Sekarang
                        </a>
                    </div>

                </div>

                <!-- Right: Google Maps Embed (No API Key Required) -->
                <div class="md:col-span-6 flex">
                    <div class="w-full bg-white border-4 border-black shadow-brutalist-lg p-2 flex flex-col justify-between rounded min-h-[320px] md:min-h-0">
                        <div class="flex-grow w-full border-2 border-black overflow-hidden relative">
                            <!-- Raw Statis Google Maps Iframe Embed -->
                            <iframe src="https://www.google.com/maps?q=Perumahan+Sukaraya+Indah+Blok+D02+No.01,+Karang+Bahagia,+Bekasi&output=embed" 
                                    width="100%" 
                                    height="100%" 
                                    style="border:0; min-height: 280px;" 
                                    allowfullscreen="" 
                                    loading="lazy"
                                    title="Google Maps Lokasi TK SmartKids">
                            </iframe>
                        </div>
                        <div class="p-3 bg-yellow border-t-2 border-black text-center font-sans font-bold text-xs uppercase text-black">
                            Perumahan Sukaraya Indah, Karang Bahagia, Bekasi
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

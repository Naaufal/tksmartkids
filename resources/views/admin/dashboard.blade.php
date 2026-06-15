@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="flex flex-col gap-8">
    
    <!-- Welcome Banner / Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="font-display text-4xl md:text-5xl uppercase tracking-wider text-black">
                Ringkasan Statistik
            </h1>
            <p class="font-sans font-medium text-zinc-600 text-sm">
                Selamat bekerja, kelola galeri TK SmartKids dengan mudah.
            </p>
        </div>
        <div>
            <span class="stamp stamp-red uppercase text-sm">
                Fase 2 Aktif!
            </span>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 md:gap-8">
        
        <!-- Total Photos Card -->
        <div class="bg-white border-4 border-black p-6 shadow-brutalist-red flex items-center justify-between group hover:translate-x-1 hover:translate-y-1 hover:shadow-brutalist-sm transition-all duration-150">
            <div>
                <span class="text-[10px] uppercase font-black tracking-widest text-zinc-400">Total Dokumentasi</span>
                <h3 class="font-display text-5xl text-black leading-none mt-2">{{ $totalPhotos }}</h3>
                <span class="font-sans font-bold text-sm text-black block mt-2">Foto Kegiatan</span>
            </div>
            <div class="w-16 h-16 bg-yellow border-4 border-black flex items-center justify-center font-display text-3xl shadow-brutalist-sm select-none">
                📸
            </div>
        </div>

        <!-- Total Categories Card -->
        <div class="bg-white border-4 border-black p-6 shadow-brutalist-yellow flex items-center justify-between group hover:translate-x-1 hover:translate-y-1 hover:shadow-brutalist-sm transition-all duration-150">
            <div>
                <span class="text-[10px] uppercase font-black tracking-widest text-zinc-400">Pengelompokan</span>
                <h3 class="font-display text-5xl text-black leading-none mt-2">{{ $totalCategories }}</h3>
                <span class="font-sans font-bold text-sm text-black block mt-2">Kategori Foto</span>
            </div>
            <div class="w-16 h-16 bg-blue-pop text-white border-4 border-black flex items-center justify-center font-display text-3xl shadow-brutalist-sm select-none">
                🏷️
            </div>
        </div>

    </div>

    <!-- Quick Shortcuts Card -->
    <div class="bg-white border-4 border-black p-6 shadow-brutalist-md">
        <h3 class="font-display text-xl uppercase tracking-wider text-black border-b-2 border-black pb-2 mb-4">
            Aksi Cepat Galeri
        </h3>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('admin.gallery.upload') }}" 
               class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-xs uppercase tracking-wider px-5 py-3 inline-block">
                📤 Upload Foto Baru
            </a>
            <a href="{{ route('admin.gallery.index') }}" 
               class="btn-brutalist bg-white hover:bg-yellow text-black font-sans font-bold text-xs uppercase tracking-wider px-5 py-3 inline-block">
                🖼️ Lihat Semua Foto
            </a>
            <a href="{{ route('admin.category.create') }}" 
               class="btn-brutalist bg-white hover:bg-yellow text-black font-sans font-bold text-xs uppercase tracking-wider px-5 py-3 inline-block">
                ➕ Tambah Kategori
            </a>
        </div>
    </div>

    <!-- Google Analytics Integration Section -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
        
        <!-- GA Info Panel -->
        <div class="lg:col-span-5 bg-white border-4 border-black p-6 shadow-brutalist-blue flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 bg-orange border-2 border-black flex items-center justify-center font-display text-base text-white shadow-brutalist-sm select-none">
                        GA
                    </div>
                    <h3 class="font-display text-xl uppercase tracking-wider text-black">
                        Google Analytics 4
                    </h3>
                </div>
                
                <p class="font-sans text-sm text-zinc-600 leading-relaxed mb-4">
                    Pelacakan pengunjung situs web TK SmartKids terintegrasi menggunakan Google Analytics 4 (GA4). 
                </p>

                <div class="bg-zinc-100 border-2 border-black p-3 mb-6 font-sans">
                    <span class="text-[9px] uppercase font-black tracking-widest text-zinc-400 block">Measurement ID / GA ID</span>
                    <code class="font-bold text-sm text-blue-pop">{{ $gaId ?: '(Belum dikonfigurasi di .env)' }}</code>
                </div>
            </div>

            <div>
                <a href="https://analytics.google.com/" 
                   target="_blank" 
                   rel="noopener noreferrer"
                   class="w-full btn-brutalist bg-orange hover:bg-yellow text-white hover:text-black font-sans font-black text-xs uppercase tracking-wider py-3.5 block text-center">
                    📊 Buka Google Analytics 4 ↗
                </a>
            </div>
        </div>

        <!-- GA Report Iframe Preview Mock -->
        <div class="lg:col-span-7 bg-black text-white border-4 border-black p-6 shadow-brutalist-md flex flex-col">
            <div class="flex items-center justify-between border-b border-zinc-800 pb-3 mb-4">
                <span class="font-sans font-black text-xs uppercase tracking-widest text-zinc-400">Preview Laporan Pengunjung (Mockup)</span>
                <span class="stamp stamp-red py-0 px-2 text-[10px] tracking-wide rotate-0 uppercase">Live</span>
            </div>
            
            <!-- Aesthetically pleasing vector chart simulating traffic -->
            <div class="h-44 w-full flex items-end justify-between gap-1 border-b-2 border-zinc-700 pb-2 mb-3 px-2">
                @php
                    $visitorHeights = [20, 35, 25, 45, 60, 40, 75, 55, 90, 80, 70, 85, 95, 60];
                    $days = ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'];
                @endphp
                @foreach($visitorHeights as $idx => $height)
                    <div class="flex-grow flex flex-col items-center gap-1 group">
                        <!-- Bar -->
                        <div style="height: {{ $height }}%;" 
                             class="w-full bg-yellow border border-black group-hover:bg-orange transition-colors duration-100 relative">
                            <!-- Tooltip on hover -->
                            <span class="absolute bottom-full left-1/2 transform -translate-x-1/2 bg-white text-black font-sans font-black text-[9px] border border-black px-1 rounded shadow-brutalist-sm hidden group-hover:block z-10 whitespace-nowrap mb-1">
                                {{ $height * 2 }} View
                            </span>
                        </div>
                        <!-- Label -->
                        <span class="text-[8px] font-black uppercase text-zinc-500 leading-none">
                            {{ $days[$idx] }}
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="flex justify-between text-xs text-zinc-400 font-sans mt-2">
                <div>
                    <span>Total Pengunjung Mingguan:</span>
                    <strong class="text-white">~874 Views</strong>
                </div>
                <div>
                    <span>Rasio Kontak WA:</span>
                    <strong class="text-yellow">12.4%</strong>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

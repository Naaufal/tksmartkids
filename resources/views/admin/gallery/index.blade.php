@extends('layouts.admin')

@section('title', 'Kelola Galeri')

@section('content')
<div class="flex flex-col gap-8" x-data="{ openDeleteConfirm: false, deleteActionUrl: '' }">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-display text-4xl md:text-5xl uppercase tracking-wider text-black">
                Kelola Galeri Foto
            </h1>
            <p class="font-sans font-medium text-zinc-600 text-sm">
                Lihat, unggah, edit kategori, dan hapus dokumentasi kegiatan sekolah.
            </p>
        </div>
        <div>
            <a href="{{ route('admin.gallery.upload') }}" 
               class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-sm uppercase tracking-wider px-6 py-3 inline-block">
                📤 Upload Foto Baru
            </a>
        </div>
    </div>

    <!-- Gallery List Grid -->
    @if($photos->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
            @foreach($photos as $photo)
                <div class="bg-white border-4 border-black shadow-brutalist-md flex flex-col justify-between group hover:shadow-brutalist-lg transition-all duration-150">
                    
                    <!-- Thumbnail Container -->
                    <div class="aspect-[4/3] w-full bg-zinc-100 border-b-4 border-black overflow-hidden relative">
                        <img src="{{ $photo->public_url }}" 
                             alt="{{ $photo->alt_text ?? 'Foto galeri' }}" 
                             class="w-full h-full object-cover">
                        
                        <!-- Uploaded At Tag -->
                        <span class="absolute top-2 left-2 bg-black text-white text-[9px] font-sans font-black uppercase px-2 py-0.5 border border-black shadow-brutalist-sm">
                            {{ $photo->created_at ? $photo->created_at->format('d/m/Y') : '-' }}
                        </span>
                    </div>

                    <!-- Metadata and Actions -->
                    <div class="p-4 flex flex-col gap-3 flex-grow justify-between">
                        
                        <!-- Description & Uploader Info -->
                        <div class="flex flex-col gap-1">
                            @if($photo->alt_text)
                                <p class="font-sans font-semibold text-sm text-black italic lowercase leading-snug">
                                    "{{ $photo->alt_text }}"
                                </p>
                            @else
                                <p class="font-sans text-xs text-zinc-400 italic lowercase leading-snug">
                                    tanpa keterangan/alt text
                                </p>
                            @endif
                            <span class="text-[9px] font-black uppercase tracking-widest text-zinc-400 mt-1 block">
                                Uploader: {{ $photo->uploader ? $photo->uploader->name : 'System' }}
                            </span>
                        </div>

                        <!-- Current Categories Display -->
                        <div class="flex flex-wrap gap-1">
                            @if($photo->categories->count() > 0)
                                @foreach($photo->categories as $photoCat)
                                    <span class="bg-yellow text-black border border-black font-sans font-black text-[9px] uppercase px-1.5 py-0.5 select-none">
                                        {{ $photoCat->name }}
                                    </span>
                                @endforeach
                            @else
                                <span class="text-[9px] text-zinc-500 font-sans italic">Belum ada kategori</span>
                            @endif
                        </div>

                        <!-- Action Controls -->
                        <div class="flex items-center justify-between border-t border-zinc-200 pt-3 mt-1">
                            
                            <!-- Assign Category Popover (Alpine.js) -->
                            <div x-data="{ openCategory: false }" class="relative">
                                <button @click="openCategory = !openCategory" 
                                        type="button"
                                        class="px-3 py-1.5 border-2 border-black bg-white text-black font-sans font-black text-xs uppercase tracking-wider shadow-brutalist-sm hover:bg-yellow cursor-pointer select-none">
                                    🏷️ Kategori
                                </button>
                                
                                <div x-show="openCategory" 
                                     @click.away="openCategory = false" 
                                     class="absolute z-20 bottom-full left-0 mb-2 bg-white border-3 border-black p-4 shadow-brutalist-md w-64 text-left"
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     x-cloak>
                                    
                                    <form action="{{ route('admin.gallery.assign_category', $photo) }}" method="POST" class="flex flex-col gap-3">
                                        @csrf
                                        <span class="font-sans font-black text-[10px] uppercase tracking-wider text-zinc-400 block border-b border-black pb-1 mb-1">
                                            Kelola Kategori
                                        </span>
                                        
                                        @if($categories->count() > 0)
                                            <div class="flex flex-col gap-2 max-h-36 overflow-y-auto pr-1">
                                                @foreach($categories as $cat)
                                                    <label class="flex items-start gap-2 font-sans text-xs font-semibold text-black cursor-pointer select-none">
                                                        <input type="checkbox" 
                                                               name="categories[]" 
                                                               value="{{ $cat->id }}" 
                                                               {{ $photo->categories->contains($cat->id) ? 'checked' : '' }} 
                                                               class="accent-black border-2 border-black w-4 h-4 mt-0.5">
                                                        <span>{{ $cat->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                            <button type="submit" 
                                                    class="w-full btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-[10px] uppercase tracking-wider py-2 mt-1 select-none cursor-pointer">
                                                Simpan Perubahan
                                            </button>
                                        @else
                                            <p class="font-sans text-xs text-zinc-500 italic mb-2">Kategori belum tersedia.</p>
                                            <a href="{{ route('admin.category.create') }}" class="font-sans text-xs font-black text-blue-pop hover:underline uppercase block">
                                                + Tambah Kategori
                                            </a>
                                        @endif
                                    </form>
                                </div>
                            </div>

                            <!-- Delete Trigger -->
                            <button @click="deleteActionUrl = '{{ route('admin.gallery.destroy', $photo) }}'; openDeleteConfirm = true"
                                    type="button"
                                    class="px-3 py-1.5 border-2 border-black bg-red text-white font-sans font-black text-xs uppercase tracking-wider shadow-brutalist-sm hover:bg-orange cursor-pointer select-none">
                                🗑️ Hapus
                            </button>

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-yellow border-4 border-black p-8 md:p-12 text-center rounded flex flex-col items-center gap-4 max-w-lg mx-auto shadow-brutalist-lg rotate-[-1deg] mt-8">
            <div class="w-16 h-16 bg-red border-4 border-black flex items-center justify-center shadow-brutalist-sm text-3xl text-white">
                📸
            </div>
            <h3 class="font-display text-2xl uppercase tracking-wider text-black">
                Galeri Masih Kosong
            </h3>
            <p class="font-sans text-zinc-750 text-sm leading-relaxed max-w-xs">
                Unggah foto dokumentasi kegiatan belajar dan bermain siswa agar muncul di halaman publik galeri TK SmartKids.
            </p>
            <a href="{{ route('admin.gallery.upload') }}" 
               class="btn-brutalist bg-black hover:bg-red text-yellow hover:text-white font-sans font-black text-sm uppercase tracking-wider px-6 py-2.5 inline-block">
                Upload Sekarang
            </a>
        </div>
    @endif

    <!-- Alpine.js Brutalist Confirmation Modal -->
    <div x-show="openDeleteConfirm" 
         class="fixed inset-0 bg-black/60 z-50 flex items-center justify-center p-4"
         x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-100"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-cloak>
        
        <div class="bg-white border-4 border-black p-6 max-w-sm w-full shadow-brutalist-xl rotate-[1.5deg]"
             @click.away="openDeleteConfirm = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="scale-95 translate-y-4"
             x-transition:enter-end="scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="scale-100 translate-y-0"
             x-transition:leave-end="scale-95 translate-y-4">
            
            <h4 class="font-display text-2xl text-black uppercase tracking-wider mb-2">
                Hapus Foto Ini?
            </h4>
            <p class="font-sans text-sm text-zinc-650 mb-6 leading-relaxed">
                Tindakan ini akan menghapus foto dari database dan storage Supabase secara permanen. Anda tidak dapat membatalkan aksi ini.
            </p>
            
            <div class="flex justify-end gap-3">
                <button @click="openDeleteConfirm = false" 
                        type="button"
                        class="px-4 py-2 border-2 border-black font-sans font-bold text-xs uppercase tracking-wider bg-white text-black hover:bg-zinc-100 shadow-brutalist-sm cursor-pointer select-none">
                    Batal
                </button>
                <form :action="deleteActionUrl" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" 
                            class="px-4 py-2 border-2 border-black font-sans font-black text-xs uppercase tracking-wider bg-red text-white hover:bg-orange shadow-brutalist-sm cursor-pointer select-none">
                        Ya, Hapus!
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

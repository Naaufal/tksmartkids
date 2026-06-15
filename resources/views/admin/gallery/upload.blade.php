@extends('layouts.admin')

@section('title', 'Unggah Foto')

@section('content')
<div class="max-w-2xl">
    
    <!-- Breadcrumb & Title -->
    <div class="mb-6">
        <a href="{{ route('admin.gallery.index') }}" class="font-sans font-bold text-xs uppercase tracking-wider text-black hover:underline">
            ← Kembali ke Galeri
        </a>
        <h1 class="font-display text-4xl uppercase tracking-wider text-black mt-2">
            Unggah Foto Kegiatan
        </h1>
        <p class="font-sans text-sm text-zinc-600 mt-1">
            Unggah foto dokumentasi untuk membagikan momen seru TK SmartKids.
        </p>
    </div>

    <!-- Upload Form Card -->
    <div class="bg-white border-4 border-black p-6 md:p-8 shadow-brutalist-md">
        
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-6">
            @csrf

            <!-- Photo Input -->
            <div class="flex flex-col gap-1.5" x-data="{ fileName: '' }">
                <label class="font-sans font-black text-xs uppercase tracking-wider text-black">
                    Pilih File Foto
                </label>
                
                <!-- Customized Brutalist Upload Box -->
                <div class="border-4 border-dashed border-black bg-zinc-50 p-6 text-center relative hover:bg-yellow/10 transition-colors duration-150">
                    <input type="file" 
                           name="photo" 
                           id="photo" 
                           required 
                           accept="image/jpeg,image/png,image/webp" 
                           class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                           @change="fileName = $event.target.files[0] ? $event.target.files[0].name : ''">
                    
                    <div class="flex flex-col items-center gap-2">
                        <span class="text-3xl">📸</span>
                        <p class="font-sans font-bold text-sm text-black">
                            Klik di sini atau seret foto ke dalam area ini
                        </p>
                        <p class="font-sans text-xs text-zinc-500">
                            Hanya JPG, PNG, atau WEBP (Maks. 2MB)
                        </p>
                        
                        <!-- Selected file display -->
                        <div x-show="fileName" class="mt-4 bg-yellow border-2 border-black px-3 py-1 font-sans font-black text-xs inline-block text-black uppercase shadow-brutalist-sm" x-cloak>
                            File terpilih: <span x-text="fileName" class="lowercase font-bold"></span>
                        </div>
                    </div>
                </div>

                @error('photo')
                    <span class="text-red font-sans font-bold text-xs mt-1">
                        * {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Alt Text Input (Optional) -->
            <div class="flex flex-col gap-1.5">
                <label for="alt_text" class="font-sans font-black text-xs uppercase tracking-wider text-black">
                    Keterangan Foto (Alt Text) — Opsional
                </label>
                <input type="text" 
                       id="alt_text" 
                       name="alt_text" 
                       value="{{ old('alt_text') }}"
                       placeholder="Misal: Siswa sedang belajar menanam pohon di kebun sekolah" 
                       class="input-brutalist w-full">
                <span class="text-[10px] text-zinc-500 font-sans mt-1">
                    Membantu performa SEO gambar di mesin pencari dan ramah pembaca layar (screen reader).
                </span>
                @error('alt_text')
                    <span class="text-red font-sans font-bold text-xs mt-1">
                        * {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Categories Checklist -->
            <div class="flex flex-col gap-2">
                <label class="font-sans font-black text-xs uppercase tracking-wider text-black">
                    Pilih Kategori Foto Kegiatan
                </label>
                
                @if($categories->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 border-2 border-black p-4 bg-zinc-50">
                        @foreach($categories as $category)
                            <label class="flex items-start gap-2 font-sans text-xs font-semibold text-black cursor-pointer select-none">
                                <input type="checkbox" 
                                       name="categories[]" 
                                       value="{{ $category->id }}"
                                       {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}
                                       class="accent-black border-2 border-black w-4 h-4 mt-0.5">
                                <span>{{ $category->name }}</span>
                            </label>
                        @endforeach
                    </div>
                @else
                    <div class="border-2 border-dashed border-zinc-400 p-4 text-center font-sans text-xs text-zinc-500 bg-zinc-50">
                        Belum ada kategori. 
                        <a href="{{ route('admin.category.create') }}" class="text-blue-pop font-black hover:underline uppercase ml-1">
                            Buat Kategori Pertama →
                        </a>
                    </div>
                @endif
                
                @error('categories')
                    <span class="text-red font-sans font-bold text-xs mt-1">
                        * {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Submit Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-zinc-200">
                <button type="submit" 
                        class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-sm uppercase tracking-wider py-3 px-6 cursor-pointer select-none">
                    Unggah Foto 📤
                </button>
                <a href="{{ route('admin.gallery.index') }}" 
                   class="btn-brutalist bg-white hover:bg-zinc-150 text-black font-sans font-bold text-sm uppercase tracking-wider py-3 px-6 text-center select-none">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>
@endsection

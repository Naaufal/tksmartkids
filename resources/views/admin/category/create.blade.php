@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
<div class="max-w-md">
    
    <!-- Breadcrumb & Title -->
    <div class="mb-6">
        <a href="{{ route('admin.category.index') }}" class="font-sans font-bold text-xs uppercase tracking-wider text-black hover:underline">
            ← Kembali ke Kategori
        </a>
        <h1 class="font-display text-4xl uppercase tracking-wider text-black mt-2">
            Tambah Kategori Baru
        </h1>
        <p class="font-sans text-sm text-zinc-600 mt-1">
            Buat kategori baru untuk mengelompokkan dokumentasi foto kegiatan sekolah.
        </p>
    </div>

    <!-- Add Category Form Card -->
    <div class="bg-white border-4 border-black p-6 md:p-8 shadow-brutalist-md">
        
        <form action="{{ route('admin.category.store') }}" method="POST" class="flex flex-col gap-6">
            @csrf

            <!-- Name Field -->
            <div class="flex flex-col gap-1.5">
                <label for="name" class="font-sans font-black text-xs uppercase tracking-wider text-black">
                    Nama Kategori
                </label>
                <input type="text" 
                       id="name" 
                       name="name" 
                       value="{{ old('name') }}"
                       required 
                       placeholder="Misal: Outbound, Kegiatan Kelas, Wisuda" 
                       class="input-brutalist w-full"
                       autofocus>
                <span class="text-[10px] text-zinc-500 font-sans mt-1">
                    Slug URL akan digenerate secara otomatis dari nama kategori yang diisi.
                </span>
                @error('name')
                    <span class="text-red font-sans font-bold text-xs mt-1">
                        * {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col sm:flex-row gap-3 pt-4 border-t border-zinc-200">
                <button type="submit" 
                        class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-sm uppercase tracking-wider py-3 px-6 cursor-pointer select-none">
                    Simpan Kategori 💾
                </button>
                <a href="{{ route('admin.category.index') }}" 
                   class="btn-brutalist bg-white hover:bg-zinc-150 text-black font-sans font-bold text-sm uppercase tracking-wider py-3 px-6 text-center select-none">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>
@endsection

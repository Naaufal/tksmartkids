@extends('layouts.admin')

@section('title', 'Kelola Kategori')

@section('content')
<div class="flex flex-col gap-8" x-data="{ openDeleteConfirm: false, deleteActionUrl: '' }">

    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4">
        <div>
            <h1 class="font-display text-4xl md:text-5xl uppercase tracking-wider text-black">
                Kelola Kategori Foto
            </h1>
            <p class="font-sans font-medium text-zinc-600 text-sm">
                Kelola kategori pengelompokan foto kegiatan yang tampil di halaman publik.
            </p>
        </div>
        <div>
            <a href="{{ route('admin.category.create') }}" 
               class="btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-sm uppercase tracking-wider px-6 py-3 inline-block">
                ➕ Tambah Kategori
            </a>
        </div>
    </div>

    <!-- Categories Table Card -->
    <div class="bg-white border-4 border-black p-4 md:p-6 shadow-brutalist-md overflow-x-auto">
        @if($categories->count() > 0)
            <table class="w-full border-collapse text-left">
                <thead>
                    <tr class="border-b-4 border-black">
                        <th class="py-3 px-4 font-sans font-black text-xs uppercase tracking-wider text-black w-16">No</th>
                        <th class="py-3 px-4 font-sans font-black text-xs uppercase tracking-wider text-black">Nama Kategori</th>
                        <th class="py-3 px-4 font-sans font-black text-xs uppercase tracking-wider text-black">Slug (URL)</th>
                        <th class="py-3 px-4 font-sans font-black text-xs uppercase tracking-wider text-black w-32 text-center">Jumlah Foto</th>
                        <th class="py-3 px-4 font-sans font-black text-xs uppercase tracking-wider text-black w-48 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y-2 divide-zinc-200">
                    @foreach($categories as $index => $category)
                        <tr class="hover:bg-zinc-50 transition-colors">
                            <td class="py-4 px-4 font-sans font-bold text-sm text-black">{{ $index + 1 }}</td>
                            <td class="py-4 px-4 font-sans font-bold text-sm text-black">
                                <span class="bg-yellow/30 px-2 py-1 border border-black shadow-brutalist-sm text-black">
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td class="py-4 px-4 font-sans text-xs text-zinc-500 font-semibold">
                                <code>{{ $category->slug }}</code>
                            </td>
                            <td class="py-4 px-4 text-center">
                                <span class="inline-block px-2.5 py-0.5 rounded-full text-xs font-black bg-zinc-100 border-2 border-black text-black">
                                    {{ $category->photos_count }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-right">
                                <div class="inline-flex gap-2">
                                    
                                    <!-- Edit Link -->
                                    <a href="{{ route('admin.category.edit', $category) }}" 
                                       class="btn-brutalist bg-white hover:bg-yellow text-black font-sans font-bold text-xs uppercase tracking-wider px-3 py-1.5 inline-block">
                                        ✏️ Edit
                                    </a>

                                    <!-- Delete Trigger -->
                                    <button @click="deleteActionUrl = '{{ route('admin.category.destroy', $category) }}'; openDeleteConfirm = true"
                                            type="button"
                                            class="px-3 py-1.5 border-2 border-black bg-red text-white font-sans font-black text-xs uppercase tracking-wider shadow-brutalist-sm hover:bg-orange cursor-pointer select-none">
                                        🗑️ Hapus
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <!-- Empty state inside card -->
            <div class="py-12 text-center flex flex-col items-center gap-3">
                <span class="text-4xl">🏷️</span>
                <p class="font-sans font-bold text-sm text-zinc-500">Belum ada kategori kegiatan yang dibuat.</p>
                <a href="{{ route('admin.category.create') }}" class="font-sans font-black text-xs text-blue-pop uppercase tracking-wider hover:underline">
                    + Tambah Kategori Baru
                </a>
            </div>
        @endif
    </div>

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
        
        <div class="bg-white border-4 border-black p-6 max-w-sm w-full shadow-brutalist-xl rotate-[-1.5deg]"
             @click.away="openDeleteConfirm = false"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="scale-95 translate-y-4"
             x-transition:enter-end="scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="scale-100 translate-y-0"
             x-transition:leave-end="scale-95 translate-y-4">
            
            <h4 class="font-display text-2xl text-black uppercase tracking-wider mb-2">
                Hapus Kategori?
            </h4>
            <p class="font-sans text-sm text-zinc-650 mb-6 leading-relaxed">
                Apakah Anda yakin ingin menghapus kategori ini? 
                <strong class="text-red">Catatan:</strong> Foto kegiatan yang menggunakan kategori ini TIDAK akan ikut terhapus (hanya hapus pengelompokannya saja).
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

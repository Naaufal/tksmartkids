<!DOCTYPE html>
<html lang="id" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') - Panel Admin TK SmartKids</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js CDN (Deferred) -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex flex-col min-h-full font-sans text-dark bg-white antialiased">

    <!-- Top Fat Border Header -->
    <div class="divider-yellow"></div>

    <!-- Admin Wrapper -->
    <div class="flex flex-col md:flex-row min-h-screen" x-data="{ sidebarOpen: false }">
        
        <!-- Mobile Header Bar -->
        <header class="md:hidden flex items-center justify-between px-4 py-3 bg-black text-white border-b-4 border-black">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-yellow border-2 border-black flex items-center justify-center font-display text-lg text-black shadow-brutalist-sm">
                    SK
                </div>
                <span class="font-display text-xl uppercase tracking-wider text-yellow">
                    TK SmartKids Admin
                </span>
            </div>
            <button @click="sidebarOpen = !sidebarOpen" 
                    type="button"
                    class="w-10 h-10 border-2 border-black bg-yellow text-black flex items-center justify-center font-bold text-xl shadow-brutalist-sm focus:outline-none">
                <span x-show="!sidebarOpen">☰</span>
                <span x-show="sidebarOpen" x-cloak>✕</span>
            </button>
        </header>

        <!-- Sidebar (Desktop and Mobile drawer) -->
        <aside class="w-full md:w-64 bg-halftone-white border-r-4 border-b-4 md:border-b-0 border-black flex flex-col justify-between shrink-0 transition-all duration-300 md:block"
               :class="sidebarOpen ? 'block' : 'hidden md:block'">
            
            <div class="p-6">
                <!-- Branding -->
                <div class="hidden md:flex items-center gap-2 mb-8">
                    <div class="w-9 h-9 bg-yellow border-2 border-black flex items-center justify-center font-display text-xl text-black shadow-brutalist-sm">
                        SK
                    </div>
                    <span class="font-display text-2xl uppercase tracking-wider text-black">
                        Admin Panel
                    </span>
                </div>

                <!-- Navigation List -->
                <nav class="flex flex-col gap-3">
                    @php
                        $navItems = [
                            ['route' => 'admin.dashboard', 'label' => '📊 Dashboard', 'roles' => ['superadmin', 'kepala_sekolah']],
                            ['route' => 'admin.gallery.index', 'label' => '📸 Kelola Galeri', 'roles' => ['superadmin', 'kepala_sekolah']],
                            ['route' => 'admin.category.index', 'label' => '🏷️ Kelola Kategori', 'roles' => ['superadmin', 'kepala_sekolah']],
                        ];
                    @endphp

                    @foreach($navItems as $item)
                        @php
                            $isActive = request()->routeIs($item['route']) || (Str::contains($item['route'], 'gallery') && request()->is('admin/galeri*') && !request()->is('admin/galeri/kategori*'));
                            if ($item['route'] === 'admin.category.index') {
                                $isActive = request()->is('admin/galeri/kategori*');
                            }
                        @endphp
                        <a href="{{ route($item['route']) }}" 
                           class="px-4 py-3 font-sans font-bold text-sm uppercase tracking-wider transition-all border-2 flex items-center gap-2 {{ $isActive ? 'bg-yellow border-black shadow-brutalist-sm text-black translate-x-1 translate-y-1' : 'border-transparent text-black hover:bg-yellow hover:border-black hover:shadow-brutalist-sm' }}">
                            {{ $item['label'] }}
                        </a>
                    @endforeach

                    <!-- Upcoming Modules (Fase 3) Indicators -->
                    <div class="border-t-2 border-black my-4 pt-4">
                        <span class="text-[10px] uppercase font-black tracking-widest text-zinc-500 block mb-2 px-2">Modul Lain (Fase 3)</span>
                        <div class="px-3 py-2 text-xs font-bold text-zinc-400 select-none border border-transparent">
                            📝 Kelola Konten
                        </div>
                        <div class="px-3 py-2 text-xs font-bold text-zinc-400 select-none border border-transparent">
                            💰 Kelola Harga
                        </div>
                        <div class="px-3 py-2 text-xs font-bold text-zinc-400 select-none border border-transparent">
                            👥 Kelola User
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Profile and Logout area -->
            @if(isset($admin_profile))
                <div class="p-6 border-t-4 border-black bg-white">
                    <div class="mb-4">
                        <span class="text-[10px] font-black uppercase text-zinc-400 block tracking-widest leading-none">Login sebagai</span>
                        <span class="font-sans font-black text-sm text-black block truncate mt-1">{{ $admin_profile->name }}</span>
                        
                        <span class="inline-block border-2 border-black px-2 py-0.5 mt-1 font-display text-xs bg-yellow shadow-brutalist-sm select-none">
                            {{ $admin_profile->role === 'superadmin' ? 'SUPERADMIN' : 'KEPALA SEKOLAH' }}
                        </span>
                    </div>

                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" 
                                class="w-full btn-brutalist bg-red hover:bg-orange text-white font-sans font-black text-xs uppercase tracking-wider py-2.5 block text-center cursor-pointer select-none">
                            🚪 Logout
                        </button>
                    </form>
                </div>
            @endif
        </aside>

        <!-- Main Body Area -->
        <main class="flex-grow p-6 md:p-10 bg-halftone-white/40">
            
            <!-- Session Messages (Neo-Brutalist Alert) -->
            @if(session('success'))
                <div class="mb-6 bg-green-stamp text-white border-4 border-black p-4 font-sans font-bold shadow-brutalist-md flex items-center justify-between rotate-[-0.5deg]">
                    <div class="flex items-center gap-2">
                        <span class="text-xl">✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button @click="$el.parentElement.remove()" class="text-white hover:text-black font-black focus:outline-none">✕</button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 bg-red text-white border-4 border-black p-4 font-sans font-bold shadow-brutalist-md flex items-center justify-between rotate-[0.5deg]">
                    <div class="flex items-center gap-2">
                        <span class="text-xl">⚠️</span>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button @click="$el.parentElement.remove()" class="text-white hover:text-black font-black focus:outline-none">✕</button>
                </div>
            @endif

            <!-- Page Content -->
            @yield('content')
            
        </main>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="id" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>Login Admin - TK SmartKids</title>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="flex flex-col min-h-full font-sans bg-halftone justify-center items-center p-4">

    <!-- Top Fat Border header simulator for aesthetic -->
    <div class="fixed top-0 left-0 right-0 h-4 bg-red border-b-4 border-black"></div>

    <!-- Login Card -->
    <div class="w-full max-w-md bg-white border-4 border-black p-8 shadow-brutalist-xl rotate-[-1deg] hover:rotate-0 transition-transform duration-200">
        
        <!-- Branding Logo / Block -->
        <div class="flex items-center gap-3 justify-center mb-6">
            <div class="w-12 h-12 bg-yellow border-2 border-black flex items-center justify-center font-display text-3xl text-black shadow-brutalist-sm">
                SK
            </div>
            <h1 class="font-display text-4xl text-black uppercase tracking-wider leading-none">
                TK SMARTKIDS
            </h1>
        </div>

        <div class="text-center mb-8">
            <span class="stamp stamp-black text-sm uppercase">
                Panel Admin
            </span>
            <p class="font-sans font-medium text-zinc-500 text-sm mt-3 leading-tight">
                Masukkan kredensial Supabase Auth Anda untuk mengakses panel.
            </p>
        </div>

        <!-- Session Message / Global Errors -->
        @if(session('error'))
            <div class="mb-4 bg-red text-white border-3 border-black p-3 font-sans font-bold text-sm shadow-brutalist-sm">
                ⚠️ {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="mb-4 bg-green-stamp text-white border-3 border-black p-3 font-sans font-bold text-sm shadow-brutalist-sm">
                ✅ {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="flex flex-col gap-5">
            @csrf

            <!-- Email Field -->
            <div class="flex flex-col gap-1.5">
                <label for="email" class="font-sans font-black text-xs uppercase tracking-wider text-black">
                    Alamat Email
                </label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="{{ old('email') }}" 
                       required 
                       placeholder="nama@email.com"
                       class="input-brutalist w-full"
                       autocomplete="email">
                @error('email')
                    <span class="text-red font-sans font-bold text-xs mt-1">
                        * {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Password Field -->
            <div class="flex flex-col gap-1.5">
                <label for="password" class="font-sans font-black text-xs uppercase tracking-wider text-black">
                    Kata Sandi
                </label>
                <input type="password" 
                       id="password" 
                       name="password" 
                       required 
                       placeholder="••••••••"
                       class="input-brutalist w-full"
                       autocomplete="current-password">
                @error('password')
                    <span class="text-red font-sans font-bold text-xs mt-1">
                        * {{ $message }}
                    </span>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full btn-brutalist bg-yellow hover:bg-orange text-black font-sans font-black text-base uppercase py-3.5 tracking-wider mt-4 cursor-pointer select-none">
                Masuk Sekarang 🔓
            </button>
        </form>

        <div class="mt-8 border-t-2 border-dashed border-black pt-4 text-center">
            <a href="{{ route('home') }}" class="font-sans font-bold text-xs text-black uppercase tracking-wider hover:underline">
                ← Kembali ke Halaman Utama
            </a>
        </div>
    </div>

</body>
</html>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
  <a href="https://railway.app"><img src="https://img.shields.io/badge/deployed%20on-Railway-blueviolet?style=flat-square" alt="Deployed on Railway"></a>
  <a href="https://supabase.com"><img src="https://img.shields.io/badge/powered%20by-Supabase-3ECF8E?style=flat-square" alt="Supabase"></a>
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Laravel-11-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel 11"></a>
  <img src="https://img.shields.io/badge/license-MIT-blue?style=flat-square" alt="License">
</p>

---

# TK SmartKids — Website Resmi

Website profil resmi **TK SmartKids**, Karang Bahagia, Bekasi. Dibangun dengan Laravel 11 + Supabase sebagai transformasi digital pertama sekolah — menghubungkan calon orang tua dengan informasi lengkap kapan saja, di mana saja.

---

## About

TK SmartKids adalah taman kanak-kanak berbasis rumahan yang telah berdiri selama **7 tahun** di Perumahan Sukaraya Indah, Kabupaten Bekasi.

Website ini hadir untuk:
- Menyediakan informasi sekolah yang lengkap dan aksesibel secara online
- Memfasilitasi komunikasi awal calon orang tua via WhatsApp
- Menampilkan galeri kegiatan sekolah yang dikelola mandiri oleh pihak sekolah

---

## Tech Stack

- **[Laravel 11](https://laravel.com)** — PHP framework dengan Blade templating
- **[Supabase](https://supabase.com)** — PostgreSQL database, Auth, dan Storage
- **[Tailwind CSS](https://tailwindcss.com)** — Utility-first CSS framework
- **[Alpine.js](https://alpinejs.dev)** — Lightweight JavaScript interactivity
- **[Railway](https://railway.app)** — Zero-config deployment platform

---

## Getting Started

### Prerequisites

Pastikan sudah terinstall:

- PHP >= 8.3
- Composer
- Node.js >= 20 & NPM
- Akun [Supabase](https://supabase.com) (free tier)

### Installation

```bash
# Clone repository
git clone https://github.com/Naaufal/tksmartkids.git
cd tksmartkids

# Install dependencies
composer install
npm install && npm run build

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migration & seeder
php artisan migrate
php artisan db:seed

# Start development server
php artisan serve
```

### Environment Configuration

Salin `.env.example` ke `.env` dan isi variabel berikut:

```env
# App
APP_NAME="TK SmartKids"
APP_ENV=local
APP_URL=http://localhost:8000

# Database (Supabase PostgreSQL)
DB_CONNECTION=pgsql
DB_HOST=[supabase-db-host]
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=postgres
DB_PASSWORD=[supabase-db-password]

# Supabase
SUPABASE_URL=https://[project-ref].supabase.co
SUPABASE_ANON_KEY=[anon-key]
SUPABASE_SERVICE_ROLE_KEY=[service-role-key]
SUPABASE_STORAGE_BUCKET=gallery

# Integrations
WHATSAPP_NUMBER= xxxxxxxxxx
GOOGLE_ANALYTICS_ID=G-XXXXXXXXXX
```

### Superadmin Setup

Akun superadmin dibuat manual via Supabase Dashboard:

```sql
-- Setelah buat user di Supabase Authentication, jalankan query ini
INSERT INTO user_profiles (id, name, role, is_active)
VALUES ('[uuid-dari-supabase-auth]', 'Admin', 'superadmin', true);
```

---

## Deployment

Project ini di-deploy ke **Railway.app** dengan auto-deploy dari branch `main`.

Pastikan seluruh environment variable sudah dikonfigurasi di Railway Dashboard sebelum deploy pertama.

> ⚠️ Set `APP_DEBUG=false` dan `APP_ENV=production` di environment production.

---

## Security

Jika kamu menemukan celah keamanan, harap hubungi langsung.

---

## License

Project ini merupakan proyek klien dan tidak dilisensikan untuk penggunaan umum.

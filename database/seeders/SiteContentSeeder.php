<?php

namespace Database\Seeders;

use App\Models\SiteContent;
use Illuminate\Database\Seeder;

class SiteContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contents = [
            // Home Page
            [
                'key' => 'home_hero_tagline',
                'value' => 'BELAJAR, BERMAIN, BERKEMBANG.',
                'page' => 'home',
            ],
            [
                'key' => 'home_hero_subtitle',
                'value' => 'TK SmartKids membantu anak tumbuh cerdas, kreatif, dan mandiri dengan suasana belajar yang menyenangkan.',
                'page' => 'home',
            ],
            [
                'key' => 'home_intro_title',
                'value' => 'Selamat Datang di TK SmartKids',
                'page' => 'home',
            ],
            [
                'key' => 'home_intro_content',
                'value' => 'TK SmartKids adalah taman kanak-kanak berbasis rumahan yang berlokasi di Perumahan Sukaraya Indah, Bekasi. Kami berdedikasi untuk mendidik anak-anak usia dini melalui pendekatan bermain sambil belajar, menumbuhkan karakter yang mandiri, kreatif, dan berakhlak mulia.',
                'page' => 'home',
            ],
            [
                'key' => 'home_highlight_1_title',
                'value' => 'Lingkungan Aman & Nyaman',
                'page' => 'home',
            ],
            [
                'key' => 'home_highlight_1_desc',
                'value' => 'Sekolah berbasis rumahan memberikan suasana hangat seperti rumah sendiri.',
                'page' => 'home',
            ],
            [
                'key' => 'home_highlight_2_title',
                'value' => 'Guru Berpengalaman',
                'page' => 'home',
            ],
            [
                'key' => 'home_highlight_2_desc',
                'value' => 'Dididik oleh pengajar profesional yang penuh kasih sayang.',
                'page' => 'home',
            ],
            [
                'key' => 'home_highlight_3_title',
                'value' => 'Kurikulum Holistik',
                'page' => 'home',
            ],
            [
                'key' => 'home_highlight_3_desc',
                'value' => 'Menggabungkan Kurikulum Merdeka dengan metode pembelajaran aktif.',
                'page' => 'home',
            ],
            [
                'key' => 'home_cta_title',
                'value' => 'TERTARIK? LANGSUNG TANYA KE KAMI.',
                'page' => 'home',
            ],
            [
                'key' => 'home_cta_subtitle',
                'value' => 'Masih ada tempat terbatas untuk tahun ajaran baru!',
                'page' => 'home',
            ],

            // About Page
            [
                'key' => 'about_hero_title',
                'value' => 'TENTANG KAMI',
                'page' => 'about',
            ],
            [
                'key' => 'about_hero_subtitle',
                'value' => 'Sekolah rumahan. Hati yang besar.',
                'page' => 'about',
            ],
            [
                'key' => 'about_history_title',
                'value' => 'Sejarah Singkat',
                'page' => 'about',
            ],
            [
                'key' => 'about_history_content',
                'value' => 'TK SmartKids telah berdiri selama 7 tahun di Perumahan Sukaraya Indah, Kabupaten Bekasi. Dimulai dari kepedulian terhadap pendidikan anak usia dini di lingkungan sekitar, kini TK SmartKids telah mendidik puluhan anak dengan penuh kasih sayang dan dedikasi.',
                'page' => 'about',
            ],
            [
                'key' => 'about_kepsek_name',
                'value' => 'Sri Handayani',
                'page' => 'about',
            ],
            [
                'key' => 'about_kepsek_title',
                'value' => 'Kepala Sekolah',
                'page' => 'about',
            ],
            [
                'key' => 'about_kepsek_content',
                'value' => 'Sri Handayani adalah pendiri dan kepala sekolah TK SmartKids. Dengan pengalaman bertahun-tahun di dunia pendidikan anak, beliau memimpin para guru dengan kasih sayang untuk mewujudkan generasi yang cerdas dan mandiri.',
                'page' => 'about',
            ],
            [
                'key' => 'about_visi',
                'value' => 'Menjadi lembaga pendidikan anak usia dini yang unggul dalam membentuk karakter mandiri, kreatif, cerdas, dan berakhlak mulia sejak dini.',
                'page' => 'about',
            ],
            [
                'key' => 'about_misi_1',
                'value' => 'Menyelenggarakan kegiatan bermain sambil belajar yang menyenangkan bagi anak.',
                'page' => 'about',
            ],
            [
                'key' => 'about_misi_2',
                'value' => 'Menanamkan nilai-nilai karakter dasar, kemandirian, dan budi pekerti luhur.',
                'page' => 'about',
            ],
            [
                'key' => 'about_misi_3',
                'value' => 'Mengembangkan kreativitas, bakat, dan potensi anak secara optimal.',
                'page' => 'about',
            ],
            [
                'key' => 'about_misi_4',
                'value' => 'Membangun kerja sama yang harmonis dengan orang tua untuk mendukung tumbuh kembang anak.',
                'page' => 'about',
            ],
            [
                'key' => 'about_class_info_title',
                'value' => 'Informasi Kelas',
                'page' => 'about',
            ],
            [
                'key' => 'about_class_info_content',
                'value' => 'Kami membuka kelas untuk jenjang TK A dan TK B dengan kapasitas maksimal 20 siswa per kelas guna menjamin fokus pembelajaran dan perhatian penuh kepada setiap anak.',
                'page' => 'about',
            ],
            [
                'key' => 'about_hours_title',
                'value' => 'Jam Operasional',
                'page' => 'about',
            ],
            [
                'key' => 'about_hours_content',
                'value' => 'Senin – Jumat, pukul 07:30 – 12:00 WIB.',
                'page' => 'about',
            ],

            // Facilities Page
            [
                'key' => 'facilities_hero_title',
                'value' => 'FASILITAS & METODE',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_hero_subtitle',
                'value' => 'Lingkungan belajar terbaik untuk si kecil.',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_list_title',
                'value' => 'Fasilitas Sekolah',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_item_1_title',
                'value' => 'Ruang Belajar',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_item_1_desc',
                'value' => 'Ruangan bersih, ber-AC, dan dilengkapi alat peraga edukatif.',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_item_2_title',
                'value' => 'Area Bermain',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_item_2_desc',
                'value' => 'Area bermain yang aman dan menyenangkan di dalam dan luar ruangan.',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_item_3_title',
                'value' => 'Penyimpanan Murid',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_item_3_desc',
                'value' => 'Rak penyimpanan khusus barang pribadi murid agar rapi dan tertib.',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_curriculum_title',
                'value' => 'Kurikulum Merdeka',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_curriculum_desc',
                'value' => 'Kami menerapkan Kurikulum Merdeka yang memberikan keleluasaan bagi pendidik untuk menciptakan pembelajaran berkualitas yang sesuai dengan kebutuhan dan lingkungan belajar anak.',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_method_title',
                'value' => 'Pendekatan Pembelajaran',
                'page' => 'fasilitas',
            ],
            [
                'key' => 'facilities_method_desc',
                'value' => 'Pembelajaran berbasis projek dan bermain yang bermakna. Kami merangsang aspek perkembangan anak (kognitif, bahasa, fisik-motorik, sosial-emosional, nilai agama dan moral) secara terintegrasi.',
                'page' => 'fasilitas',
            ],

            // Gallery Page
            [
                'key' => 'gallery_hero_title',
                'value' => 'GALERI KEGIATAN',
                'page' => 'gallery',
            ],
            [
                'key' => 'gallery_hero_subtitle',
                'value' => 'Momen seru anak-anak di TK SmartKids.',
                'page' => 'gallery',
            ],

            // Pricing & Contact Page
            [
                'key' => 'pricing_hero_title',
                'value' => 'BIAYA & KONTAK',
                'page' => 'pricing',
            ],
            [
                'key' => 'pricing_hero_subtitle',
                'value' => 'Transparan dan mudah dihubungi.',
                'page' => 'pricing',
            ],
            [
                'key' => 'contact_school_name',
                'value' => 'TK SmartKids',
                'page' => 'pricing',
            ],
            [
                'key' => 'contact_address',
                'value' => 'Perumahan Sukaraya Indah Blok D02 No.01, Desa Sukaraya, Kecamatan Karang Bahagia, Kabupaten Bekasi',
                'page' => 'pricing',
            ],
            [
                'key' => 'contact_whatsapp',
                'value' => '083895285804',
                'page' => 'pricing',
            ],
            [
                'key' => 'contact_hours',
                'value' => 'Senin – Jumat, 07:30 – 12:00 WIB',
                'page' => 'pricing',
            ],
        ];

        foreach ($contents as $content) {
            SiteContent::updateOrCreate(
                ['key' => $content['key']],
                [
                    'value' => $content['value'],
                    'page' => $content['page'],
                    'updated_at' => now(),
                ]
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Kegiatan Belajar', 'slug' => 'kegiatan-belajar'],
            ['name' => 'Bermain', 'slug' => 'bermain'],
            ['name' => 'Acara Sekolah', 'slug' => 'acara-sekolah'],
        ];

        foreach ($categories as $category) {
            GalleryCategory::firstOrCreate(
                ['slug' => $category['slug']],
                ['name' => $category['name']]
            );
        }
    }
}

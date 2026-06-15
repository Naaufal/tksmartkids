<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pricings = [
            [
                'label' => 'Uang Pangkal',
                'amount' => null,
                'description' => 'Biaya pendaftaran dan uang pangkal awal masuk sekolah.',
                'display_order' => 1,
            ],
            [
                'label' => 'Uang Aktivitas',
                'amount' => null,
                'description' => 'Biaya kegiatan penunjang belajar dan fasilitas siswa per tahun.',
                'display_order' => 2,
            ],
            [
                'label' => 'SPP Bulanan',
                'amount' => null,
                'description' => 'Iuran bulanan rutin untuk operasional belajar mengajar.',
                'display_order' => 3,
            ],
        ];

        foreach ($pricings as $pricing) {
            Pricing::firstOrCreate(
                ['label' => $pricing['label']],
                [
                    'amount' => $pricing['amount'],
                    'description' => $pricing['description'],
                    'display_order' => $pricing['display_order'],
                ]
            );
        }
    }
}

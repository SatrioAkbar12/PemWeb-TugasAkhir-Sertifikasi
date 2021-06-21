<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefKuesioner;

class RefKuesionerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefKuesioner::create([
            'pertanyaan' => 'Apakah Sertifikasi ini membantu Anda ?',
            'is_aktif' => 1,
        ]);

        RefKuesioner::create([
            'pertanyaan' => 'Menurut Anda seberapa bermanfaat Anda mengikuti sertifikasi ini ?',
            'is_aktif' => 1,
        ]);

        RefKuesioner::create([
            'pertanyaan' => 'Apakah Web ini memudahkan Anda dalam mendapatkan sertifikasi ?',
            'is_aktif' => 1,
        ]);

        RefKuesioner::create([
            'pertanyaan' => 'Bagaimana penilaian Anda terhadap web ini ?',
            'is_aktif' => 1,
        ]);

        RefKuesioner::create([
            'pertanyaan' => 'Apa kesan dan pesan Anda terhadap sertifikasi ini ?',
            'is_aktif' => 1,
        ]);
    }
}

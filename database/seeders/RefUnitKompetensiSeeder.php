<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefUnitKompetensi;

class RefUnitKompetensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefUnitKompetensi::create([
            'nama' => 'UK1',
            'is_aktif' => 1,
        ]);

        RefUnitKompetensi::create([
            'nama' => 'UK2',
            'is_aktif' => 1,
        ]);

        RefUnitKompetensi::create([
            'nama' => 'UK3',
            'is_aktif' => 1,
        ]);

        RefUnitKompetensi::create([
            'nama' => 'UK4',
            'is_aktif' => 0,
        ]);

        RefUnitKompetensi::create([
            'nama' => 'UK5',
            'is_aktif' => 0,
        ]);
    }
}

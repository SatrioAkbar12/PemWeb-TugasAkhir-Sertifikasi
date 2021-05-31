<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prodi::create([
            'nama' => 'Matematika',
            'fakultas' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'created_by' => 'seeder',
            'edited_by' => 'seeder',
        ]);

        Prodi::create([
            'nama' => 'Fisika',
            'fakultas' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'created_by' => 'seeder',
            'edited_by' => 'seeder',
        ]);

        Prodi::create([
            'nama' => 'Biologi',
            'fakultas' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'created_by' => 'seeder',
            'edited_by' => 'seeder',
        ]);

        Prodi::create([
            'nama' => 'Kimia',
            'fakultas' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'created_by' => 'seeder',
            'edited_by' => 'seeder',
        ]);

        Prodi::create([
            'nama' => 'Informatika',
            'fakultas' => 'Fakultas Matematika dan Ilmu Pengetahuan Alam',
            'created_by' => 'seeder',
            'edited_by' => 'seeder',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefJenisSertifikasi;

class RefJenisSertifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RefJenisSertifikasi::create([
            'nama'=> 'Sertifikasi Profesi',
                'keterangan'=> 'Proses pemberian sertifikat kompetensi untuk profesi/keahlian tertentu',
                'status_jenis_sertifikasi'=> 'Nasional',
                'created_at' => date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
                'created_by'=> 'seeder',
                'edited_by'=> 'seeder',
                'is_aktif'=> 1,
        ]);
        
        RefJenisSertifikasi::create([
            'nama'=> 'Sertifikasi Akademik',
                'keterangan'=> 'Sertifikasi akademik yang memberiakn gelar, Sarjana, Master dll',
                'status_jenis_sertifikasi'=> 'Nasional',
                'created_at'=> date("Y-m-d"),
                'updated_at' => date("Y-m-d"),
                'created_by'=> 'seeder',
                'edited_by'=> 'seeder',
                'is_aktif'=> 1,
        ]);
        
    }
}

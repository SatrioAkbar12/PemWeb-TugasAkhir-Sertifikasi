<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RefNegara;

class RefNegaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list_negara = array(
            'Indonesia',
            'Malaysia',
            'Singapura',
            'Brunei Darussalam',
            'Timor Leste',
            'Filipina',
            'Thailand',
            'Vietnam',
            'Laos',
            'Myanmar',
            'Kamboja'
        );

        for($i=0; $i<count($list_negara); $i++) {
            RefNegara::create([
                'nama' => $list_negara[$i]
            ]);
        }
    }
}

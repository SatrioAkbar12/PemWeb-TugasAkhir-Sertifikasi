<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AsesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'Asesor',
            'email' => 'asesor@mail.com',
            'password' => Hash::make('asesor123'),
            'role' => 'asesor'
        ]);
    }
}

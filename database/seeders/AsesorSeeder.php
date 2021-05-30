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
            'username' => 'Siraj',
            'email' => 'asesor1@mail.com',
            'password' => Hash::make('siraj123'),
            'role' => 'asesor'
        ]);
    }
}

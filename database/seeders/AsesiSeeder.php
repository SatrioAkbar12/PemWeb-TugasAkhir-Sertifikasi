<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AsesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'asesi',
            'email' => 'asesi@mail.com',
            'password' => Hash::make('asesi123'),
            'role' => 'asesi'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Pengurus Masjid',
            'email' => 'pengurus@masjid.com',
            'password' => Hash::make('password123'), // Password: password123
        ]);
    }
}
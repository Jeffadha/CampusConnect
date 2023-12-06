<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Jeffadha S.kom',
            'email' => 'jeffa@gmail.com',
            'password' => Hash::make('jeffa123'),
            'role' => 'dosen'
        ]);
        User::create([
            'name' => 'Ahmad',
            'email' => 'ahmad@gmail.com',
            'password' => Hash::make('ahmad123'),
            'role' => 'mahasiswa'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::query()->create([
            'name' => 'Mas Bariq',
            'email' => 'bariq@gmail.com',
            'password' => Hash::make('bariq123'),
            'role' => 'coordinator'
        ]);
        User::query()->create([
            'name' => 'razor',
            'email' => 'razor@gmail.com',
            'password' => Hash::make('razor123'),
            'role' => 'employee'
        ]);
    }
}

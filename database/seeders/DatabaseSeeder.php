<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\jurnal;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            CategorySeeder::class,
            UserSeeder::class,
            JurnalSeeder::class
        ]);

        // User::factory(10)->create();
        // Category::factory(10)->create();

        // category::query()->create([
        //     'name' => 'Penilaian'
        // ]);
        // category::query()->create([
        //     'name' => 'Webinar'
        // ]);
        // category::query()->create([
        //     'name' => 'Website'
        // ]);
        // category::query()->create([
        //     'name' => 'Admin'
        // ]);
        // category::query()->create([
        //     'name' => 'Grafis'
        // ]);

        // User::query()->create([
        //     'name' => 'Mas Bariq',
        //     'email' => 'bariq@gmail.com',
        //     'password' => Hash::make('bariq123213'),
        //     'role' => 'employee'
        // ]);

        // User::query()->create([
        //     'name' => 'Mas Aftiyan',
        //     'email' => 'aftiyan@gmail.com',
        //     'password' => Hash::make('Aftiyan123213'),
        //     'role' => 'coordinator'
        // ]);

        // User::query()->create([
        //     'name' => 'Mas Aji',
        //     'email' => 'aji@gmail.com',
        //     'password' => Hash::make('aji123213'),
        //     'role' => 'coordinator'
        // ]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(10)->create();

        Category::query()->create([
            'name' => 'Penilaian'
        ]);
        Category::query()->create([
            'name' => 'Webinar'
        ]);
        Category::query()->create([
            'name' => 'Website'
        ]);
        Category::query()->create([
            'name' => 'Admin'
        ]);
        Category::query()->create([
            'name' => 'Grafis'
        ]);
    }
}

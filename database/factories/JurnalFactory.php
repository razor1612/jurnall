<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Coordinator;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jurnal>
 */
class JurnalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $employeeId = User::query()->where('role', 'employee')->inRandomOrder()->first()->id;
        $coordinatorId = User::query()->where('role', 'coordinator')->inRandomOrder()->first()->id;
        $categoryId = Category::query()->inRandomOrder()->first()->id;

        $timing = ['before', 'after'];
        $timingKey = array_rand($timing, 1);

        $status = ['progress', 'complete'];
        $statusKey = array_rand($status, 1);

        $day = [now()->addDay(mt_rand(1, 10))->format('Y-m-d H:i:s'), now()->format('Y-m-d H:i:s')];
        $dayKey = array_rand($day, 1);
        $day = $day[$dayKey];
        return [
            'employee_id'=> $employeeId,
            'coordinator_id'=> $coordinatorId,
            'timing' => $timingKey,
            'categories_id' => $categoryId,
            'description' => fake()->realText(10),
            'target' => fake()->text(10),
            'status' => $status[$statusKey],
            'comment' => fake()->text(10),
            'created_at' => $day,
            'updated_at' => $day
        ];
    }
}

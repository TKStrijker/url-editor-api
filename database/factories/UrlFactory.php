<?php

namespace Database\Factories;

use App\Models\Url;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Url>
 */
class UrlFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::firstOrCreate(
                User::factory()->create()->toArray()
            )->id,
            'original_url' => fake()->url(),
            'shortened_url' => fake()->url(),
            'redirect_url' => fake()->url(),
        ];
    }
}

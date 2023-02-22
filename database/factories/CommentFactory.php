<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'comment'
            => $this->faker->realText(100),
            'user_id' => $this->faker->numberBetween(1, 3),
            'post_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}

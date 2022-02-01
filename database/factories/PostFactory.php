<?php

namespace Database\Factories;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'            => $this->faker->unique()->sentence(),
            'description'      => $this->faker->unique()->paragraph(),
            'publication_date' => Carbon::now()->toDateTimeString()
        ];
    }
}

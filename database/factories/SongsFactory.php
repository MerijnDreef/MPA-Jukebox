<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Genre;

class SongsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(),
            'artist_name' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(1, 10),
            'genre_id' => Genre::factory() 
        ];
    }
}

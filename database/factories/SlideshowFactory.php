<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Slideshow;
use Faker\Factory as Faker;

class SlideshowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "title" => $this->faker->sentence(1),
            "subtitle" => $this->faker->sentence(1),
            "text" => $this->faker->sentence(3),
            "link" => $this->faker->sentence(3),
            "enable" => '1',
            "img" => $this->faker->randomElement(['girl1.png','girl2.png','girl3.png']),
            "ssorder" => $this->faker->numberBetween(1,100),
        ];
    }
}

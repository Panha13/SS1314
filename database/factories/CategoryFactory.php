<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Faker\Factory as Faker;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "cname" => $this->faker->words(1, true),
            "cdesc" => $this->faker->sentence(3, true),
            "cimg" => $this->faker->randomElement(["cat1.jpg","cat2.jpg","cat3.jpg"]),
        ];
    }
}

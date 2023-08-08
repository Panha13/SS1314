<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\models\Category;
use App\models\Product;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "pname" => $this->faker->words(1, true),
            "pdesc" => $this->faker->sentence(1, true),
            "enable" => '1',
            "featured" => $this->faker->randomElement([0,1]),
            "pprice" => $this->faker->numberBetween(100, 1000),
            "pimg" => $this->faker->randomElement(['p1.jpg','p2.jpg','p3.jpg']),
            "cid" => Category::all()->random()->cid,
            "quantity" => $this->faker->numberBetween(1, 100),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition ()
    {
        return [
            'title' => $this->faker->unique()->catchPhrase,
            "cost_per_year" => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 500000),
            "product_category_id" => $this->faker->numberBetween(41, 60),
//            "product_category_id" => $this->faker->numberBetween(1, 50),
        ];
    }
}

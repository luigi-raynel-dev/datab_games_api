<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
    	return [
            'sku' => $this->faker->regexify('[A-Z]{5}[0-4]{3}'),
    	    'name' => $this->faker->word,
            'price' => $this->faker->randomFloat(2),
            'stock' => $this->faker->numberBetween(0, 100),
            'category_id' => $this->faker->randomElement(Category::all())['id']
    	];
    }
}

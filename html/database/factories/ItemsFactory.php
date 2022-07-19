<?php

namespace Database\Factories;

use App\Models\Items;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ItemsFactory extends Factory
{
    protected $model = Items::class;

    public function definition(): array
    {
    	return [
            'amount' => $this->faker->randomDigit(),
    	    'order_id' => $this->faker->randomElement(Order::all())['id'],
            'product_id' => $this->faker->randomElement(Product::all())['id']
    	];
    }
}

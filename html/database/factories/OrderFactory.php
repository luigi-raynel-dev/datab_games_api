<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
    	return [
    	    'order_id' => $this->faker->uuid(),
            'customer_id' => $this->faker->randomElement(Customer::all())['id']
    	];
    }
}

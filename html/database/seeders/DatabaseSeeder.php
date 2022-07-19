<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Category, Product, Customer, Order, Items};

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()->count(15)->create();
        Product::factory()->count(250)->create();
        Customer::factory()->count(100)->create();
        Order::factory()->count(400)->create();
        Items::factory()->count(1200)->create();
    }
}

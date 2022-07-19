<?php

namespace Database\Factories;

use App\Models\Customer;
use Faker\Provider\pt_BR\{Person,Company};
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;
    
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');
        $customer = [
            'pf' => [
                'name' => $faker->name(),
                'cnpj_cpf' => $faker->cpf()
            ],
            'pj' =>[
                'name' => $faker->word(),
                'cnpj_cpf' => $faker->cnpj()
            ]
        ];

    	return [
    	    'name' => $this->faker->randomElement($customer)['name'],
            'cnpj_cpf' => $this->faker->randomElement($customer)['cnpj_cpf']
    	];
    }
}

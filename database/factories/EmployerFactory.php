<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //

            'first_name' => $this->faker->name(),
            'last_name' =>$this->faker->name(),
            'company_id' => rand(1,2),
            'email' => $this->faker->email(), // password
            'phone' => rand(10000,1000),
        ];
    }
}

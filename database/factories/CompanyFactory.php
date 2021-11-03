<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' =>$this->faker->email(),
            'logo' => $this->faker->image('public/storage/images',400,300), //
            'website' => $this->faker->url(),
        ];
    }
}

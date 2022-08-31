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
            'name' => $this->faker->company,
            'post_code' => $this->faker->postcode,
            'address' => $this->faker->streetAddress,
            'tel' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->email,
            'ceo_name' => $this->faker->name,
            'stuff_name' => $this->faker->name,
            'foundation' => $this->faker->date,
            'capital' => $this->faker->numberBetween(1000000, 10000000),
            'employee_number' => $this->faker->numberBetween(1,10),
            'note' => $this->faker->realText,
        ];
    }
}

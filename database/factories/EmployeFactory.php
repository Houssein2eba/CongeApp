<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'registration_number' =>$this->faker->randomNumber(6,true),
            'name' =>$this->faker->name(),
            'departement' =>$this->faker->word(),
            'hire_date' =>$this->faker->date(),
            'phone' =>$this->faker->randomNumber(8,true),
            'address' =>$this->faker->address(),
            'city' =>$this->faker->city(),

        ];
    }
}

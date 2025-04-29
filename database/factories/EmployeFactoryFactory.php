<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employe;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employe>
 */
class EmployeFactoryFactory extends Factory
{
    protected $model=Employe::class;

    public function definition(): array
    {
        return [
            'registration_number' =>$this->faker->randomDigital(),
            'fullname' =>$this->faker->name(),
            'departement' =>$this->faker->word(),
            'hire_date' =>$this->faker->date(),
            'phone' =>$this->faker->phoneNumber(),
            'address' =>$this->faker->address(),
            'city' =>$this->faker->city(),
            //
        ];
    }
}

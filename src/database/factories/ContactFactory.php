<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Contact;

class ContactFactory extends Factory
{


    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'last-name' => $this->faker->lastName(),
            'first-name' => $this->faker->firstName(),
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail(),
            'tel' => $this->faker->regexify('[0-9]{10,11}'),
            'address' => $this->faker->prefecture() . $this->faker->city() . $this->faker->streetAddress(),
            'category_id' => $this->faker->numberBetween(1,5),
            'detail' => $this->faker->secondaryAddress(),
        ];
    }
}

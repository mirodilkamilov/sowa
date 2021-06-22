<?php

namespace Database\Factories;

use App\Models\CompanyContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => [$this->faker->phoneNumber, $this->faker->phoneNumber],
            'email' => [$this->faker->safeEmail, $this->faker->safeEmail],
            'address' => $this->faker->address,
            'google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2238.091271499539!2d69.3055387383421!3d41.329694802707515!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38aef4c73708ffff%3A0xe52cd4bf2ce55aac!2z0KjQvtGDINCR0L7RgNGM0LHQsCDQo9C80L7Qsg!5e0!3m2!1sru!2s!4v1611902200724!5m2!1sru!2s',
        ];
    }
}

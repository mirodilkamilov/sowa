<?php

namespace Database\Factories;

use App\Models\UserContact;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserContact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $statuses = ['not reviewed', 'reviewed', 'need action', 'spam'];
        return [
            'name' => $this->faker->name,
            'phone' => $this->faker->phoneNumber,
            'message' => $this->faker->text,
            'status' => $this->faker->randomElement($statuses),
            'comment' => $this->faker->sentence,
        ];
    }
}

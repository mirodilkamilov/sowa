<?php

namespace Database\Factories;

use App\Models\AboutList;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutListFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AboutList::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => ['ru' => $this->faker->words(2, true) . ' (ru)', 'en' => $this->faker->words(2, true) . ' (en)', 'uz' => $this->faker->words(2, true) . ' (uz)'],
            'list' => [
                'ru' => [
                    $this->faker->words(2, true) . ' (ru)',
                    $this->faker->words(2, true) . ' (ru)',
                    $this->faker->words(2, true) . ' (ru)',
                    $this->faker->words(2, true) . ' (ru)',
                ],
                'en' => [
                    $this->faker->words(2, true) . ' (en)',
                    $this->faker->words(2, true) . ' (en)',
                    $this->faker->words(2, true) . ' (en)',
                    $this->faker->words(2, true) . ' (en)',
                ],
                'uz' => [
                    $this->faker->words(2, true) . ' (uz)',
                    $this->faker->words(2, true) . ' (uz)',
                    $this->faker->words(2, true) . ' (uz)',
                    $this->faker->words(2, true) . ' (uz)',
                ],
            ],

        ];
    }

}

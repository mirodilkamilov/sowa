<?php

namespace Database\Factories;

use App\Models\About;
use Illuminate\Database\Eloquent\Factories\Factory;

class AboutFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = About::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->faker->imageUrl(1920, 1280),
            'image_title' => ['ru' => $this->faker->sentence . ' (ru)', 'en' => $this->faker->sentence . ' (en)', 'uz' => $this->faker->sentence . ' (uz)'],
            'about_title' => ['ru' => $this->faker->sentence . ' (ru)', 'en' => $this->faker->sentence . ' (en)', 'uz' => $this->faker->sentence . ' (uz)'],
            'about_description' => ['ru' => $this->faker->text . ' (ru)', 'en' => $this->faker->text . ' (en)', 'uz' => $this->faker->text . ' (uz)'],
            'help_title' => ['ru' => $this->faker->sentence . ' (ru)', 'en' => $this->faker->sentence . ' (en)', 'uz' => $this->faker->sentence . ' (uz)'],
            'help_description' => ['ru' => $this->faker->text . ' (ru)', 'en' => $this->faker->text . ' (en)', 'uz' => $this->faker->text . ' (uz)'],
        ];
    }
}

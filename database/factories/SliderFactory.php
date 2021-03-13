<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    protected $model = Slider::class;
    private $position = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ['ru' => 'ru-' . $this->faker->sentence, 'en' => 'en-' . $this->faker->sentence, 'uz' => 'uz-' . $this->faker->sentence],
            'description' => ['ru' => 'ru-' . $this->faker->paragraph, 'en' => 'en-' . $this->faker->paragraph, 'uz' => 'uz-' . $this->faker->paragraph],
            'url' => $this->faker->url,
            'image' => 'assets/uploads/slider/slider-' . ++$this->position . '.png',
            'position' => $this->position,
        ];
    }
}

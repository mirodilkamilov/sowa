<?php

namespace Database\Factories;

use App\Models\Slide;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    protected $model = Slide::class;
    private int $position = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'sub_title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'description' => ['ru' => 'ru-' . $this->faker->paragraph, 'en' => 'en-' . $this->faker->paragraph, 'uz' => 'uz-' . $this->faker->paragraph],
            'url' => $this->faker->url,
            'image' => 'slides/slider-' . ++$this->position . '.jpg',
            'position' => $this->faker->numberBetween(1, 10),
        ];
    }
}

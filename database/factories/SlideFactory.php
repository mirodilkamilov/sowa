<?php

namespace Database\Factories;

use App\Models\Slide;
use Illuminate\Database\Eloquent\Factories\Factory;

class SlideFactory extends Factory
{
    protected $model = Slide::class;
    private $position = 0;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'sub_title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'description' => ['ru' => 'ru-' . $this->faker->paragraph, 'en' => 'en-' . $this->faker->paragraph, 'uz' => 'uz-' . $this->faker->paragraph],
            'url' => $this->faker->url,
            'image' => $this->faker->imageUrl('1200', '1800', 'slide ' . ++$this->position),
            'position' => $this->position,
        ];
    }
}

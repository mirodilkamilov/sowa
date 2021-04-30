<?php

namespace Database\Factories;

use App\Models\ProjectContent;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectContentFactory extends Factory
{
    protected $model = ProjectContent::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $type = $this->faker->randomElement(['text', 'image-small', 'image-big', 'slide']);
        $slide = [$this->faker->imageUrl('1200', '610'), $this->faker->imageUrl('1200', '610'), $this->faker->imageUrl('1200', '610')];
        return [
            'type' => $type,
            'position' => $this->faker->randomDigitNotNull,
            'title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'description' => ['ru' => 'ru-' . $this->faker->paragraph, 'en' => 'en-' . $this->faker->paragraph, 'uz' => 'uz-' . $this->faker->paragraph],
            'image' => $type === 'slide' ? $slide : $slide[0],
            'project_id' => mt_rand(1, 4),
        ];
    }
}

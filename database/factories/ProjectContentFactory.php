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
    public function definition(): array
    {
        $type = $this->faker->randomElement(['text', 'image-small', 'image-big', 'slide']);
        $slide = [
            'slide' => ['projects/test-content-1.png', 'projects/test-content-2.png', 'projects/test-content-3.png']
        ];
        $image = [
            'image' => 'projects/test-content-' . $this->faker->numberBetween(1, 3) . '.png'
        ];

        return [
            'type' => $type,
            'position' => $this->faker->randomDigitNotNull,
            'title' => ['ru' => 'ru-' . $this->faker->word, 'en' => 'en-' . $this->faker->word, 'uz' => 'uz-' . $this->faker->word],
            'description' => ['ru' => 'ru-' . $this->faker->paragraph, 'en' => 'en-' . $this->faker->paragraph, 'uz' => 'uz-' . $this->faker->paragraph],
            'image' => ($type === 'slide') ? $slide : $image,
            'project_id' => $this->faker->numberBetween(1, 4),
        ];
    }
}

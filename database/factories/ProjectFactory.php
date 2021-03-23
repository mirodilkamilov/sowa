<?php

namespace Database\Factories;

use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug' => ['ru' => $this->faker->slug(2), 'en' => $this->faker->slug(2), 'uz' => $this->faker->slug(2)],
            'main_title' => ['ru' => 'ru-' . $this->faker->sentence, 'en' => 'en-' . $this->faker->sentence, 'uz' => 'uz-' . $this->faker->sentence],
            'main_image' => $this->faker->imageUrl('1200', '675'),
            'client' => $this->faker->word,
            'year' => $this->faker->year,
            'url' => $this->faker->url,
        ];
    }
}

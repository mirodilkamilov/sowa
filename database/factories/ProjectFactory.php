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
    protected array $slugs = [
        'ali',
        'ice',
        'kidya',
        'somi',
        'wisdom',
        'yuridik'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $slug = $this->faker->randomElement($this->slugs);
        $key = array_search($slug, $this->slugs, true);
        unset($this->slugs[$key]);

        return [
            'slug' => ['ru' => $slug, 'en' => $this->faker->slug(2), 'uz' => $this->faker->slug(2)],
            'main_title' => ['ru' => 'ru-' . $this->faker->sentence, 'en' => 'en-' . $this->faker->sentence, 'uz' => 'uz-' . $this->faker->sentence],
            'main_image' => 'projects/' . $slug . '_cover.png',
            'client' => $this->faker->word,
            'year' => $this->faker->year,
            'url' => $this->faker->url,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\SocialMedia;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialMediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialMedia::class;
    private array $socialMediaNames = [
        'telegram',
        'facebook',
        'linkedin',
        'instagram'
    ];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $socialMedia = $this->faker->randomElement($this->socialMediaNames);
        $key = array_search($socialMedia, $this->socialMediaNames, true);
        unset($this->socialMediaNames[$key]);

        return [
            'name' => $socialMedia,
            'url' => $this->faker->url,
            'logo' => 'about/logo/' . $socialMedia . '.svg',
        ];
    }
}

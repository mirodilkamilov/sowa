<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $social_medias = [
            ['name' => 'facebook', 'url' => 'https://t.me/usersale202'],
            ['name' => 'telegram', 'url' => 'https://t.me/usersale202'],
            ['name' => 'instagram', 'url' => 'https://t.me/usersale202'],
        ];
        foreach ($social_medias as $social_media) {
            SocialMedia::create($social_media);
        }
    }
}

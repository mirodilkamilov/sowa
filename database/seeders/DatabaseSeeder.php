<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category' => json_encode(['ru' => 'Web (ru)', 'en' => 'Web (en)', 'uz' => 'Web (uz)'])],
            ['category' => json_encode(['ru' => 'App (ru)', 'en' => 'App (en)', 'uz' => 'App (uz)'])],
            ['category' => json_encode(['ru' => 'Design (ru)', 'en' => 'Design (en)', 'uz' => 'Design (uz)'])],
            ['category' => json_encode(['ru' => 'Test (ru)', 'en' => 'Test (en)', 'uz' => 'Test (uz)'])],
        ];
        DB::table('categories')->insert($categories);


        $counter = 0;
        $project = [
            'slug' => json_encode(['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)]),
            'main_title' => json_encode(['ru' => 'ru-' . Str::random(15), 'en' => 'en-' . Str::random(15), 'uz' => 'uz-' . Str::random(15)]),
            'main_image' => 'assets/uploads/projects/main-image-' . ++$counter,
            'client' => Str::random(7),
            'year' => mt_rand(2000, date('Y')),
            'url' => 'https://laravel.com/docs/8.x',
        ];
        DB::table('projects')->insert($project);
        DB::table('projects')->insert($project);


//        $category_project = [
//            'project_id' => mt_rand(1, 2),
//            'category_id' => mt_rand(1, 4),
//        ];
//        DB::table('category_projects')->insert($category_project);
//        DB::table('category_projects')->insert($category_project);

        $counter = 0;
        $project_content = [
            ['project_id' => 1, 'type' => 'text', 'position' => 1, 'title' => json_encode(['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)]), 'description' => json_encode(['ru' => Str::random(30), 'en' => Str::random(30), 'uz' => Str::random(30)]), 'image' => null],
            ['project_id' => 1, 'type' => 'image_small', 'position' => 2, 'title' => null, 'description' => null, 'image' => json_encode(['assets/uploads/projects/image-' . ++$counter])],
            ['project_id' => 1, 'type' => 'text', 'position' => 3, 'title' => json_encode(['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)]), 'description' => json_encode(['ru' => Str::random(30), 'en' => Str::random(30), 'uz' => Str::random(30)]), 'image' => null],
            ['project_id' => 1, 'type' => 'slide', 'position' => 4, 'title' => null, 'description' => null, 'image' => json_encode(['assets/uploads/projects/image-' . ++$counter, 'assets/uploads/projects/image-' . ++$counter, 'assets/uploads/projects/image-' . ++$counter])],
            ['project_id' => 1, 'type' => 'text', 'position' => 5, 'title' => json_encode(['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)]), 'description' => json_encode(['ru' => Str::random(30), 'en' => Str::random(30), 'uz' => Str::random(30)]), 'image' => null],
            ['project_id' => 1, 'type' => 'image_big', 'position' => 6, 'title' => null, 'description' => null, 'image' => json_encode(['assets/uploads/projects/image-' . ++$counter])],
        ];

        DB::table('project_contents')->insert($project_content);
        DB::table('project_contents')->insert($project_content);
    }
}

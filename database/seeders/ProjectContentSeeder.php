<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::all();
        foreach ($projects as $project) {
            $project->project_contents()->createMany([
                ['type' => 'text', 'position' => 1, 'title' => ['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)], 'description' => ['ru' => Str::random(30), 'en' => Str::random(30), 'uz' => Str::random(30)], 'image' => null],
                ['type' => 'image-small', 'position' => 2, 'title' => null, 'description' => null, 'image' => ['/assets/uploads/projects/image-1.png']],
                ['type' => 'text', 'position' => 3, 'title' => ['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)], 'description' => ['ru' => Str::random(30), 'en' => Str::random(30), 'uz' => Str::random(30)], 'image' => null],
                ['type' => 'slide', 'position' => 4, 'title' => null, 'description' => null, 'image' => ['/assets/uploads/projects/image-1.png', '/assets/uploads/projects/image-1.png', '/assets/uploads/projects/image-1.png']],
                ['type' => 'text', 'position' => 5, 'title' => ['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)], 'description' => ['ru' => Str::random(30), 'en' => Str::random(30), 'uz' => Str::random(30)], 'image' => null],
                ['type' => 'image-big', 'position' => 6, 'title' => null, 'description' => null, 'image' => ['/assets/uploads/projects/image-1.png']],
            ]);
        }
    }
}

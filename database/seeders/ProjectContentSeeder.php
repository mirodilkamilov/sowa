<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectContentSeeder extends Seeder
{
    private int $counter = 0;

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
                ['type' => 'image_small', 'position' => 2, 'title' => null, 'description' => null, 'image' => ['assets/uploads/projects/image-' . ++$this->counter . '.png']],
                ['type' => 'text', 'position' => 3, 'title' => ['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)], 'description' => ['ru' => Str::random(30), 'en' => Str::random(30), 'uz' => Str::random(30)], 'image' => null],
                ['type' => 'slide', 'position' => 4, 'title' => null, 'description' => null, 'image' => ['assets/uploads/projects/image-' . ++$this->counter . '.png', 'assets/uploads/projects/image-' . ++$this->counter . '.png', 'assets/uploads/projects/image-' . ++$this->counter . '.png']],
                ['type' => 'text', 'position' => 5, 'title' => ['ru' => Str::random(15), 'en' => Str::random(15), 'uz' => Str::random(15)], 'description' => ['ru' => Str::random(30), 'en' => Str::random(30), 'uz' => Str::random(30)], 'image' => null],
                ['type' => 'image_big', 'position' => 6, 'title' => null, 'description' => null, 'image' => ['assets/uploads/projects/image-' . ++$this->counter . '.png']],
            ]);
        }
    }
}

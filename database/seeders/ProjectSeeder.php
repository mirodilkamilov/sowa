<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = Project::factory()->count(4)->create();

        // * category_project (pivot) table
        foreach ($projects as $project) {
            $project->categories()->attach(mt_rand(1, 4));
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ProjectContent;
use Illuminate\Database\Seeder;

class ProjectContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        ProjectContent::withoutEvents(function () {
            return ProjectContent::factory()->count(30)->create();
        });
    }
}

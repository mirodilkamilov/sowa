<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\AboutList;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::factory()
            ->has(AboutList::factory()->count(2))
            ->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategorySeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectContentSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(UserContactSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(CompanyDetailSeeder::class);
        $this->call(CompanyContactSeeder::class);
    }
}

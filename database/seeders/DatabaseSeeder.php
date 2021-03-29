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
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(ProjectContentSeeder::class);
        $this->call(SlideSeeder::class);
        $this->call(UserContactSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(CompanyContactSeeder::class);
    }
}

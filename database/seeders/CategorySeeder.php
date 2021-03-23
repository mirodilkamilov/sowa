<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['category' => ['ru' => 'Web (ru)', 'en' => 'Web (en)', 'uz' => 'Web (uz)']],
            ['category' => ['ru' => 'App (ru)', 'en' => 'App (en)', 'uz' => 'App (uz)']],
            ['category' => ['ru' => 'Design (ru)', 'en' => 'Design (en)', 'uz' => 'Design (uz)']],
            ['category' => ['ru' => 'Test (ru)', 'en' => 'Test (en)', 'uz' => 'Test (uz)']],
        ];
        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

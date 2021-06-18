<?php

namespace Database\Seeders;

use App\Models\CompanyContact;
use App\Models\SocialMedia;
use Illuminate\Database\Seeder;

class CompanyContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyContact::factory()
            ->has(SocialMedia::factory()->count(4))
            ->create();
    }
}

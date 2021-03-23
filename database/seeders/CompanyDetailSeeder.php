<?php

namespace Database\Seeders;

use App\Models\CompanyDetail;
use App\Models\CompanyList;
use Illuminate\Database\Seeder;

class CompanyDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyDetail::factory()
            ->has(CompanyList::factory()->count(2))
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\UserContact;
use Illuminate\Database\Seeder;

class UserContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserContact::factory()->count(10)->create();
    }
}

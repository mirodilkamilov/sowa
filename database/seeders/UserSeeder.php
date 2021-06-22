<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'name' => 'Mirodil',
            'email' => 'mirodil@gmail.com',
            'password' => Hash::make('Admin123'),
        ];

        User::create($user);
    }
}

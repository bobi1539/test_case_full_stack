<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\User;
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
        User::create([
            'name' => 'ucup surucup',
            'email' => 'ucup@gmail.com',
            'password'=> bcrypt('password')
        ]);
        Category::factory(15)->create();
    }
}

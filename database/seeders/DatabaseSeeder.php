<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Admin::factory(10)->create();
        \App\Models\Doctor::factory(10)->create();
        \App\Models\User::factory(10)->create();

        \App\Models\Admin::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password'=>'lol',
        ]);
    }
}

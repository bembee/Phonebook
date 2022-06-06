<?php

namespace Database\Seeders;

use App\Models\Email;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Phonebook::factory(8)
            ->has(\App\Models\Email::factory()->count(2))
            ->has(\App\Models\Phone::factory()->count(3))
            ->create();
    }
}

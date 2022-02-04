<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Songs;
use App\Models\Genre;

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
        Songs::factory(10)->create();
        Genre::factory()->create();
    }
}

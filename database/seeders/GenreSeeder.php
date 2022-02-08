<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->delete();

        $json = File::get("database/data/genres.json");
        $data = json_decode($json);

        foreach($data as $obj) {
            Genre::create(array(
                'name' => $obj->name
            ));
        }
    }
}

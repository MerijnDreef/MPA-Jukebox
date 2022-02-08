<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Songs;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('songs')->delete();

        $json = File::get("database/data/songs.json");
        $data = json_decode($json);

        foreach($data as $obj) {
            Songs::create(array(
                'genre_id' => $obj->genre_id,
                'name' => $obj->name,
                'artist_name' => $obj->artist,
                'duration' => $obj->length 
            ));
        }
    }
}

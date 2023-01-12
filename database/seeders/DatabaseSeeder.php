<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $comics_array = config('comics');



        foreach($comics_array as $comic){

            $new_comic = new Comic();
            $new_comic->title = $comic['title'];
            $new_comic->slug = Comic::generateSlug($new_comic->title);
            $new_comic->description = $comic['description'];
            $new_comic->thumb = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];
            dd('comics_array');
            // $new_comic->save();

        }

    }
}

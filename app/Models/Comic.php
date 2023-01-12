<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Comic extends Model
{
    use HasFactory;

    public static function generateSlug($string){

        $slug = Str::slug($string, '-');

        $original_slug = $slug;

        $c = 1;

        $slug_comic_exist = Comic::where('slug', $slug)->first();

        while($slug_comic_exist){
            $slug = $original_slug . '-' . $c;
            $slug_comic_exist = Comic::where('slug', $slug)->first();
            $c++;
        }

        return $slug;

    }
}

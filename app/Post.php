<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'the_excerpt',
        'the_content',
        'preview_image',
        'full_image',
        'slug',
    ];

    public static function saveImage($image_name, $image_path)
    {
        $path = public_path() . '/uploads/';

        File::exists($path) or File::makeDirectory($path, $mode = 0755, $recursive = false, $force = false);

        $image = Image::make($image_path);

        $image->save(
            $path . $image_name
        )->resize(
            200,
            200
        )->save(
            $path . 'thumbnail-' . $image_name
        );
    }
}

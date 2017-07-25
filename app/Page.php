<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class Page extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'template',
    ];

    public static function saveImage($image_name, $image_path)
    {
        $path = public_path() . '/uploads/';

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

<?php
/**
 * Presentation model
 *
 * @since  0.1.0
 * @author Jon Penny <jon@completecontrolc.o.uk>
 */

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;

class Presentation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'meta',
        'preview_image',
        'full_image',
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

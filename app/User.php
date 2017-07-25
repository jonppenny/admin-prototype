<?php
/**
 * User model
 *
 * @since  0.1.0
 * @author Jon Penny <jon@completecontrolc.o.uk>
 */

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Intervention\Image\ImageManagerStatic as Image;

class User extends Authenticatable
{

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'user_avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function saveImage($image_name, $image_path)
    {
        $path = public_path() . '/uploads/';

        $image = Image::make($image_path);

        $image->resize(200, 200)->save($path . $image_name);
    }

    /**
     *
     */
    public static function getUserRole()
    {
        return;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    protected $fillable = [
        'install_run',
        'website_name',
    ];
}

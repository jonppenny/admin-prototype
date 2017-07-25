<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuditLoginSuccess extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'audit_login_success';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'email',
        'ip_address'
    ];
}

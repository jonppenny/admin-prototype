<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Delete a user and all associated data from the database
     *
     * @param int $id The ID of the user to delete from the database
     * @return int
     */
    public static function deleteUserById(int $id) : int
    {
        return DB::delete('DELETE FROM users WHERE id = ' . $id);
    }

    /**
     * Get a user by ID
     *
     * @param int $id The ID of the user to query
     * @return array Result of the mysql query
     */
    public static function getUserById(int $id): array
    {
        return DB::select('SELECT * FROM users WHERE id = ' . $id);
    }

    /**
     * Get a list of all the users and user info.
     *
     * @return array Result of the mysql query
     */
    public static function getAllUsers(): array
    {
        return DB::select('SELECT * FROM users');
    }
}

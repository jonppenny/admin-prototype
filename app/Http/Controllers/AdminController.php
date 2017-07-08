<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        return view('admin.pages.dashboard');
    }

    public function users()
    {
        $users = $this->getAllUsers();

        //dd($users);

        return view('admin.pages.users', compact('users'));
    }

    public function usersAll()
    {
        $users = $this->getAllUsers();

        return view('admin.pages.users', ['users' => $users]);
    }

    public function usersAdd()
    {
        return view('admin.pages.users-add');
    }

    /**
     * Get a list of all the users and user info.
     * TODO refactor into a mysql class?
     *
     * @return array Result of the mysql query
     */
    protected function getAllUsers()
    {
        return DB::select('select * from users');
    }
}

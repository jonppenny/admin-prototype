<?php

namespace App\Http\Controllers;

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
        return view('admin.pages.users');
    }

    public function usersAll()
    {
        return view('admin.pages.users');
    }

    public function usersAdd()
    {
        return view('admin.pages.users-add');
    }
}

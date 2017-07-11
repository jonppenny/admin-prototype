<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * The Admin dashboard page.
     * TODO display any required info here
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('admin.pages.dashboard');
    }
}

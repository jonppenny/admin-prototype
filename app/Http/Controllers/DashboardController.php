<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * The Admin dashboard page.
     * TODO display any required info here
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.pages.dashboard');
    }
}

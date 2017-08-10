<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $home = \App\Settings::all();

        $page = \App\Page::find($home->ID);

        $template = ($page['template'])
            ? $page['template']
            : 'home';

        return view('site.pages.' . $template, compact(''));
    }
}

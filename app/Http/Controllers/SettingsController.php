<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{


    public function index()
    {
        $pages = \App\Page::all();
        //dd($pages);

        return view('admin.pages.settings', compact('pages'));
    }

    public function update(Request $request)
    {
        $settings = Settings::all();
        dd($settings);

        $settings_update = json_decode($settings);

        $settings_update[''] = $request->page;

        $settings->settings = json_encode($settings_update);

        return view('admin.pages.settings', compact('settings'));
    }
}

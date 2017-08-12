<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $pages = \App\Page::all();

        return view('admin.pages.settings', compact('pages'));
    }

    public function update(Request $request)
    {
        $pages = \App\Page::all();

        $settings = Settings::all();

        $settings_new = [
            'home_page' => $request->page
        ];

        if (empty($settings)) {
            dd('hfhfhfh');
            Settings::create([
                'settings' => json_encode($settings_new)
            ]);
            
            return redirect()->to('/admin/settings');
        }

        $settings_update = json_decode($settings);

        $settings_update[''] = $request->page;

        $settings->settings = json_encode($settings_update);

        return redirect()->to('/admin/settings');
    }
}

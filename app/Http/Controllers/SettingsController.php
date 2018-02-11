<?php

namespace App\Http\Controllers;

use App\Settings;
use App\Page;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.settings', compact('pages'));
    }

    public function update(Request $request)
    {
        $pages = Page::all();
    
        $settings_all = Settings::all();

        $settings_new = [
            'home_page' => $request->page
        ];

        if (!isset($settings_all)) {
            // jonfix: Not getting here! why not?
            dd($request);
            
            Settings::create([
                'settings' => json_encode($settings_new)
            ]);
            
            return redirect()->to('/admin');
        }

        /*$settings_update = json_decode($settings);

        $settings_update[''] = $request->page;

        $settings->settings = json_encode($settings_update);*/

        // jonfix: Set correct redirect when debug finished
        return redirect()->to('/admin/settings');
    }
}

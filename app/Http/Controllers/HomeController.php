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
        $template    = 'home';
        $the_content = '';
        
        $settings_all = \App\Settings::all();
        
        if (!isset($settings_all)) {
            dd($settings_all);
            
            $settings_decode = json_decode($settings_all);
            
            $settings = $settings_decode[0]->settings;
            
            $saved_settings = json_decode($settings);
            
            $page = \App\Page::find(
                $saved_settings->home_page
            )->getAttributes();
            
            $template = ($page['template']) ? $page['template'] : 'home';
            
            $the_content = json_decode($page['the_content']);
        }
        
        return view('site.pages.' . $template, compact('the_content'));
    }
}

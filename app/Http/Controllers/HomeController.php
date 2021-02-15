<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\View\View;

class HomeController extends Controller
{
    public $template;

    /**
     * Show the application dashboard.
     *
     * @return Factory|Application|Response|View
     */
    public function index()
    {
        /*$the_content = '';

        $settings_all = Settings::all();

        if (!isset($settings_all)) {
            $settings_decode = json_decode($settings_all);

            $settings = $settings_decode[0]->settings;

            $saved_settings = json_decode($settings);

            $page = \App\Page::find(
                $saved_settings->home_page
            )->getAttributes();

            $template = ($page['template']) ? $page['template'] : 'home';

            $the_content = json_decode($page['the_content']);
        }*/

        return view('site.pages.' . $this->template);
    }
}

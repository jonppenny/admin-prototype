<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use Illuminate\View\View;

class UrlController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param string $slug The slug (URL) of the page
     *
     * @return Factory|Application|Response|View
     */
    public function showPage(string $slug): view
    {
        $page = Page::where('slug', $slug)->firstOrFail()->getAttributes();

        $title       = $page['title'];
        $the_content = json_decode($page['the_content']);
        $template    = ($page['template']) ? $page['template'] : 'default';

        return view('site.pages.' . $template, compact('title', 'the_content'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     *
     * @return Factory|Application|Response|View
     */
    public function showPost(string $slug): view
    {
        $post = Post::where('slug', $slug)->first();

        return view('site.pages.post', compact('post'));
    }
}

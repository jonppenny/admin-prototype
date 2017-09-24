<?php

namespace App\Http\Controllers;

use App\Page;
use App\Post;

class UrlController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string $slug The slug (URL) of the page
     *
     * @return \Illuminate\Http\Response
     */
    public function showPage(string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail()->getAttributes();
        
        $title       = $page['title'];
        $the_content = json_decode($page['the_content']);
        $template    = ($page['template'])
            ? $page['template']
            : 'default';
        
        return view('site.pages.' . $template, compact('title', 'the_content'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  string $slug
     *
     * @return \Illuminate\Http\Response
     */
    public function showPost(string $slug)
    {
        $post = Post::where('slug', $slug)->first();
        
        return view('site.pages.post', compact('post'));
    }
}

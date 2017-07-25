<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Page;

class SiteController extends Controller
{
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('site.pages.default', compact('post'));
    }
}

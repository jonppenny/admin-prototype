<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\ImageManagerStatic as Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(20);

        return view('admin.pages.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.posts-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = 'default.png';

        if ($request->preview_image) {
            $file       = $request->preview_image;
            $image_name = $file->getClientOriginalName();
            $image_path = $file->getRealPath();

            Post::saveImage($image_name, $image_path);
        }

        Post::create([
            'title'         => $request->title,
            'slug'          => $request->slug,
            'the_content'   => json_encode($request->the_content),
            'the_excerpt'   => json_encode('a'),
            'preview_image' => 'thumbnail-' . $image_name,
            'full_image'    => $image_name,
        ]);

        return redirect()->to('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('site.pages.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $post          = Post::find($id);
        $id            = $post->id;
        $title         = $post->title;
        $the_content   = json_decode($post->the_content);
        $created_at    = $post->created_at;
        $updated_at    = $post->updated_at;
        $slug          = $post->slug;
        $preview_image = '';

        return view(
            'admin.pages.posts-edit',
            compact('id', 'title', 'the_content', 'created_at', 'updated_at', 'slug', 'preview_image')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     */
    public function update(Request $request, int $id)
    {
        $post        = Post::find($id);
        $post->title = $request->title;
        $post->slug  = $request->slug;

        $post->save();

        return redirect()->to('/admin/posts/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->to('/admin/posts');
    }
}

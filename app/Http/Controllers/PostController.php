<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Http\Response;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Factory|Application|Response|View
     */
    public function index(): view
    {
        $posts = Post::paginate(20);

        return view('admin.pages.posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Application|Response|View
     */
    public function create(): view
    {
        return view('admin.pages.posts-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
     * @param string $slug
     *
     * @return Factory|Application|Response|View
     */
    public function show(string $slug): view
    {
        $post = Post::where('slug', $slug)->first();

        return view('site.pages.post', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return Factory|Application|Response|View
     */
    public function edit(int $id): view
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
            compact(
                'id',
                'title',
                'the_content',
                'created_at',
                'updated_at',
                'slug',
                'preview_image'
            )
        );
    }

    /**
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $post        = Post::find($id);
        $post->title = $request->title;
        $post->slug  = $request->slug;

        $post->save();

        return redirect()->to('/admin/posts/all');
    }

    /**
     * @param int $id
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(int $id): RedirectResponse
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->to('/admin/posts');
    }
}

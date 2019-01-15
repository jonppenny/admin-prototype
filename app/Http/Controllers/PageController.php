<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::paginate(20);

        return view('admin.pages.pages', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $templates = get_files(resource_path('views/site/pages'));

        return view('admin.pages.pages-add', compact('templates'));
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
        Page::create([
            'title'       => $request->title,
            'slug'        => $request->slug,
            'template'    => $request->template,
            'the_content' => json_encode($request->the_content),
        ]);

        return redirect()->to('/admin/pages');
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug The slug (URL) of the page
     *
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail()->getAttributes();

        $title       = $page['title'];
        $the_content = json_decode($page['the_content']);
        $template    = ($page['template']) ? $page['template'] : 'default';

        return view('site.pages.' . $template, compact('title', 'the_content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Page $page
     *
     */
    public function edit(int $id)
    {
        $page = Page::find($id);

        $id              = $page->id;
        $title           = $page->title;
        $slug            = $page->slug;
        $active_template = $page->template;
        $the_content     = json_decode($page->the_content);

        $templates = get_files(resource_path('views/site/pages'));

        return view(
            'admin.pages.pages-edit',
            compact(
                'id',
                'title',
                'slug',
                'active_template',
                'templates',
                'the_content'
            )
        );
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $page = Page::find($id);

        $page->title       = $request->title;
        $page->slug        = $request->slug;
        $page->template    = $request->template;
        $page->the_content = json_encode($request->the_content);

        $page->save();

        return redirect()->to('/admin/pages/' . $id . '/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Page $page
     *
     */
    public function destroy(int $id)
    {
        $page = Page::find($id);

        $page->delete();

        return redirect()->to('/admin/pages');
    }
}

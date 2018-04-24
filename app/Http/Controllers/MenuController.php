<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Http\Request;

class MenuController extends Controller
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
        $menus = Menu::paginate(20);

        return view('admin.pages.menus', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = Page::all();

        return view('admin.pages.menus-add', compact('pages'));
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
        Menu::create([
            'name'     => ($request->name) ? $request->name : '',
            'page_ids' => ($request->page_ids) ? json_encode($request->page_ids) : ''
        ]);

        return redirect()->to('/admin/menus');
    }

    /**
     * Display the specified resource.
     *
     * @param int        $id   Menu ID
     * @param string     $name Menu name
     * @param  \App\Menu $menu
     *
     * @return void
     */
    public function show(Menu $menu, int $id = 0, string $name = '')
    {
        // TODO: display the menu based on arguments

        $menu = [];

        if (isset($id) && $id > 0) {
            $menu = Menu::find($id);
        } else if (isset($name)) {
            $menu = Menu::find($name);
        }
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $menu = Menu::find($id);

        $pages = Page::all();

        $id       = $menu->id;
        $name     = $menu->name;
        $page_ids = $menu->page_ids;

        return view(
            'admin.pages.menus-edit',
            compact('id', 'name', 'page_ids')
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param int                       $id
     *
     * @return \Illuminate\Http\Response
     * @internal param Menu $menu
     *
     */
    public function update(Request $request, int $id)
    {
        //dd($request);

        $menu = Menu::find($id);

        if ($request->name) {
            $menu->name = $request->name;
        }

        if ($request->page_ids) {
            $menu->page_ids = json_encode($request->page_ids);
        }

        $menu->save();

        return redirect()->to('/admin/menus/' . $id . '/edit');
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
        $menu = Menu::find($id);

        $menu->delete();

        return redirect()->to('/admin/menus');
    }
}

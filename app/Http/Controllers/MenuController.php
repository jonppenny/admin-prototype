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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu $menu
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $menu = Menu::find($id);

        $id   = $menu->id;
        $name = $menu->name;

        return view(
            'admin.pages.menus-edit',
            compact('id', 'name')
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
        $menu = Menu::find($id);

        if ($request->name) {
            $menu->name = $request->name;
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

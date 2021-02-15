<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Page;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

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
     * @return Factory|Application|Response|View
     */
    public function index(): view
    {
        $menus = Menu::paginate(20);

        return view('admin.pages.menus', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Application|Response|View
     */
    public function create(): view
    {
        $pages = Page::all();

        return view('admin.pages.menus-add', compact('pages'));
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
        Menu::create([
            'name'     => ($request->name) ? $request->name : '',
            'page_ids' => ($request->page_ids) ? json_encode($request->page_ids) : ''
        ]);

        return redirect()->to('/admin/menus');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id Menu ID
     * @param string $name Menu name
     * @param Menu $menu
     *
     * @return void
     */
    public function show(Menu $menu, int $id = 0, string $name = '')
    {
        // TODO: display the menu based on arguments

        $menu = [];

        if (isset($id) && $id > 0) {
            $menu = Menu::find($id);
        } else {
            if (isset($name)) {
                $menu = Menu::find($name);
            }
        }
    }

    /**
     * @param int $id
     *
     * @return Factory|View
     */
    public function edit(int $id): view
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
     * @param Request $request
     * @param int $id
     *
     * @return RedirectResponse
     * @internal param Menu $menu
     *
     */
    public function update(Request $request, int $id): RedirectResponse
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
     * @param int $id
     *
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        $menu = Menu::find($id);

        $menu->delete();

        return redirect()->to('/admin/menus');
    }
}

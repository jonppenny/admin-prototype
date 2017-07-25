<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Organisation;

class OrganisationController extends Controller
{
    /**
     * [__construct description]
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * The Admin dashboard page.
     * TODO display any required info here
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $organisations = Organisation::paginate(20);

        return view('admin.pages.organisations', compact('organisations'));
    }

    /**
     * Add A organisation
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.organisations-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Organisation::create([
            'name'        => $request->name
        ]);

        return redirect()->to('/admin/organisations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $organisation = Organisation::find($id);

        $id          = $organisation->id;
        $name        = $organisation->name;

        return view('admin.pages.organisations-edit', compact('id', 'name'));
    }

    /**
     * JON Need to cleanup this method
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     * @return \Illuminate\Http\Response
     */
    public function update($request, $id)
    {
        return redirect()->to('/admin/organisations');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        return redirect()->to('/admin/organisations');
    }
}

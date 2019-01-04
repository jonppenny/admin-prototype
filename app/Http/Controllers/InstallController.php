<?php

namespace App\Http\Controllers;

use App\Install;
use App\Settings;
use App\User;
use Illuminate\Http\Request;
use function redirect;
use function view;

class InstallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('install.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Settings::create([
            'install_run'  => 1,
            'website_name' => $request->website_name
        ]);

        User::create([
            'name'        => $request->admin_username,
            'email'       => $request->email,
            'password'    => bcrypt($request->password),
            'role'        => ($request->role) ? $request->role : 'admin',
            'user_avatar' => "",
        ]);

        return redirect()->to('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Install $install
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Install $install)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Install $install
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Install $install)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Install             $install
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Install $install)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Install $install
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Install $install)
    {
        //
    }
}

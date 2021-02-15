<?php

namespace App\Http\Controllers;

use Artisan;
use App\Install;
use App\Settings;
use App\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

use Illuminate\Http\Response;

use Illuminate\View\View;

use function redirect;
use function view;

class InstallController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        Artisan::call('migrate', array('--path' => 'app/migrations', '--force' => true));

        return view('install.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     *
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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
     * @param Install $install
     *
     * @return Response
     */
    public function show(Install $install): Response
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Install $install
     *
     * @return Response
     */
    public function edit(Install $install): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Install $install
     *
     * @return Response
     */
    public function update(Request $request, Install $install): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Install $install
     *
     * @return Response
     */
    public function destroy(Install $install): Response
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\User;
use Google2FA;
use Auth;

class UserController extends Controller
{

    /**
     * [__construct description]
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * The Admin dashboard page.
     * TODO display any required info here
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::paginate(20);

        return view('admin.pages.users', compact('users'));
    }

    /**
     * Add A user
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.pages.users-add');
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
        $image_name = '';

        if ($request->avatar_image) {
            $file       = $request->avatar_image;
            $image_name = $file->getClientOriginalName();
            $image_path = $file->getRealPath();

            User::saveImage($image_name, $image_path);
        }

        User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => bcrypt($request->password),
            'role'        => ($request->role) ? $request->role : 'user',
            'user_avatar' => $image_name,
        ]);

        return redirect()->to('/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = User::find(Auth::user()->id);

        $id               = $user->id;
        $name             = $user->name;
        $email            = $user->email;
        $user_avatar      = $user->user_avatar;
        $role             = $user->role;
        $google2fa_secret = $user->google2fa_secret;

        return view(
            'site.pages.my-profile',
            compact(
                'id',
                'name',
                'email',
                'user_avatar',
                'role',
                'google2fa_secret'
            )
        );
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(int $id)
    {
        $user = User::find($id);

        $id               = $user->id;
        $name             = $user->name;
        $email            = $user->email;
        $user_avatar      = $user->user_avatar;
        $role             = $user->role;
        $google2fa_secret = $user->google2fa_secret;

        return view(
            'admin.pages.users-edit',
            compact(
                'id',
                'name',
                'email',
                'user_avatar',
                'role',
                'google2fa_secret'
            )
        );
    }

    /**
     * CLEANUP: Tidy up the handling of how fields are checked
     * jonfix: Why has this broken? Need to fix
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $user = User::find($id);

        if ($request->avatar_image) {
            $file       = $request->avatar_image;
            $image_name = $file->getClientOriginalName();
            $image_path = $file->getRealPath();

            User::saveImage($image_name, $image_path);

            $user->user_avatar = $image_name;
        } else {
            $user->user_avatar = '';
        }

        if ($request->name) {
            $user->name = $request->name;
        }

        if ($request->email) {
            $user->email = $request->email;
        }

        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        if ($request->role) {
            $user->role = $request->role;
        }

        $user->save();

        return redirect()->to('/admin/users/' . $id . '/edit');
    }

    /**
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->to('/admin/users');
    }
}

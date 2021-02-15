<?php

namespace App\Http\Controllers\Auth;

use Cache;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\ValidateSecretRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * @param Request $request
     * @param         $user
     * @return RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        /*if ($user->role === 'user') {
            return redirect()->to('/');
        }*/

        if ($user->google2fa_secret) {
            Auth::logout();

            $request->session()->put('2fa:user:id', $user->id);

            return redirect('2fa/validate');
        }

        return redirect()->to('/admin');
    }

    /**
     *
     * @return Factory|Application|Response|View
     */
    public function getValidateToken()
    {
        if (session('2fa:user:id')) {
            return view('2fa/validate');
        }

        return redirect('login');
    }

    /**
     * @param ValidateSecretRequest $request
     *
     * @return RedirectResponse
     */
    public function postValidateToken(ValidateSecretRequest $request): RedirectResponse
    {
        $userId = $request->session()->pull('2fa:user:id');
        $key    = $userId . ':' . $request->totp;

        Cache::add($key, true, 4);

        Auth::loginUsingId($userId);

        return redirect()->to('/');
    }

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

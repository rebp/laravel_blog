<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {

        if ( $user->isAdmin() &&  $user->isActive() ) {

            return redirect('/admin');

        } else if ( $user->isAuthor() && $user->isActive() ) {

            return redirect('/author');

        } else if ( $user->isSubscriber() && $user->isActive() ) {

            return redirect('/subscriber');

        } else {

            auth()->logout();
            Session::flash('account_activation', 'Your account is not activated.'); 
            return redirect('/');
        }  

    }

}

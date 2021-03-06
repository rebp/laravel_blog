<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        if(Auth::check()) {
            if(Auth::user()->role->name == 'administrator') {
                return $next($request);
            }
        }

        if ( Auth::user()->isAuthor() ) {
            return redirect('/author');
        } else if ( Auth::user()->isSubscriber() ) {
            return redirect('/subscriber');
        } else {
            return redirect('/');
        }  
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Author
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
            if(Auth::user()->role->name == 'author') {
                return $next($request);
            }
        }

        if ( Auth::user()->isAdmin() ) {
            return redirect('/admin');
        } else if ( Auth::user()->isSubscriber() ) {
            return redirect('/subscriber');
        } else {
            return redirect('/');
        }    

    }
}

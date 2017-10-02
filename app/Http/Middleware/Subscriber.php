<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class Subscriber
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
            if(Auth::user()->role->name == 'subscriber') {
                return $next($request);
            }
        }

        if ( Auth::user()->isAuthor() ) {
            return redirect('/author');
        } else if ( Auth::user()->isAdmin() ) {
            return redirect('/administrator');
        } else {
            return redirect('/');
        }  
    }
}

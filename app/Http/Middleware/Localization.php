<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Illuminate\Http\Request;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure $next
     * @return
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->has('locale')){
            App::setLocale(session()->get('locale'));
        }
        return $next($request);
    }
}

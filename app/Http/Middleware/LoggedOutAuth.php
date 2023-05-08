<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoggedOutAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    

    public function handle($request, Closure $next ,$guard = null)
    {
        $url = 'http://127.0.0.1:8000';
        if (Auth::guard($guard)->guest()) {

            if ($request->ajax() || $request->wantsJson()) {
            return response('Unauthorized.', 401);
            } elseif(!($url."/login")) {
                return redirect('login'); // ←修正
            }else{
                
            }
        }
           
        return $next($request);
		
    }
}

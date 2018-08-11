<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        if(auth()->user()->id==1){
            return $next($request);
        } else{
            $msg = 'middleware checks your id equals to 1 or not, if yes redirect to anther test admin_page..';
            return redirect('home')->with('message',$msg);
        }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Studentcheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('ACCOUNT_LOGIN')){

        }else{
            $request->session()->flash('errorr','Access Denied');
            return redirect('admin');
        }
        return $next($request);
      
    }
}

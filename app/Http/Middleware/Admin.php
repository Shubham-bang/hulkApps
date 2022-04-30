<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        
        if($request->user()->role=='HR'){
            return $next($request);
        }
        else{
            request()->session()->flash('error','You do not have any permission to access this page');
            Auth::logout();
            return redirect()->route('login')->with('message', 'You do not have any permission to access this page');;
        }
    }
}

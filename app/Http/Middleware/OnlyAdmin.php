<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class OnlyAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //untuk memberi tahu apa yang dilakukan middleware ketika bukan admin yang login
        if(auth()->user()->role_id != 1){
        return redirect('/');
      }
      //untuk memberi tahu apa yang dilakukan midlleware ketika admin yang login
      return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Role
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
        // si no está identificado no le dejamos acceder
        if(!auth()->check())
            return redirect('login');

        
        //Obtenemos el usuario autenticado
        $user = auth()->user();
        if($user->rol_id === 1 )
        {
            return $next($request);
        }

        return redirect('login');
    }
}

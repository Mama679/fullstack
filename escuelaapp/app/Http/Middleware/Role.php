<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            return response()->json([
                "status" => 0,
                "mensaje" =>"No esta Autenticado."
            ],Response::HTTP_FORBIDDEN);

        
        //Obtenemos el usuario autenticado
        $user = auth()->user();
        if($user->rol_id === 1 )
        {
            return $next($request);
        }

        return response()->json([
            "status" => 0,
            "mensaje" =>"No tiene perfil Administrador."
        ],Response::HTTP_FORBIDDEN);
    }
}

<?php

namespace App\Http\Middleware;
use Laracasts\Flash\Flash;
use Closure;

class Administrador
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
        if ($request->user()->id_rol != 1) {
        if ($request->ajax() || $request->wantsJson()) {
            return response('No Autorizado.', 401);
        }
        return redirect()->guest('login');
    }

    return $next($request);
}
}

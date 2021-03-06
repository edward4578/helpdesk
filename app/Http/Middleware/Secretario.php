<?php

namespace App\Http\Middleware;

use Closure;

class Secretario
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
        if ($request->user()->rol_id != 4) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('No Autorizado.', 401);
            }
            return redirect()->guest('login');
        }

        return $next($request);
    }
}

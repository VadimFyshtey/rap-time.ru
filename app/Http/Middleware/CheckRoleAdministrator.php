<?php

namespace App\Http\Middleware;

use Closure;

class CheckRoleAdministrator
{
    const ROLE_ID = 3;

    public function handle($request, Closure $next)
    {
        if($request->user() === null || $request->user()->role_id === self::ROLE_ID) {
            return response("Недостаточно прав", 401);
        }

        return $next($request);
    }
}

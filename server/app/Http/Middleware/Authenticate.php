<?php

namespace App\Http\Middleware;

use Closure;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        $bearer = json_decode(file_get_contents('../../../auth.di'), 1);
        
        if ($request->bearerToken() === null || ! isset($bearer[$request->bearerToken()]))
            return response('Unauthorized.', 401);

        return $next($request);
    }
}

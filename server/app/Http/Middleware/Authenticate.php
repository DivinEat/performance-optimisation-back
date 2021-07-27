<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

abstract class Authenticate
{
    protected function getRole(Request $request): ?string
    {
        $path = dirname(dirname(dirname(__DIR__))) . '/auth.di';
        $bearer = json_decode(file_get_contents($path), 1);

        if ($request->bearerToken() === null || ! isset($bearer[$request->bearerToken()]))
            return null;

        return $bearer[$request->bearerToken()];
    }
}

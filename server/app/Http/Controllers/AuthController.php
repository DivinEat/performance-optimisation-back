<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function auth(Request $request): JsonResponse
    {
        $auth = explode(":",base64_decode(substr($request->header('authorization'), 6)));

        if (count($auth) !== 2)
            abort(401);

        $bearer = $this->getBearer($auth[0], $auth[1]);

        if ($bearer === null)
            abort(405);

        return response()->json($bearer);
    }

    protected function getBearer(string $username, string $password): ?string
    {
        $credentials = [
            'administrateur' => 'SuperCoco345',
            'consultant' => 'AneTroto{56'
        ];

        if (! isset($credentials[$username]) || $credentials[$username] != $password)
            return null;

        $bearer = Str::random();
        $path = dirname(dirname(dirname(__DIR__))) . '/auth.di';
        $array = json_decode(file_get_contents($path), 1) ?: [];
        $array[$bearer] = $username;

        file_put_contents($path, json_encode($array));

        return $bearer;
    }
}

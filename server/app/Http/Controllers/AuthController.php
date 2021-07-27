<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function auth(Request $request): JsonResponse
    {
        $validated = $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $bearer = $this->getBearer($validated['username'], $validated['password']);

        if ($bearer === null)
            abort(405);

        return $bearer;
    }

    protected function getBearer(string $username, string $password): ?string
    {
        $credentials = [
            'administrateur' => 'SuperCoco345',
            'consultant' => 'AneTroto{56'
        ];

        if (! isset($credentials[$username]) || $credentials[$username] != $password)
            return null;

        $bearer = \OAuthProvider::generateToken(12);

        file_put_contents('../../../auth.di', json_encode([$bearer => $username]), FILE_APPEND);

        return $bearer;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\UnauthorizedException;

class Controller extends \Laravel\Lumen\Routing\Controller
{
    public function getAuthUser(): User
    {
        $authUser = auth()->user();

        $user = ($authUser instanceof User) ? $authUser : User::find($authUser->getAuthIdentifier());

        if (is_null($user)) {
            throw new UnauthorizedException();
        }

        return $user;
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UsersController extends Controller
{
    public function getAvailableChannels(Request $request): JsonResponse
    {
        return new JsonResponse(
            $this->getAuthUser()->channels->toArray(),
            Response::HTTP_OK
        );
    }
}

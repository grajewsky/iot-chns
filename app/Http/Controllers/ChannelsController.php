<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Channel;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ChannelsController extends Controller
{
    /**
     * @param Request $request
     * @param string $name
     * @return JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function notify(Request $request, string $name): JsonResponse
    {
        $this->validate($request, [
            "data" => "required",
            "type" => ["required", "in:json,plain"]
        ]);

        $channel = Channel::findOrFail($name);
        $notify = new Notification();
        $notify->user()->associate($this->getAuthUser());
        $notify->channel()->associate($channel);
        $notify->data = $request->get("data");
        $notify->type = $request->get("type");

        return new JsonResponse($notify->toArray(), Response::HTTP_CREATED);
    }
}

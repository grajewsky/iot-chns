<?php

declare(strict_types=1);

namespace App\Console\Commands\Notify;

use App\Models\Channel;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NotificationMessage extends Command
{
    protected $signature = "notification:message {channel} {type} {data}";

    protected $description = "Tworzenie nowej notyfikacji";

    public function handle()
    {
        try {
            $channelName = $this->argument("channel");
            $notificationType = $this->argument("type");
            $data = $this->argument("data");
            $userName = "root";

            $channel = Channel::query()->where('name', 'LIKE', $channelName)->firstOrFail();
            $user = User::query()->where('name', 'LIKE', $userName)->firstOrFail();

            $notification = new Notification();
            $notification->type = $notificationType;
            $notification->data = $data;
            $notification->channel()->associate($channel);
            $notification->user()->associate($user);

            $notification->save();

            $this->info("Notification added.");

        } catch (ModelNotFoundException $exception) {
            $this->error($exception->getMessage());
            return 1;
        }
    }
}

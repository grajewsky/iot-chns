<?php

declare(strict_types=1);

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class UsersChannelsCommand extends Command
{
    protected $signature = "users:channels {user}";

    protected $description = "Show users channels";

    public function handle()
    {
        $userName = $this->argument("user");
        if (empty($user)) {
            $user = User::query()->where(['name' => $userName])->firstOrFail();
            $channels = $user->channels;
            foreach ($channels as $channel) {
                    $this->line("- " .$channel->name);
                    $this->newLine(1);
            }
        }

        return 0;
    }
}

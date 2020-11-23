<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Http\Controllers\ChannelsController;
use App\Models\Channel;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UsersAttachChannelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:attach-channel {userName} {channelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Attach user to channel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $userName = $this->argument("userName");
        $channelName = $this->argument("channelName");

        if (empty($userName) || empty($channelName)) {
            $this->error("Invalids arguments.");
            return 1;
        }
        try {
            $user = User::query()->where(['name'=> $userName])->firstOrFail();
            $channel = Channel::query()->where(["name" => $channelName])->firstOrFail();
            $user->channels()->syncWithoutDetaching([$channel->id]);
            $user->save();
        } catch (ModelNotFoundException $exception) {
            $this->error("User or channel not found");
            return 1;
        }

        $this->info("User `{$userName}` attached to channel `{$channelName}`.");

        return 0;
    }
}

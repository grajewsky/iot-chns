<?php

declare(strict_types=1);

namespace App\Console\Commands\Channels;

use App\Http\Controllers\ChannelsController;
use App\Models\Channel;
use Illuminate\Console\Command;

class ChannelsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'channels:create {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create channel';

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
        $name = $this->argument("name");
        if (empty($name)) {
            $this->error("Name is required.");
            return 1;
        }
        $channel = new Channel();
        $channel->name = $this->argument("name");
        $channel->save();

        $this->info("Channel {$name} created!");

        return 0;
    }
}

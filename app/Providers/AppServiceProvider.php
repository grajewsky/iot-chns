<?php

namespace App\Providers;

use App\Console\Commands\Channels\ChannelsCommand;
use App\Console\Commands\Channels\ChannelsListCommand;
use App\Console\Commands\Users\UsersAttachChannelsCommand;
use App\Console\Commands\Users\UsersChannelsCommand;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            ChannelsCommand::class,
            ChannelsListCommand::class,
            UsersAttachChannelsCommand::class,
            UsersChannelsCommand::class,
        ]);
    }
}

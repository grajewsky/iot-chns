<?php

namespace App\Providers;

use App\Console\Commands\Channels\ChannelsCreateCommand;
use App\Console\Commands\Channels\ChannelsListCommand;
use App\Console\Commands\Users\CreateUserCommand;
use App\Console\Commands\Users\UsersAttachChannelsCommand;
use App\Console\Commands\Users\UsersChannelsCommand;
use App\Console\Commands\Users\UsersListCommand;
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
            ChannelsCreateCommand::class,
            ChannelsListCommand::class,
            UsersAttachChannelsCommand::class,
            UsersChannelsCommand::class,
            UsersListCommand::class,
            CreateUserCommand::class,
        ]);
    }
}

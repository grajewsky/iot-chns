<?php

namespace App\Providers;

use App\Console\Commands\ChannelsCommand;
use App\Console\Commands\UsersAttachChannelsCommand;
use App\Console\Commands\UsersChannelsCommand;
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
            UsersAttachChannelsCommand::class,
            UsersChannelsCommand::class,
        ]);
    }
}

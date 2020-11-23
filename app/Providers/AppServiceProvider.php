<?php

namespace App\Providers;

use App\Console\Commands\ChannelsCommand;
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
        $this->commands([ChannelsCommand::class]);
    }
}

<?php

declare(strict_types=1);

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class UsersListCommand extends Command
{
    protected $signature = "users:list";

    protected $description = "Show all users";

    public function handle()
    {
        $headers = ['Name', 'Email'];

        $users = User::all(['name', 'email']);

        $this->table($headers, $users);
    }
}

<?php

declare(strict_types=1);

namespace App\Console\Commands\Users;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
{
    protected $signature = "users:create {name} {email}";

    protected $description = "Show all users";

    public function handle()
    {
        $name = $this->argument("name");
        $email = $this->argument("email");
        $token = User::generateToken();

        $user = new User();
        $user->token = $token;
        $user->name = $name;
        $user->email = $email;

        $user->save();
        $this->info("User {$email} created. Save your token `{$token}`");
        return 0;
    }
}

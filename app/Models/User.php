<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laravel\Lumen\Auth\Authorizable;

/**
 * Class User
 * @package App\Models
 * @property string $name
 * @property string $email
 * @property string $token
 * @property Collection<Channel> $channels
 */
class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'token'
    ];

    public function channels(): BelongsToMany
    {
        return $this->belongsToMany(
            Channel::class,
            "users_channels",
            "user_id",
            "channel_id"
        );
    }

    public static function generateToken(): string
    {
        return Str::random(16);
    }
}

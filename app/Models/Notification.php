<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Notification
 * @package App\Models
 * @property string $data
 * @property string $type
 * @property User $user
 * @property Channel $channel
 */
class Notification extends Model
{
    use HasTimestamps;
    use SoftDeletes;

    protected $fillable = ["id", "data", "type"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class, "channel_id");

    }

}

<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Channel
 * @package App\Models
 *
 * @property int $id
 * @property string $name
 */
class Channel extends Model
{
    protected $fillable = ["id", "name"];

}

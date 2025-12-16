<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @property User $user
 */
class Score extends Model
{

       protected $fillable = [
        'user_id',
        'score',
        'category',
        'difficulty',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusComment extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'body',
        'idea_id',
        'status_id',
        'user_id',
    ];
}

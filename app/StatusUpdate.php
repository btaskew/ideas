<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusUpdate extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'comment',
        'idea_id',
        'status_id',
        'user_id',
    ];
}

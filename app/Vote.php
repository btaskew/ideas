<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['idea_id', 'user_id'];
}

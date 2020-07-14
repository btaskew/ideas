<?php

namespace App;

use App\Notifications\VoteRecorded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vote extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = ['idea_id', 'user_id'];

    protected static function boot()
    {
        parent::boot();

        static::created(function (Vote $vote) {
            $vote->idea->creator->notify(new VoteRecorded($vote->idea));
        });
    }

    /**
     * @return BelongsTo
     */
    public function idea(): BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }
}

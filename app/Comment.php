<?php

namespace App;

use App\Notifications\NewComment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'body',
        'user_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function (Comment $comment) {
            $comment->idea->creator->notify(new NewComment($comment->idea));
        });
    }

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function idea(): BelongsTo
    {
        return $this->belongsTo(Idea::class);
    }
}

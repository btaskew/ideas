<?php

namespace App;

use App\Notifications\StatusUpdated;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Idea extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'status_id',
    ];

    /**
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function votes(): HasMany
    {
        return $this->hasMany(Vote::class);
    }

    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return BelongsTo
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }

    /**
     * @return HasMany
     */
    public function statusUpdates(): HasMany
    {
        return $this->hasMany(StatusUpdate::class);
    }

    /**
     * @param int    $statusId
     * @param string $comment
     */
    public function updateStatus(int $statusId, string $comment): void
    {
        $newStatus = Status::findOrFail($statusId);

        $this->status()->associate($newStatus)->save();

        $this->statusUpdates()->create([
            'comment' => $comment,
            'status_id' => $statusId,
            'user_id' => auth()->id(),
        ]);

        $this->creator->notify(new StatusUpdated($this, $newStatus));
    }

    /**
     * @return Collection
     */
    public function getAllComments(): Collection
    {
        return $this->comments->concat($this->statusUpdates)->sortByDesc('created_at');
    }
}

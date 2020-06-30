<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string
     */
    public function getDisplayNameAttribute(): string
    {
        if ($this->id === auth()->id()) {
            return 'you';
        }

        if ($this->isAdmin()) {
            return $this->name . ' (admin)';
        }

        return $this->name;
    }

    /**
     * @return HasMany
     */
    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class);
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }
}

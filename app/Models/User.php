<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'email_verified_at',
        'password',
        'owns',
        'follows',
        'deleted',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'owns' => 'boolean',
        'follows' => 'boolean',
        'deleted' => 'boolean',
    ];

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function reviewVotes()
    {
        return $this->hasMany(ReviewVoteOrSignalment::class);
    }

    public function followedShops()
    {
        return $this->belongsToMany(Shop::class, 'shop_followers')
            ->withTimestamps()
            ->withPivot('reason', 'deleted')
            ->wherePivot('deleted', 0);
    }
}
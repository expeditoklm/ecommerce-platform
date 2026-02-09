<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'owns',
        'follows',
        'deleted',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviewVoteOrSignalments()
    {
        return $this->hasMany(ReviewVoteOrSignalment::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function shopFollowers()
    {
        return $this->hasMany(ShopFollower::class);
    }

    public function shops()
    {
        return $this->hasMany(Shop::class);
    }
}
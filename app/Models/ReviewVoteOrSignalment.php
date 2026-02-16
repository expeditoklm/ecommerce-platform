<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $review_id
 * @property integer $user_id
 * @property string $reason
 * @property string $type
 * @property string $status
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Review $review
 * @property User $user
 */
class ReviewVoteOrSignalment extends Model
{
    use HasUuid;

    protected $table = 'review_vote_or_signalment';

    protected $fillable = [
        'uuid',
        'review_id',
        'user_id',
        'reason',
        'type',
        'status',
        'deleted',
    ];

    protected $casts = ['deleted' => 'boolean'];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
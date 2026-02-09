<?php

namespace App\Models;

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
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'review_vote_or_signalment';

    /**
     * @var array
     */
    protected $fillable = ['review_id', 'user_id', 'reason', 'type', 'status', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function review()
    {
        return $this->belongsTo('App\Models\Review');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

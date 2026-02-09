<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property integer $user_id
 * @property string $title
 * @property integer $rating
 * @property string $comment
 * @property string $end_date
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property ReviewImage[] $reviewImages
 * @property ReviewVoteOrSignalment[] $reviewVoteOrSignalments
 * @property Product $product
 * @property User $user
 */
class Review extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['product_id', 'user_id', 'title', 'rating', 'comment', 'end_date', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviewImages()
    {
        return $this->hasMany('App\Models\ReviewImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviewVoteOrSignalments()
    {
        return $this->hasMany('App\Models\ReviewVoteOrSignalment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

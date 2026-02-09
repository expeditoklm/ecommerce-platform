<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $review_id
 * @property string $url
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Review $review
 */
class ReviewImage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['review_id', 'url', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function review()
    {
        return $this->belongsTo('App\Models\Review');
    }
}

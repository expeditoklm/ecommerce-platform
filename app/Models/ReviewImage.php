<?php

namespace App\Models;

use App\Traits\HasUuid;
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
    use HasUuid;

    protected $fillable = ['uuid', 'review_id', 'url', 'deleted'];
    protected $casts = ['deleted' => 'boolean'];

    public function review()
    {
        return $this->belongsTo(Review::class);
    }
}
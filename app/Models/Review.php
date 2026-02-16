<?php

namespace App\Models;

use App\Traits\HasUuid;
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
    use HasUuid;

    protected $fillable = [
        'uuid',
        'title',
        'rating',
        'comment',
        'end_date',
        'product_id',
        'user_id',
        'deleted',
    ];

    protected $casts = [
        'deleted' => 'boolean',
        'end_date' => 'date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(ReviewImage::class);
    }

    public function votes()
    {
        return $this->hasMany(ReviewVoteOrSignalment::class);
    }
}

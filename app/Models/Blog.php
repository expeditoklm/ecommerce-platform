<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $shop_id
 * @property integer $category_id
 * @property string $slug_url
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $publication_date
 * @property string $reading_time
 * @property boolean $is_published
 * @property integer $views_count
 * @property integer $shares_count
 * @property string $quote
 * @property string $quote_author
 * @property string $product_features
 * @property string $product_status
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property BlogImage[] $blogImages
 * @property Category $category
 * @property Shop $shop
 */
// Exemple pour Blog Model
class Blog extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'shop_id',
        'category_id',
        'slug_url',
        'title',
        'description',
        'content',
        'publication_date',
        'reading_time',
        'is_published',
        'views_count',
        'shares_count',
        'quote',
        'quote_author',
        'product_features',
        'product_status',
        'deleted',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'deleted' => 'boolean',
        'publication_date' => 'date',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->hasMany(BlogImage::class);
    }
}
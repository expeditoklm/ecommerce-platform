<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $shop_id
 * @property integer $type_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $file_url
 * @property float $price
 * @property integer $stock
 * @property boolean $is_on_sale
 * @property float $sale_price
 * @property string $sale_end_date
 * @property integer $popularity_score
 * @property integer $carousel_priority
 * @property boolean $auto_display
 * @property boolean $manual_display
 * @property string $target_segment
 * @property float $exclusive_discount
 * @property boolean $deleted
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property Order[] $orders
 * @property ProductImage[] $productImages
 * @property Shop $shop
 * @property Type $type
 * @property Review[] $reviews
 */
class Product extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'shop_id',
        'type_id',
        'name',
        'slug',
        'description',
        'file_url',
        'price',
        'stock',
        'is_on_sale',
        'sale_price',
        'sale_end_date',
        'popularity_score',
        'carousel_priority',
        'auto_display',
        'manual_display',
        'target_segment',
        'exclusive_discount',
        'deleted',
        'status',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'exclusive_discount' => 'decimal:2',
        'is_on_sale' => 'boolean',
        'auto_display' => 'boolean',
        'manual_display' => 'boolean',
        'deleted' => 'boolean',
        'status' => 'boolean',
        'sale_end_date' => 'date',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product')
            ->withTimestamps()
            ->wherePivot('deleted', 0);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
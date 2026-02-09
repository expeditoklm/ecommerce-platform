<?php

namespace App\Models;

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
    /**
     * @var array
     */
    protected $fillable = ['shop_id', 'type_id', 'name', 'slug', 'description', 'file_url', 'price', 'stock', 'is_on_sale', 'sale_price', 'sale_end_date', 'popularity_score', 'carousel_priority', 'auto_display', 'manual_display', 'target_segment', 'exclusive_discount', 'deleted', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function productImages()
    {
        return $this->hasMany('App\Models\ProductImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo('App\Models\Type');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

     /**
     * Relation many-to-many avec Category
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product')
                    ->wherePivot('deleted', 0)
                    ->withTimestamps();
    }



    /**
     * Relation avec ProductImage
     */
    public function images()
    {
        return $this->hasMany(ProductImage::class)->where('deleted', 0);
    }
}

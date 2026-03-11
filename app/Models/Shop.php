<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $main_category_id
 * @property string $name
 * @property string $slug
 * @property string $description
 * @property string $address
 * @property string $location
 * @property string $phone
 * @property string $logo_url
 * @property boolean $is_active
 * @property string $return_policy
 * @property string $contact_email
 * @property string $contact_phone
 * @property float $average_rating
 * @property integer $reviews_count
 * @property string $website_url
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Address[] $addresses
 * @property Blog[] $blogs
 * @property Notification[] $notifications
 * @property Product[] $products
 * @property ShopFollower[] $shopFollowers
 * @property Category $category
 * @property User $user
 */
class Shop extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'user_id',
        'name',
        'slug',
        'description',
        'address',
        'location',
        'phone',
        'logo_url',
        'is_active',
        'return_policy',
        'contact_email',
        'contact_phone',
        'average_rating',
        'reviews_count',
        'main_category_id',
        'website_url',
        'deleted',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'deleted' => 'boolean',
        'average_rating' => 'decimal:2',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mainCategory()
    {
        return $this->belongsTo(Category::class, 'main_category_id');
    }

       public function products()
    {
        return $this->hasMany(Product::class)->where('deleted', 0);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'shop_followers')
            ->withTimestamps()
            ->withPivot('reason', 'deleted')
            ->wherePivot('deleted', 0);
    }

    // Étoiles pour l'affichage
    public function getStarsAttribute(): array
    {
        $rating = round($this->average_rating * 2) / 2; // arrondi au 0.5 près
        $full   = floor($rating);
        $half   = ($rating - $full) >= 0.5 ? 1 : 0;
        $empty  = 5 - $full - $half;
        return compact('full', 'half', 'empty');
    }






// app/Models/Shop.php
public function getProductCategories()
{
    return \App\Models\Category::whereHas('products', function ($q) {
        $q->where('products.shop_id', $this->id)
          ->where('products.deleted', 0)
          ->where('products.status', 1);
    })
    ->where('categories.deleted', 0)
    ->where('categories.status', 1)
    ->get();
}
}

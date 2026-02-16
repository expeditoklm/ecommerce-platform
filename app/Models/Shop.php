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
        return $this->hasMany(Product::class);
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
}

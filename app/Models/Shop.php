<?php

namespace App\Models;

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
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'main_category_id', 'name', 'slug', 'description', 'address', 'location', 'phone', 'logo_url', 'is_active', 'return_policy', 'contact_email', 'contact_phone', 'average_rating', 'reviews_count', 'website_url', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shopFollowers()
    {
        return $this->hasMany('App\Models\ShopFollower');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'main_category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

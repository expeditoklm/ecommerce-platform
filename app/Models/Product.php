<?php
namespace App\Models;

use App\Enums\ExchangeStatus;
use App\Enums\ProductSection;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid', 'section', 'label',
        'shop_id', 'type_id',
        'name', 'code', 'slug',
        'online_date', 'city', 'district',
        'exchange_status', 'condition', 'condition_description',
        'description', 'features', 'file_url',
        'price', 'price_7days', 'price_30days',
        'stock','user_id',
        'is_on_sale', 'sale_price', 'sale_end_date',
        'popularity_score', 'wishlist_count',
        'carousel_priority', 'auto_display', 'manual_display',
        'target_segment', 'exclusive_discount',
        'average_rating', 'reviews_count',
        'deleted', 'status',
    ];

    protected $casts = [
        'price'              => 'decimal:2',
        'price_7days'        => 'decimal:2',
        'price_30days'       => 'decimal:2',
        'sale_price'         => 'decimal:2',
        'exclusive_discount' => 'decimal:2',
        'is_on_sale'         => 'boolean',
        'auto_display'       => 'boolean',
        'manual_display'     => 'boolean',
        'deleted'            => 'integer',
        'status'             => 'integer',
        'exchange_status'    => ExchangeStatus::class,
        'section'            => ProductSection::class,
        'sale_end_date'      => 'date',
        'online_date'        => 'date',
    ];

    // ── Scopes par section ──────────────────────────────
    public function scopeProducts($query)
    {
        return $query->where('section', 'product');
    }

    public function scopeServices($query)
    {
        return $query->where('section', 'service');
    }

    public function scopeRentals($query)
    {
        return $query->where('section', 'rental');
    }

    // ── Helpers ─────────────────────────────────────────
    public function isProduct(): bool
    {
        return $this->section === ProductSection::Product;
    }

    public function isService(): bool
    {
        return $this->section === ProductSection::Service;
    }

    public function isRental(): bool
    {
        return $this->section === ProductSection::Rental;
    }

    // ── Relations ────────────────────────────────────────
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
        return $this->belongsToMany(
            Category::class,
            'category_product',
            'product_id',
            'category_id'
        )->wherePivot('deleted', 0);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class)->where('deleted', 0);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

 

    public function wishlists()
{
    return $this->hasMany(Wishlist::class)->where('deleted', 0);
}

// Helper — nombre de fois ajouté en wishlist
public function getWishlistCountAttribute(): int
{
    return $this->wishlists()->count();
}
// Ajouter la relation :
public function user()
{
    return $this->belongsTo(\App\Models\User::class);
}

// Helper pour retrouver le propriétaire (boutique OU utilisateur direct)
public function getOwnerAttribute()
{
    return $this->shop?->user ?? $this->user;
}

  public function getFirstImageAttribute(): ?string
    {
        return $this->images->first()?->url;
    }

}
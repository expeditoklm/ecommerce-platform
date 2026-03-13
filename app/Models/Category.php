<?php

namespace App\Models;

use App\Enums\ProductSection;
use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $icon_cat
 * @property boolean $deleted
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property Blog[] $blogs
 * @property Shop[] $shops
 */
class Category extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'name',
        'section',
        'description',
        'icon_cat',
        'deleted',
        'status',
    ];

    protected $casts = [
        'deleted' => 'boolean',
        'status' => 'boolean',
        'section'  => ProductSection::class,
    ];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'category_product',     // table pivot
            'category_id',          // FK vers categories
            'product_id'            // FK vers products
        )->wherePivot('deleted', 0);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('deleted', 0)->where('status', 1);
    }

    public function scopeForSection($query, string $section)
    {
        return $query->where('section', $section);
    }
}

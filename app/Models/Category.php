<?php

namespace App\Models;

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
        'description',
        'icon_cat',
        'deleted',
        'status',
    ];

    protected $casts = [
        'deleted' => 'boolean',
        'status' => 'boolean',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_product')
            ->withTimestamps()
            ->wherePivot('deleted', 0);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}

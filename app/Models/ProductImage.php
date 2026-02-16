<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $product_id
 * @property string $url
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 */
class ProductImage extends Model
{
    use HasUuid;

    protected $fillable = ['uuid', 'product_id', 'url', 'deleted'];
    protected $casts = ['deleted' => 'boolean'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
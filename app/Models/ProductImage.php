<?php

namespace App\Models;

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
    /**
     * @var array
     */
    protected $fillable = ['product_id', 'url', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}

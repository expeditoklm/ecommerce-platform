<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $product_id
 * @property integer $quantity
 * @property float $total
 * @property string $status
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Product $product
 * @property User $user
 */
class Order extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'product_id', 'quantity', 'total', 'status', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

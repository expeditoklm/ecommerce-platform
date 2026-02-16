<?php

namespace App\Models;

use App\Traits\HasUuid;
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
    use HasUuid;

    protected $fillable = [
        'uuid',
        'user_id',
        'product_id',
        'quantity',
        'total',
        'status',
        'deleted',
    ];

    protected $casts = [
        'total' => 'decimal:2',
        'deleted' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

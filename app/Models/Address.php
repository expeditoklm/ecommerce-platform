<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $shop_id
 * @property string $title
 * @property string $location
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Shop $shop
 */
class Address extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'title',
        'location',
        'shop_id',
        'deleted',
    ];

    protected $casts = [
        'deleted' => 'boolean',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}

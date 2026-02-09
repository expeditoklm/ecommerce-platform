<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $user_id
 * @property integer $shop_id
 * @property string $reason
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Shop $shop
 * @property User $user
 */
class ShopFollower extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'shop_id', 'reason', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

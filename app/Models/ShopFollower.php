<?php

namespace App\Models;

use App\Traits\HasUuid;
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
    use HasUuid;

    protected $fillable = ['uuid', 'user_id', 'shop_id', 'reason', 'deleted'];
    protected $casts = ['deleted' => 'boolean'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
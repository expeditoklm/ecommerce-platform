<?php

namespace App\Models;

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
    /**
     * @var array
     */
    protected $fillable = ['shop_id', 'title', 'location', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}

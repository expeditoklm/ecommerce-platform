<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $label
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Product[] $products
 */
class Type extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['label', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}

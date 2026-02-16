<?php

namespace App\Models;

use App\Traits\HasUuid;
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
    use HasUuid;

    protected $fillable = ['uuid', 'label', 'deleted'];
    protected $casts = ['deleted' => 'boolean'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

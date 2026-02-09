<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $icon_cat
 * @property boolean $deleted
 * @property boolean $status
 * @property string $created_at
 * @property string $updated_at
 * @property Blog[] $blogs
 * @property Shop[] $shops
 */
class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'icon_cat', 'deleted', 'status', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs()
    {
        return $this->hasMany('App\Models\Blog');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shops()
    {
        return $this->hasMany('App\Models\Shop', 'main_category_id');
    }
}

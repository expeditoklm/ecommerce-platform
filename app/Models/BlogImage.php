<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $blog_id
 * @property string $url
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Blog $blog
 */
class BlogImage extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['blog_id', 'url', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
    {
        return $this->belongsTo('App\Models\Blog');
    }
}

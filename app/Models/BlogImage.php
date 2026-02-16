<?php

namespace App\Models;

use App\Traits\HasUuid;
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
    use HasUuid;

    protected $fillable = ['uuid', 'blog_id', 'url', 'deleted'];
    protected $casts = ['deleted' => 'boolean'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}

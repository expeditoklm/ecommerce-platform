// app/Models/BlogTag.php
<?php

use App\Models\Blog;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    protected $fillable = ['uuid', 'name', 'slug', 'deleted'];

    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_blog_tag');
    }
}
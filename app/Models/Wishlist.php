<?php
namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'user_id',
        'product_id',
        'deleted',
    ];

    protected $casts = [
        'deleted' => 'integer',
    ];

    // ── Relations ────────────────────────────────────────

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
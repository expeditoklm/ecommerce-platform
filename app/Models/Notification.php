<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $shop_id
 * @property string $name
 * @property string $firstname
 * @property string $company
 * @property string $title
 * @property string $email
 * @property string $phone
 * @property string $comment
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 * @property Shop $shop
 */
class Notification extends Model
{
    use HasUuid;

    protected $fillable = [
        'uuid',
        'shop_id',
        'name',
        'firstname',
        'company',
        'title',
        'email',
        'phone',
        'comment',
        'deleted',
    ];

    protected $casts = ['deleted' => 'boolean'];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
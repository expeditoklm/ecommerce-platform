<?php

namespace App\Models;

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
    /**
     * @var array
     */
    protected $fillable = ['shop_id', 'name', 'firstname', 'company', 'title', 'email', 'phone', 'comment', 'deleted', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo('App\Models\Shop');
    }
}

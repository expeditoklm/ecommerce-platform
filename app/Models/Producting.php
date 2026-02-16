<?php

namespace App\Models;

use App\Traits\HasUuid;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property boolean $deleted
 * @property string $created_at
 * @property string $updated_at
 */
class Producting extends Model
{
    use HasUuid;

    protected $fillable = ['uuid', 'name', 'description', 'deleted'];
    protected $casts = ['deleted' => 'boolean'];
}
<?php

namespace App\Models;

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
    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'deleted', 'created_at', 'updated_at'];
}

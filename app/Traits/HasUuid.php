<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Boot the trait.
     */
    protected static function bootHasUuid(): void
    {
        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    /**
     * Get the route key name for Laravel.
     */
    public function getRouteKeyName(): string
    {
        return 'uuid';
    }

    /**
     * Scope a query to find by UUID.
     */
    public function scopeFindByUuid($query, string $uuid)
    {
        return $query->where('uuid', $uuid);
    }
}
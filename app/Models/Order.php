<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'uuid', 'type',
        'user_id', 'owner_id',
        'product_id', 'offered_product_id',
        'quantity', 'total',
        'rental_start_date', 'rental_end_date', 'rental_days',
        'message', 'rejection_reason',
        'status', 'deleted',
    ];

    protected $casts = [
        'deleted'            => 'integer',
        'total'              => 'decimal:2',
        'rental_start_date'  => 'date',
        'rental_end_date'    => 'date',
    ];

    const STATUSES = [
        'pending'       => ['label' => 'En attente',    'badge' => 'bg-warning'],
        'accepted'      => ['label' => 'Acceptée',      'badge' => 'bg-success'],
        'rejected'      => ['label' => 'Refusée',       'badge' => 'bg-danger'],
        'completed'     => ['label' => 'Terminée',      'badge' => 'bg-primary'],
        'cancelled'     => ['label' => 'Annulée',       'badge' => 'bg-secondary'],
        'counter_offer' => ['label' => 'Contre-offre',  'badge' => 'bg-info'],
    ];

    const TYPES = [
        'exchange' => ['label' => 'Troc',     'badge' => 'bg-purple', 'icon' => 'bi-arrow-left-right'],
        'service'  => ['label' => 'Service',  'badge' => 'bg-success', 'icon' => 'bi-tools'],
        'rental'   => ['label' => 'Location', 'badge' => 'bg-warning', 'icon' => 'bi-key'],
    ];

    // ── Relations ────────────────────────────────────────

    // Le demandeur
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Le propriétaire de la boutique
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // Produit ciblé (celui de la boutique)
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // Produit proposé en échange (celui du demandeur)
    public function offeredProduct()
    {
        return $this->belongsTo(Product::class, 'offered_product_id');
    }

    // ── Accessors ────────────────────────────────────────

    public function getOrderNumberAttribute(): string
    {
        return 'MT#' . str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    public function isExchange(): bool
    {
        return $this->type === 'exchange';
    }

    public function isRental(): bool
    {
        return $this->type === 'rental';
    }

    public function isService(): bool
    {
        return $this->type === 'service';
    }
}
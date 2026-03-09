<?php
// app/Enums/ProductSection.php
namespace App\Enums;

enum ProductSection: string
{
    case Product = 'product';
    case Service = 'service';
    case Rental  = 'rental';

    public function label(): string
    {
        return match($this) {
            self::Product => 'Produit',
            self::Service => 'Service',
            self::Rental  => 'Location',
        };
    }

    // Exchange statuses disponibles par section
    public function availableStatuses(): array
    {
        return match($this) {
            self::Product => ['En Echange', 'Echange Terminé', 'Indisponible'],
            self::Service => ['Service Disponible', 'Service Indisponible'],
            self::Rental  => ['En Location', 'Indisponible'],
        };
    }
}
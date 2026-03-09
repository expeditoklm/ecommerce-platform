<?php
// app/Enums/ExchangeStatus.php
namespace App\Enums;

enum ExchangeStatus: string
{
    case EnEchange           = 'En Echange';
    case EchangeTermine      = 'Echange Terminé';
    case Indisponible        = 'Indisponible';
    case EnLocation          = 'En Location';
    case ServiceDisponible   = 'Service Disponible';
    case ServiceIndisponible = 'Service Indisponible';
}
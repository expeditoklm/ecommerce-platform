<?php
// app/Enums/ProductCondition.php
namespace App\Enums;

enum ProductCondition: string
{
    case Neuf            = 'Neuf';
    case TresBonEtat     = 'Très bon état';
    case BonEtat         = 'Bon état';
    case EtatAcceptable  = 'État acceptable';
    case Usage           = 'Usagé';
}
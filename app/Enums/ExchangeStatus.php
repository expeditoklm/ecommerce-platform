<?php

namespace App\Enums;

enum ExchangeStatus: string
{
    case EnEchange      = 'En Echange';
    case EchangeTermine = 'Echange Terminé';
    case Indisponible   = 'Indisponible';
}
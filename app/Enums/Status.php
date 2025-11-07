<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Status: int implements HasLabel
{
    case Draft = 1;
    case Reviewing = 2;
    case Published = 3;
    case Rejected = 4;
    
    public function getLabel(): ?string
    {
        return $this->name;
    }
}

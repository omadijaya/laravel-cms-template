<?php

namespace App\Filament\Resources;

use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Datlechin\FilamentMenuBuilder\Resources\MenuResource as BaseMenuResource;

class MenuResource extends BaseMenuResource
{
    use HasPageShield;

    protected static ?int $navigationSort = 6;

    public static function getNavigationGroup(): ?string
    {
        return __('nav.blog');
    }
}

<?php

namespace App\Filament\Plugins\Resources;

use Datlechin\FilamentMenuBuilder\Resources\MenuResource as BaseMenuResource;

class MenuResource extends BaseMenuResource
{
    // protected static ?string $navigationGroup = 'Navigation';

    protected static ?int $navigationSort = 6;

    public static function getNavigationBadge(): ?string
    {
        return number_format(static::getModel()::count());
    }
}

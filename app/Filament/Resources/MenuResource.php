<?php

namespace App\Filament\Resources;

use Datlechin\FilamentMenuBuilder\Resources\MenuResource as BaseMenuResource;

class MenuResource extends BaseMenuResource
{
    // protected static ?string $navigationGroup = 'Navigation';

    protected static ?int $navigationSort = 6;

    public static function getNavigationGroup(): ?string
    {
        return __('nav.blog');
    }
}

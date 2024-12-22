<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class Settings extends SettingsPage
{
    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 99;

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Application Settings')
                    ->description('pengaturan umum aplikasi')
                    ->schema([
                        TextInput::make('site_name')
                            ->label('Site Name')
                            ->required(),
                        Forms\Components\Toggle::make('site_active')
                            ->label('Site Active')
                            ->default(true),

                    ]),
                Section::make('Social Media Links')
                    ->schema([
                        Repeater::make('links')
                            ->schema([
                                TextInput::make('label')->required(),
                                TextInput::make('url')
                                    ->url()
                                    ->required(),
                            ]),
                    ]),
            ]);
    }
}

<?php

namespace App\Filament\Pages;

use App\Settings\GeneralSettings;
use BezhanSalleh\FilamentShield\Traits\HasPageShield;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SettingsPage;

class Settings extends SettingsPage
{
    use HasPageShield;

    protected static ?string $navigationIcon = 'heroicon-o-cog-6-tooth';

    protected static ?int $navigationSort = 99;

    protected static string $settings = GeneralSettings::class;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Application')
                            ->icon('heroicon-o-computer-desktop')
                            ->schema([
                                Section::make('Application Settings')
                                    ->description('pengaturan umum aplikasi')
                                    ->schema([
                                        TextInput::make('site_name')
                                            ->label('Site Name')
                                            ->required(),
                                        Textarea::make('site_description')
                                            ->label('Site Description'),
                                        Grid::make([
                                            'default' => 1,
                                            'xl' => 2,
                                            '2xl' => 2,
                                        ])
                                            ->schema([
                                                TextInput::make('site_support_email')
                                                    ->prefixIcon('heroicon-o-envelope')
                                                    ->label('Support Email'),
                                                TextInput::make('site_support_phone')
                                                    ->prefixIcon('heroicon-o-phone')
                                                    ->label('Support Phone'),
                                            ]),
                                        Forms\Components\Toggle::make('site_active')
                                            ->label('Site Active')
                                            ->default(true),

                                    ]),
                            ]),
                        Tabs\Tab::make('Analytics')
                            ->icon('heroicon-o-presentation-chart-bar')
                            ->schema([
                                Textarea::make('analytics')
                                    ->helperText('Paste your Google Analytics embed script here.')
                                    ->label('Analytics Embed Script'),
                            ]),
                        Tabs\Tab::make('Social Media')
                            ->icon('heroicon-o-share')
                            ->schema([
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
                            ]),
                    ])
                    ->activeTab(1),

            ])->columns(1);
    }

    public static function getNavigationGroup(): ?string
    {
        return __('nav.settings');
    }

    protected function getShieldRedirectPath(): string
    {
        return '/'; // redirect to the root index...
    }
}

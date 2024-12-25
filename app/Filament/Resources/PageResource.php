<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PageResource\Pages;
use App\Models\Page;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RalphJSmit\Filament\SEO\SEO;

class PageResource extends Resource
{
    protected static ?string $model = Page::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make([
                    'default' => 1,
                    'xl' => 3,
                    '2xl' => 3,
                ])
                    ->schema([
                        Grid::make()
                            ->schema([
                                Section::make([
                                    TitleWithSlugInput::make(
                                        fieldTitle: 'title',
                                        fieldSlug: 'slug',
                                        titleLabel: __('resources/page.form.title'),
                                        titlePlaceholder: __('resources/page.form.title_placeholder'),
                                        titleRules: [
                                            'required',
                                            'string',
                                            'min:3',
                                        ],
                                    ),
                                    Forms\Components\RichEditor::make('content')
                                        ->label(__('resources/page.form.content'))
                                        ->placeholder(__('resources/page.form.content_placeholder'))
                                        ->required()
                                        ->extraInputAttributes(['height' => 600]),
                                    SpatieMediaLibraryFileUpload::make('featured_image')
                                        ->label(__('resources/page.form.featured_image'))
                                        ->helperText(__('resources/page.form.featured_image_help_text'))
                                        ->rules(['nullable', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'])
                                        ->collection('page_featured_images')
                                        ->conversion('thumb'),
                                ]),
                                Section::make('Meta Data')
                                    ->description(__('resources/page.meta_data_description'))
                                    ->schema([
                                        SEO::make(),
                                    ])->collapsed(),
                            ])->columnSpan(2),
                        Section::make(__('resources/page.settings_label'))
                            ->schema([
                                Forms\Components\Toggle::make('is_published')
                                    ->label(__('resources/page.form.is_published'))
                                    ->helperText(__('resources/page.publish_settings_description'))
                                    ->default(true),
                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label(__('resources/page.form.published_at')),
                            ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('resources/page.form.title'))
                    ->color('primary')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('author.name')
                    ->label(__('resources/post.form.author'))
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_published')
                    ->label('Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label(__('resources/post.form.published_at'))
                    ->description(fn ($record): string => $record->published_at?->diffForHumans() ?? null)
                    ->datetime()
                    ->sortable(),
            ])
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPages::route('/'),
            'create' => Pages\CreatePage::route('/create'),
            'edit' => Pages\EditPage::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getModelLabel(): string
    {
        return __('resources/page.label');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('nav.blog');
    }
}

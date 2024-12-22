<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoriesResource\Pages;
use App\Models\Categories;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoriesResource extends Resource
{
    protected static ?string $model = Categories::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Blog';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make([
                    TitleWithSlugInput::make(
                        fieldTitle: 'title',
                        fieldSlug: 'slug',
                        urlPath: '/kategori/',
                        titleLabel: __('resources/categories.form.title'),
                        titlePlaceholder: __('resources/categories.form.title_placeholder'),
                        titleRules: [
                            'required',
                            'string',
                            'min:3',
                        ],
                    ),
                    Select::make('parent_id')
                        ->relationship(
                            name: 'parent',
                            titleAttribute: 'title',
                            ignoreRecord: true,
                            modifyQueryUsing: fn (Builder $query) => $query->whereNull('parent_id'),
                        )
                        ->label(__('resources/categories.form.parent_category')),
                    Forms\Components\RichEditor::make('content')
                        ->label(__('resources/categories.form.content'))
                        ->placeholder(__('resources/categories.form.content_placeholder'))
                        ->extraInputAttributes(['height' => 600]),
                    SpatieMediaLibraryFileUpload::make('featured_image')
                        ->label(__('resources/categories.form.featured_image'))
                        ->helperText(__('resources/categories.form.featured_image_help_text'))
                        ->rules(['nullable', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'])
                        ->collection('category_featured_images')
                        ->conversion('thumb'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('resources/categories.form.title'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parent.title')
                    ->label(__('resources/categories.form.parent_category'))
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategories::route('/create'),
            'edit' => Pages\EditCategories::route('/{record}/edit'),
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
        return __('resources/categories.label');
    }
}

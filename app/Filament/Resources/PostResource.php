<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Camya\Filament\Forms\Components\TitleWithSlugInput;
use CodeWithDennis\FilamentSelectTree\SelectTree;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\SpatieTagsInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use RalphJSmit\Filament\SEO\SEO;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    protected static ?int $navigationSort = 3;

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
                                        urlPath: '/artikel/',
                                        titleLabel: __('resources/post.form.title'),
                                        titlePlaceholder: __('resources/post.form.title_placeholder'),
                                        titleRules: [
                                            'required',
                                            'string',
                                            'min:3',
                                        ],
                                    ),
                                    Forms\Components\RichEditor::make('content')
                                        ->label(__('resources/post.form.content'))
                                        ->placeholder(__('resources/post.form.content_placeholder'))
                                        ->required()
                                        ->extraInputAttributes(['height' => 600]),
                                    SpatieMediaLibraryFileUpload::make('featured_image')
                                        ->label(__('resources/post.form.featured_image'))
                                        ->helperText(__('resources/post.form.featured_image_help_text'))
                                        ->rules(['nullable', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'])
                                        ->collection('post_featured_images')
                                        ->conversion('thumb'),
                                ]),
                                Section::make('Meta Data')
                                    ->description(__('resources/post.meta_data_description'))
                                    ->schema([
                                        SEO::make(),
                                    ])->collapsed(),
                            ])->columnSpan(2),
                        Section::make(__('resources/post.settings_label'))
                            ->schema([
                                SelectTree::make('posts_categories')
                                    ->label(__('resources/post.form.categories'))
                                    ->relationship('categories', 'title', 'parent_id')
                                    ->enableBranchNode(),
                                SpatieTagsInput::make('tags')
                                    ->type('blog_tags'),
                                Forms\Components\Toggle::make('is_published')
                                    ->label(__('resources/post.form.is_published'))
                                    ->helperText(__('resources/post.publish_settings_description'))
                                    ->default(true),
                                Forms\Components\DateTimePicker::make('published_at')
                                    ->label(__('resources/post.form.published_at')),
                            ])->columnSpan(1),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('resources/post.form.title'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_published')
                    ->label(__('resources/post.form.is_published'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
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
        return __('resources/post.label');
    }
}

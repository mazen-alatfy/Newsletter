<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(255)
                    ->required(),

                Forms\Components\Select::make('category_id')
                    ->relationship(name: 'category', titleAttribute: 'name'),

                Forms\Components\Toggle::make('is_trending')
                    ->label('Trending'),

                Forms\Components\Toggle::make('is_last_show')
                    ->label('Last Show'),

                Forms\Components\TextInput::make('doctor_name')
                    ->maxLength(255)
                    ->nullable(),

                Forms\Components\FileUpload::make('doctor_image')
                    ->image()
                    ->directory('doctors')
                    ->nullable(),

                Forms\Components\DateTimePicker::make('published_at')
                    ->nullable(),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('posts/images')
                    ->disk('public')
                    ->nullable(),

                Forms\Components\FileUpload::make('cover_image')
                    ->image()
                    ->directory('posts/covers')
                    ->disk('public')
                    ->nullable(),

                MarkdownEditor::make('content')
                    ->columnSpanFull()
                    ->minLength(14)
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('author.name')
                    ->label('Author')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('post_type')
                    ->label('Type')
                    ->colors([
                        'warning' => fn ($record): bool => $record?->is_trending,
                        'success' => fn ($record): bool => $record?->is_last_show,
                        'gray' => fn ($record): bool => ! $record?->is_trending && ! $record?->is_last_show,
                    ])
                    ->getStateUsing(fn ($record): string => $record->is_trending ? 'Trending' : ($record->is_last_show ? 'Last Show' : 'Normal')),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
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
}

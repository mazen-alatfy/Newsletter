<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdvertisementResource\Pages;
use App\Filament\Resources\AdvertisementResource\RelationManagers;
use App\Models\Advertisement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextArea;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use App\Models\Category;


class AdvertisementResource extends Resource
{
    protected static ?string $model = Advertisement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->maxLength(255),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('ads/images')
                ->disk('public')
                ->nullable(),

            Forms\Components\FileUpload::make('video')
                ->acceptedFileTypes(['video/mp4', 'video/webm', 'video/ogg'])
                ->directory('ads/videos')
                ->disk('public')
                ->nullable(),

            Forms\Components\TextInput::make('link')
                ->url()
                ->maxLength(255),

            Forms\Components\Select::make('position')
                ->options([
                    'sidebar' => 'Sidebar',
                    'between_posts' => 'Between Posts',
                    'homepage_top' => 'Homepage Top',
                ])
                ->required(),

            Forms\Components\Select::make('placement')
                ->options([
                    'bottom' => 'Bottom',
                    'sidebar' => 'Sidebar',
                ])
                ->required(),

            Forms\Components\Select::make('orientation')
                ->options([
                    'landscape' => 'Landscape',
                    'portrait' => 'Portrait',
                ])
                ->default('landscape'),

            Forms\Components\Toggle::make('is_active')
                ->default(true),

            Forms\Components\DatePicker::make('start_date'),

            Forms\Components\DatePicker::make('end_date'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\ImageColumn::make('image')->disk('public'),
                Tables\Columns\TextColumn::make('link')
                    ->url(fn ($record) => $record->link)
                    ->openUrlInNewTab()
                    ->searchable(),
                Tables\Columns\TextColumn::make('position')->searchable(),
                Tables\Columns\TextColumn::make('placement')
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'sidebar' => 'success',
                        'bottom' => 'warning',
                        default => 'gray',
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('orientation')
                    ->badge()
                    ->color(fn (string $state): string => match($state) {
                        'portrait' => 'danger',
                        'landscape' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
                Tables\Columns\TextColumn::make('start_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('end_date')->date()->sortable(),
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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAdvertisements::route('/'),
            'create' => Pages\CreateAdvertisement::route('/create'),
            'edit' => Pages\EditAdvertisement::route('/{record}/edit'),
        ];
    }
}

<?php

namespace App\Filament\Resources\MenuItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->disk('public'),
                TextColumn::make('name')
                    ->label('Name')
                    ->getStateUsing(fn ($record) => $record->getTranslation('name', 'az'))
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->getStateUsing(fn ($record) => $record->category?->getTranslation('name', 'az'))
                    ->sortable(),
                TextColumn::make('price')
                    ->money('azn') // change to 'usd' if you'd rather show $ in the demo
                    ->sortable(),
                IconColumn::make('is_available')
                    ->boolean(),
                TextColumn::make('sort_order')
                    ->numeric()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
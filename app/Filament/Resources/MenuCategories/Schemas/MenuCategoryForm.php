<?php

namespace App\Filament\Resources\MenuCategories\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class MenuCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('AZ')
                            ->schema([
                                TextInput::make('name.az')
                                    ->label('Name (AZ)')
                                    ->required(),
                            ]),
                        Tab::make('EN')
                            ->schema([
                                TextInput::make('name.en')
                                    ->label('Name (EN)')
                                    ->required(),
                            ]),
                        Tab::make('RU')
                            ->schema([
                                TextInput::make('name.ru')
                                    ->label('Name (RU)')
                                    ->required(),
                            ]),
                    ])
                    ->columnSpanFull(),

                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
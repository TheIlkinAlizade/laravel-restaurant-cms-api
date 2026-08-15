<?php

namespace App\Filament\Resources\MenuItems\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class MenuItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('menu_category_id')
                    ->relationship('category', 'name') // shows raw JSON for now, fine until MenuCategoryResource is also tabbed
                    ->required()
                    ->searchable(),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('AZ')
                            ->schema([
                                TextInput::make('name.az')
                                    ->label('Name (AZ)')
                                    ->required(),
                                Textarea::make('description.az')
                                    ->label('Description (AZ)'),
                            ]),
                        Tab::make('EN')
                            ->schema([
                                TextInput::make('name.en')
                                    ->label('Name (EN)')
                                    ->required(),
                                Textarea::make('description.en')
                                    ->label('Description (EN)'),
                            ]),
                        Tab::make('RU')
                            ->schema([
                                TextInput::make('name.ru')
                                    ->label('Name (RU)')
                                    ->required(),
                                Textarea::make('description.ru')
                                    ->label('Description (RU)'),
                            ]),
                    ])
                    ->columnSpanFull(),

                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),

                FileUpload::make('image_path')
                    ->image()
                    ->directory('menu-items')
                    ->visibility('public'),

                Toggle::make('is_available')
                    ->required()
                    ->default(true),

                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
            ]);
    }
}
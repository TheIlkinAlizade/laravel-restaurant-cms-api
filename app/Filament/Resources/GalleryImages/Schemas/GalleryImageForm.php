<?php

namespace App\Filament\Resources\GalleryImages\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class GalleryImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('image_path')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->directory('gallery')
                    ->visibility('public'),

                Select::make('category')
                    ->options([
                        'food' => 'Food',
                        'interior' => 'Interior',
                        'people' => 'People',
                    ])
                    ->required()
                    ->default('food'),

                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('AZ')->schema([
                            TextInput::make('caption.az')->label('Caption (AZ)'),
                        ]),
                        Tab::make('EN')->schema([
                            TextInput::make('caption.en')->label('Caption (EN)'),
                        ]),
                        Tab::make('RU')->schema([
                            TextInput::make('caption.ru')->label('Caption (RU)'),
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
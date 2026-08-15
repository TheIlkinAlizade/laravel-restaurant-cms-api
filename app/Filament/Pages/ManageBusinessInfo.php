<?php

namespace App\Filament\Pages;

use App\Models\BusinessInfo;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class ManageBusinessInfo extends Page implements HasForms
{
    use InteractsWithForms;

    protected string $view = 'filament.pages.manage-business-info';

    protected static ?string $navigationLabel = 'Business Info';

    protected static ?string $title = 'Business Info';

    public ?array $data = [];

    public function mount(): void
    {
        $businessInfo = BusinessInfo::current();

        $this->form->fill([
            'name' => $businessInfo->getTranslations('name'),
            'tagline' => $businessInfo->getTranslations('tagline'),
            'about_text' => $businessInfo->getTranslations('about_text'),
            'phone' => $businessInfo->phone,
            'whatsapp' => $businessInfo->whatsapp,
            'instagram_url' => $businessInfo->instagram_url,
            'address_line' => $businessInfo->address_line,
            'city' => $businessInfo->city,
            'map_lat' => $businessInfo->map_lat,
            'map_lng' => $businessInfo->map_lng,
            'hours' => $businessInfo->hours ?? [],
            'hero_image_path' => $businessInfo->hero_image_path,
        ]);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Translations')
                    ->tabs([
                        Tab::make('AZ')
                            ->schema([
                                TextInput::make('name.az')->label('Business Name (AZ)')->required(),
                                TextInput::make('tagline.az')->label('Tagline (AZ)'),
                                Textarea::make('about_text.az')->label('About (AZ)')->rows(4),
                            ]),
                        Tab::make('EN')
                            ->schema([
                                TextInput::make('name.en')->label('Business Name (EN)')->required(),
                                TextInput::make('tagline.en')->label('Tagline (EN)'),
                                Textarea::make('about_text.en')->label('About (EN)')->rows(4),
                            ]),
                        Tab::make('RU')
                            ->schema([
                                TextInput::make('name.ru')->label('Business Name (RU)')->required(),
                                TextInput::make('tagline.ru')->label('Tagline (RU)'),
                                Textarea::make('about_text.ru')->label('About (RU)')->rows(4),
                            ]),
                    ])
                    ->columnSpanFull(),

                TextInput::make('phone')->tel(),
                TextInput::make('whatsapp')->tel()->label('WhatsApp number'),
                TextInput::make('instagram_url')->url()->label('Instagram URL'),
                TextInput::make('address_line')->label('Street address'),
                TextInput::make('city'),
                TextInput::make('map_lat')->numeric()->label('Map latitude'),
                TextInput::make('map_lng')->numeric()->label('Map longitude'),

                KeyValue::make('hours')
                    ->label('Opening hours')
                    ->keyLabel('Day')
                    ->valueLabel('Hours (e.g. 08:00-18:00, or "Closed")')
                    ->columnSpanFull(),

                FileUpload::make('hero_image_path')
                    ->label('Hero image')
                    ->image()
                    ->directory('business')
                    ->visibility('public')
                    ->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $formData = $this->form->getState();

        $businessInfo = BusinessInfo::current();

        $businessInfo->setTranslations('name', $formData['name'] ?? []);
        $businessInfo->setTranslations('tagline', $formData['tagline'] ?? []);
        $businessInfo->setTranslations('about_text', $formData['about_text'] ?? []);

        $businessInfo->fill([
            'phone' => $formData['phone'] ?? null,
            'whatsapp' => $formData['whatsapp'] ?? null,
            'instagram_url' => $formData['instagram_url'] ?? null,
            'address_line' => $formData['address_line'] ?? null,
            'city' => $formData['city'] ?? null,
            'map_lat' => $formData['map_lat'] ?? null,
            'map_lng' => $formData['map_lng'] ?? null,
            'hours' => $formData['hours'] ?? [],
            'hero_image_path' => $formData['hero_image_path'] ?? null,
        ]);

        $businessInfo->save();

        Notification::make()
            ->title('Business info saved')
            ->success()
            ->send();
    }
}
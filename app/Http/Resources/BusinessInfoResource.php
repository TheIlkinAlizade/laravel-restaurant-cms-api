<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BusinessInfoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $locale = $request->query('locale', 'az');

        return [
            'name' => $this->getTranslation('name', $locale, false) ?? $this->getTranslation('name', 'az'),
            'tagline' => $this->getTranslation('tagline', $locale, false),
            'about_text' => $this->getTranslation('about_text', $locale, false),
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'instagram_url' => $this->instagram_url,
            'address_line' => $this->address_line,
            'city' => $this->city,
            'map_lat' => $this->map_lat,
            'map_lng' => $this->map_lng,
            'hours' => $this->hours,
            'hero_image_url' => $this->hero_image_path,
        ];
    }
}
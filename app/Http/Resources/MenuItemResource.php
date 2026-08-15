<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MenuItemResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $locale = $request->query('locale', 'az');

        return [
            'id' => $this->id,
            'name' => $this->getTranslation('name', $locale, false) ?? $this->getTranslation('name', 'az'),
            'description' => $this->getTranslation('description', $locale, false),
            'price' => (float) $this->price,
            'image_url' => $this->image_path
                ? (str_starts_with($this->image_path, 'http') ? $this->image_path : url('/storage/' . $this->image_path))
                : null,
            'is_available' => $this->is_available,
            'sort_order' => $this->sort_order,
        ];
    }
}
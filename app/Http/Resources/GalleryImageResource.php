<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GalleryImageResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $locale = $request->query('locale', 'az');

        return [
            'id' => $this->id,
            'image_url' => $this->image_path
                ? (str_starts_with($this->image_path, 'http') ? $this->image_path : url('/storage/' . $this->image_path))
                : null,
            'caption' => $this->getTranslation('caption', $locale, false),
            'category' => $this->category,
            'sort_order' => $this->sort_order,
        ];
    }
}
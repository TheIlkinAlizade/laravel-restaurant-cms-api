<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class BusinessInfo extends Model
{
    use HasTranslations;

    public array $translatable = ['name', 'tagline', 'about_text'];
    protected $fillable = [
        'name','tagline','about_text','phone','whatsapp','instagram_url',
        'address_line','city','map_lat','map_lng','hours','hero_image_path',
    ];
    protected $casts = [
        'hours' => 'array',
        'map_lat' => 'float',
        'map_lng' => 'float',
    ];

    public static function current(): self
    {
        return static::firstOrCreate(['id' => 1]);
    }
}

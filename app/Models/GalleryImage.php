<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class GalleryImage extends Model
{
    use HasTranslations;

    public array $translatable = ['caption'];
    protected $fillable = ['image_path','caption','category','sort_order'];
}

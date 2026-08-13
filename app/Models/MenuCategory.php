<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MenuCategory extends Model
{
    use HasTranslations;

    public array $translatable = ['name'];
    protected $fillable = ['name', 'sort_order'];

    public function items(): HasMany
    {
        return $this->hasMany(MenuItem::class)->orderBy('sort_order');
    }
}
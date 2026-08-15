<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuCategoryResource;
use App\Models\MenuCategory;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $categories = MenuCategory::with(['items' => function ($query) {
            $query->where('is_available', true)->orderBy('sort_order');
        }])
            ->orderBy('sort_order')
            ->get();

        return MenuCategoryResource::collection($categories);
    }
}
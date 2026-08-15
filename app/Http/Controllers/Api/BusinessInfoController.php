<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BusinessInfoResource;
use App\Models\BusinessInfo;
use Illuminate\Http\Request;

class BusinessInfoController extends Controller
{
    public function show(Request $request)
    {
        return new BusinessInfoResource(BusinessInfo::current());
    }
}
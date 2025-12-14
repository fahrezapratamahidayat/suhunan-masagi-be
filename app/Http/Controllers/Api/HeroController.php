<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\HeroResource;
use App\Models\Hero;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $heroes = Hero::query()
            ->where('is_active', true)
            ->orderBy('order', 'asc')
            ->get();

        return $this->successResponse(
            HeroResource::collection($heroes),
            'Data hero berhasil diambil'
        );
    }
}

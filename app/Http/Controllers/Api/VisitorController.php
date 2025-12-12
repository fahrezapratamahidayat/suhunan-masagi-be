<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;


use App\Models\Visitor;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class VisitorController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        Visitor::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json(['message' => 'Visit recorded']);
    }
}

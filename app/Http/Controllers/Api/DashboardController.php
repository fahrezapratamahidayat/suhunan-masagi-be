<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class DashboardController extends Controller
{
    use ApiResponse;

    public function stats(): JsonResponse
    {
        $now = Carbon::now();

        $stats = [
            'today' => Visitor::whereDate('created_at', $now->today())->count(),
            'week' => Visitor::whereBetween('created_at', [$now->startOfWeek(), $now->endOfWeek()])->count(),
            'month' => Visitor::whereMonth('created_at', $now->month)->whereYear('created_at', $now->year)->count(),
            'total' => Visitor::count(),
        ];

        return $this->successResponse($stats, 'Statistik kunjungan berhasil diambil');
    }
}

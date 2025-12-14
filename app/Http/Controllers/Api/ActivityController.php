<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of activities
     */
    public function index(Request $request): JsonResponse
    {
        $query = Activity::query()
            ->orderBy('date', 'desc')
            ->orderBy('start_time', 'desc');

        // Filter by status
        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        // Filter by date range
        if ($request->has('date_from')) {
            $query->whereDate('date', '>=', $request->date_from);
        }

        if ($request->has('date_to')) {
            $query->whereDate('date', '<=', $request->date_to);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%");
            });
        }

        $perPage = $request->get('per_page', 10);
        $activities = $query->paginate($perPage);

        return $this->paginatedResponse(
            $activities->setCollection(
                $activities->getCollection()->map(fn($activity) => new ActivityResource($activity))
            ),
            'Activities retrieved successfully'
        );
    }

    /**
     * Display the specified activity by slug
     */
    public function show(string $slug): JsonResponse
    {
        $activity = Activity::query()
            ->where('slug', $slug)
            ->first();

        if (!$activity) {
            return $this->notFoundResponse('Activity not found');
        }

        return $this->successResponse(
            new ActivityResource($activity),
            'Activity retrieved successfully'
        );
    }
}

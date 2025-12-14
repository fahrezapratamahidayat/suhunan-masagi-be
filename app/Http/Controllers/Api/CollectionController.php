<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CollectionResource;
use App\Models\Collection;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of visible collections
     */
    public function index(Request $request): JsonResponse
    {
        $query = Collection::query()
            ->where('is_visible', true)
            ->orderBy('created_at', 'desc');

        // Filter by type
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('type', 'like', "%{$search}%");
            });
        }

        $perPage = $request->get('per_page', 10);
        $collections = $query->paginate($perPage);

        return $this->paginatedResponse(
            $collections->setCollection(
                $collections->getCollection()->map(fn($collection) => new CollectionResource($collection))
            ),
            'Collections retrieved successfully'
        );
    }

    /**
     * Display the specified collection by slug
     */
    public function show(string $slug): JsonResponse
    {
        $collection = Collection::query()
            ->where('slug', $slug)
            ->where('is_visible', true)
            ->first();

        if (!$collection) {
            return $this->notFoundResponse('Collection not found');
        }

        return $this->successResponse(
            new CollectionResource($collection),
            'Collection retrieved successfully'
        );
    }
}

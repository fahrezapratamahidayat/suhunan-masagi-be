<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use App\Traits\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of published articles
     */
    public function index(Request $request): JsonResponse
    {
        $query = Article::query()
            ->where('status', 'published')
            ->with('user:id,name')
            ->orderBy('published_at', 'desc');

        // Filter by type
        if ($request->has('type')) {
            $query->where('type', $request->type);
        }

        // Search
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        $perPage = $request->get('per_page', 10);
        $articles = $query->paginate($perPage);

        return $this->paginatedResponse(
            $articles->setCollection(
                $articles->getCollection()->map(fn($article) => new ArticleResource($article))
            ),
            'Articles retrieved successfully'
        );
    }

    /**
     * Display the specified article by slug
     */
    public function show(string $slug): JsonResponse
    {
        $article = Article::query()
            ->where('slug', $slug)
            ->where('status', 'published')
            ->with('user:id,name')
            ->first();

        if (!$article) {
            return $this->notFoundResponse('Article not found');
        }

        return $this->successResponse(
            new ArticleResource($article),
            'Article retrieved successfully'
        );
    }
}

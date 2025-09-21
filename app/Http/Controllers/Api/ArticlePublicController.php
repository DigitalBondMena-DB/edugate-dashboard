<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleListResource;
use App\Http\Resources\ArticleShowResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticlePublicController extends Controller
{
    public function index(Request $req)
    {
        $q = Article::query()->published()
            ->when($req->search, function ($qq, $s) {
                $qq->where(function($w) use ($s) {
                    $w->where('title->ar', 'like', "%$s%")
                      ->orWhere('title->en', 'like', "%$s%");
                });
            })
            ->orderBy('position')->orderByDesc('published_at');

        return ArticleListResource::collection($q->paginate(12));
    }

    public function show(Request $req, string $slug)
    {


        $article = Article::published()->where('slug_ar', $slug)->firstOr(function () use ($slug) {
            $article = Article::published()->where('slug_en', $slug)->firstOrFail();
            return $article;
        });

        $related = Article::published()
            ->where('id', '!=', $article->id)
            ->inRandomOrder()->limit(3)->get();

        return response()->json([
            'article' => new ArticleShowResource($article),
            'related' => ArticleListResource::collection($related),
        ]);
    }
}

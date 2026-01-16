<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;

class ArticleApiController extends Controller
{
    public function index()
    {
        return Article::all();
    }

    public function store(Request $request)
    {
        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        return $article;
    }

    public function show(string $id)
    {
        return Article::find($id);
    }

    public function update(Request $request, string $id)
    {
        $article = Article::findOrFail($id);

        if ($request->has('title')) {
            $article->title = $request->title;
        }

        if ($request->has('body')) {
            $article->body = $request->body;
        }

        if ($request->has('category_id')) {
            $article->category_id = $request->category_id;
        }

        $article->save();
        return $article;
    }

    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();
        return $article;
    }
}

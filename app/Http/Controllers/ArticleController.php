<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    public function showList()
    {
        $postList = [
            ['articleId' => 101, 'heading' => 'Laravel Basics'],
            ['articleId' => 102, 'heading' => 'Blade Template'],
        ];

        return view('article.index', [
            'postList' => $postList
        ]);
    }

    public function read($articleId)
    {
        $post = [
            'articleId' => $articleId,
            'heading' => 'Laravel Article ' . $articleId,
            'body' => 'This page explains article number ' . $articleId
        ];

        return view('article.details', [
            'post' => $post
        ]);
    }
    public function create()
    {
        return view('article.create');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:3',
            'body' => 'required|min:10',
            'category_id' => 'required|integer',
        ]);

        Article::create($validated);

        return redirect('/articles/create')->with('success', 'Article created successfully!');
    }
}

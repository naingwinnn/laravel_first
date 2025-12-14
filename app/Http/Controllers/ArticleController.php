<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

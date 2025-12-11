<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//static route
Route::get('/hello', function () {
    return 'Hello World';
});
Route::get('/articles/detail', function () {
    return 'Article Detail';
});

//dynamic route
Route::get('/articles/detail/{id}', function ($id) {
 return "Article Detail - $id";
});

//route name
Route::get('/articles/detail', function () {
 return 'Article Detail';
})->name('article.detail');

//redirect function
Route::get('/articles/more', function() {
 return redirect()->route('article.detail');
});
?>

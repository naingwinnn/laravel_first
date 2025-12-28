<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

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

Route::get('/article', [ArticleController::class, 'showList'])->name('article.list');
Route::get('/read/{articleId}', [ArticleController::class, 'read'])->name('article.read');

Route::get('/students', [StudentController::class, 'allStudents']);
Route::get('/students/find/{id}', [StudentController::class, 'findStudent']);
Route::get('/students/filter', [StudentController::class, 'filterStudents']);
Route::get('/students/first', [StudentController::class, 'firstStudent']);
Route::get('/students/order', [StudentController::class, 'orderStudents']);
Route::get('/students/pluck', [StudentController::class, 'pluckStudents']);
Route::get('/students/create', [StudentController::class, 'createStudent']);
Route::get('/students/update/{id}', [StudentController::class, 'updateStudent']);
Route::get('/students/delete/{id}', [StudentController::class, 'deleteStudent']);

Route::get('/profile', [UserController::class, 'assignment']);
?>

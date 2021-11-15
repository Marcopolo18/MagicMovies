<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Controller;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ArticleController::class, 'allArticles']);

//try at login page md
Route::get('/mdlogin', function () {
    return view('mdlogin');
});

Route::get('/mdregister', function () {
    return view('mdregister');
});

Route::get('/mdforgot-password', function () {
    return view('mdforgot-password');
});

//try image post md
// Route::post(
//     'uploadImage',
//     'Controller@uploadImage'
// )->name('images.uploadImage');


Route::get('/welcome', [ArticleController::class, 'allArticles'])->name('welcome');

Route::get('/app', function () {
    return view('app');
});

//delete function
Route::delete('/post/{id}', 'Controller@delete');

Route::delete('/subs/{id}', 'Controller@deleteSub');

Route::get('/editor', function () {
    return view('editor');
});

Route::get('/editor', 'Controller@showAll');

Route::get('/editor/{id}', 'Controller@view');

//md try approve
Route::post('/approve/{id}', 'ArticleController@approveArticle');




// Route::get('/post', function () {
//     return view('post');
// });

Route::get('/article/{id}', 'Controller@view');


Route::get('/article', function () {
    return view('article');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/master', function () {
    return view('master');
});

Route::get('/subs', function () {
    return view('subs');
});

// Route::get('/', function () {
//     return Inertia::render('welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
//});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::post('/newpost', [ArticleController::class, 'storeArticle']);

// Route::post('/newsub', [Controller::class, 'newsub']); //md merge image attempt

Route::post('/newsub', 'Controller@newsub');

//why if / is defined as /welcome?

// Route::get('/', 'Controller@allPosts');

//Route::get('/welcome/{id}', 'Controller@view');

//try at search md
Route::get('/search/', 'ArticleController@search')->name('search');

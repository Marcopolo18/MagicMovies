<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/app', function () {
    return view('app');
});

//delete function
Route::delete('/post/{id}', 'Controller@delete');

Route::delete('/subs/{id}', 'Controller@deleteSub');

// Route::get('/post', function () {
//     return view('post');
// });

Route::get('/article/{id}', 'Controller@view');


Route::get('/article', function () {
    return view('article');
});

Route::get('/editor', function () {
    return view('editor');
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

Route::post('/newpost', 'Controller@newpost');

Route::post('/newsub', 'Controller@newsub');

Route::get('/editor', 'Controller@showAll');

Route::get('/editor/{id}', 'Controller@view');

<?php

use Illuminate\Support\Facades\Route;

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

// Lbc basics
App\Lbc\LaravelBootstrapComponents::init();

// abc.com/lbc if you want to have the docs for it
App\Lbc\LaravelBootstrapComponents::initDocs();

// Lbc theme liara (abc.com/liara)
// App\Lbc\LaravelBootstrapComponents::initThemeLiara();

Route::get('/', [App\Http\Controllers\BooksController::class, 'index'])->name('index');

Route::get('/home', [App\Http\Controllers\BooksController::class, 'index'])->name('index');

Route::get('/books', [App\Http\Controllers\BooksController::class, 'index'])->name('index');




Route::get('/genres/create', [App\Http\Controllers\GenresController::class, 'genreCreate'])->name('genreCreate');

Route::post('/genres/store', [App\Http\Controllers\GenresController::class, 'genreStore'])->name('genreStore');
Route::get('/genres/store', [App\Http\Controllers\GenresController::class, 'genreStore'])->name('genreStore');



Route::patch('/genres/update', [App\Http\Controllers\GenresController::class, 'genreUpdate'])->name('genreUpdate');
Route::get('/genres/update', [App\Http\Controllers\GenresController::class, 'genreUpdate'])->name('genreUpdate');

Route::get('/books/create', [App\Http\Controllers\BooksController::class, 'create'])->name('create');

Route::post('/books/store', [App\Http\Controllers\BooksController::class, 'store'])->name('store');
Route::get('/books/store', [App\Http\Controllers\BooksController::class, 'create'])->name('store');

Route::get('/books/{id}/edit', [App\Http\Controllers\BooksController::class, 'edit'])->name('edit');



Route::patch('/books/update', [App\Http\Controllers\BooksController::class, 'update'])->name('update');
Route::get('/books/update', [App\Http\Controllers\BooksController::class, 'update'])->name('update');

Route::get('/books/{id}', [App\Http\Controllers\BooksController::class, 'book'])->name('book');

Route::get('/genres/{id}', [App\Http\Controllers\GenresController::class, 'genre'])->name('genre');

Route::get('/genres/{id}/edit', [App\Http\Controllers\GenresController::class, 'genreEdit'])->name('genreEdit');

Route::delete('/genres/{id}/delete', [App\Http\Controllers\GenresController::class, 'genreDelete'])->name('genreDelete');
Route::get('/genres/{id}/delete', [App\Http\Controllers\GenresController::class, 'genreDelete'])->name('genreDelete');

Route::delete('/books/{id}/delete', [App\Http\Controllers\BooksController::class, 'bookDelete'])->name('bookDelete');
Route::get('/books/{id}/delete', [App\Http\Controllers\BooksController::class, 'bookDelete'])->name('bookDelete');


Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
Auth::routes();
/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

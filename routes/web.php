<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\KatController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BookController::class, 'index'])->name('home');

//katbook
Route::get('/categories', [KatController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [KatController::class, 'create'])->name('categories.create');
Route::get('/categories/{category}/edit', [KatController::class, 'edit'])->name('categories.edit');
Route::post('/categories', [KatController::class, 'store'])->name('categories.store');
Route::put('/categories/{category}', [KatController::class, 'update'])->name('categories.update');
Route::delete('/categories/{category}', [KatController::class, 'destroy'])->name('categories.destroy');

//book
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::post('/books', [BookController::class, 'store'])->name('books.store');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

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

Route::get('/', [BookController::class, 'showBookMainPage']);
Route::get('/catalog', [BookController::class, 'showBookCatalog']);
Route::get('/book/{id}', [BookController::class, 'showBookById']);
Route::get('/profile', [UserController::class, 'showProfile'])->middleware(['auth']);

Route::view('/addBook', 'pages.addBook')->middleware(['auth']);

Route::post('/addBook', [BookController::class, 'addBook'])->middleware(['auth']);
Route::post('/updateUserData', [UserController::class, 'updateUserData'])->middleware(['auth']);
Route::post('/changeUserAvatar', [UserController::class, 'changeUserAvatar'])->middleware(['auth']);
Route::post('/updateBook', [BookController::class, 'updateBook'])->middleware(['auth']);
Route::post('/addComment', [BookController::class, 'addComment'])->middleware(['auth']);
Route::post('/deleteBook', [BookController::class, 'deleteBook'])->middleware(['auth']);
Route::post('/deleteComm', [BookController::class, 'deleteComm'])->middleware(['auth']);

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\NewsletterController;
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

Route::get("/", [PostController::class, "index"])->name("home");

Route::get("posts/{post:slug}", [PostController::class, "show"]);
Route::post("posts/{post:slug}/comments", [CommentController::class, 'store']);

Route::get("register", [RegisterController::class, "create"])->middleware('guest');

Route::post("register", [RegisterController::class, "store"])->middleware('guest');

Route::get("login", [SessionsController::class, "create"])->middleware('guest');
Route::post("login", [SessionsController::class, "store"])->middleware('guest');
Route::post("logout", [SessionsController::class, "destroy"])->middleware('auth');


Route::post('newsletter', NewsletterController::class);

Route::get('/admin/posts/create', [PostController::class, "create"])->middleware('admin');
Route::post('/admin/posts/store', [PostController::class, "store"])->middleware('admin');

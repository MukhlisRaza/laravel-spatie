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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('post', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('post/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create')->middleware('role:writer|admin');
Route::post('store', [App\Http\Controllers\PostController::class, 'store']);
Route::match(['get', 'post'], 'post/{post?}/edit/', [App\Http\Controllers\PostController::class, 'edit'])->middleware('permission:edit post');
Route::match(['get', 'post'], 'post/{post?}/view/', [App\Http\Controllers\PostController::class, 'view']);
Route::match(['get', 'post'], 'post/{post?}/publish/', [App\Http\Controllers\PostController::class, 'publish']);

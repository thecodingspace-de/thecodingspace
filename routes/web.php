<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\NavController;

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

// Routing-Navbar

Route::get('/', [NavController::class, 'home'])->name('home');
Route::get('/contact', [NavController::class, 'contact'])->name('contact');
Route::get('/blog', [BlogController::class, 'showBlog'])->name('showBlog');

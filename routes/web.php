<?php

use App\Http\Controllers\backend\UserController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
  return view('backend/dashboard');
})->name('dashboard');


Route::prefix('user')->group(function () {
  Route::get('/view', [UserController::class, 'user_view'])->name('users.view');
  Route::get('/create', [UserController::class, 'user_create'])->name('users.create');
  Route::post('/post', [UserController::class, 'user_post'])->name('users.post');
  Route::get('/edit/{id}', [UserController::class, 'user_eidt'])->name('users.edit');
  Route::post('/update', [UserController::class, 'user_update'])->name('users.upate');
});

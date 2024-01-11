<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RentController;

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

Route::get('/', [PublicController::class, 'index']);

Route::middleware('onlyguest')->group(function(){
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'Authenticate']);
    Route::get('register', [AuthController::class, 'register']); 
    Route::post('register', [AuthController::class, 'registerProses']);   
});
Route::middleware('auth')->group(function(){
Route::get('logout', [AuthController::class, 'logout']);

Route::get('Profile', [UserController::class, 'profile'])->middleware('onlyclient');

Route::middleware('onlyadmin')->group(function(){

Route::get('Dashboard',[DashboardController::class, 'index']);

Route::get('books', [BookController::class, 'index']);
Route::get('book-add', [BookController::class, 'add']);
Route::post('book-add', [BookController::class, 'store']);
Route::get('book-edit/{slug}', [BookController::class, 'edit']);
Route::post('book-edit/{slug}',[BookController::class, 'update']);
Route::get('book-delete/{slug}',[BookController::class, 'delete']);
Route::get('book-destroy/{slug}',[BookController::class, 'destroy']);
Route::get('book-deleted',[BookController::class, 'deletedBook']);
Route::get('book-restore/{slug}',[BookController::class, 'restore']);



Route::get('categories', [CategoryController::class, 'index']);
Route::get('category-add', [CategoryController::class, 'add']);
Route::post('category-add', [CategoryController::class, 'store']);
Route::get('category-edit/{slug}', [CategoryController::class, 'edit']);
Route::put('category-edit/{slug}',[CategoryController::class, 'update']);
Route::get('category-delete/{slug}',[CategoryController::class, 'delete']);
Route::get('category-destroy/{slug}',[CategoryController::class, 'destroy']);
Route::get('category-deleted',[CategoryController::class, 'deletedCategory']);
Route::get('category-restore/{slug}',[CategoryController::class, 'restore']);


Route::get('users', [UserController::class, 'index']);
Route::get('registered-users', [UserController::class, 'registeredUser']);
Route::get('users-detail/{slug}', [UserController::class, 'detail']);
Route::get('users-approve/{slug}', [UserController::class, 'approve']);
Route::get('users-banned/{slug}', [UserController::class, 'delete']);
Route::get('users-destroy/{slug}', [UserController::class, 'destroy']);
Route::get('users-banned', [UserController::class, 'bannedUser']);
Route::get('users-restore/{slug}', [UserController::class, 'restore']);


Route::get('book-rent', [RentController::class, 'index']);
Route::post('book-rent', [RentController::class, 'storeBooks']);

Route::get('rent-logs', [RentLogController::class, 'index']);

Route::get('books-return', [RentController::class, 'returnBook']);
Route::post('books-return', [RentController::class, 'saveReturn']);
});


});
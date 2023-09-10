<?php

use App\Models\Expense;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ExpenseController;

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

// all expenses
Route::get('/', [UserController::class, 'home']);

// all expenses
Route::get('/expenses', [ExpenseController::class, 'index'])->middleware('auth');

// show add form
Route::get('/expenses/create', [ExpenseController::class, 'create'])->middleware('auth');

// single expense
Route::post('/expenses', [ExpenseController::class, 'store'])->middleware('auth');

// show edit form
Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->middleware('auth');

// update listing
Route::put('expenses/{expense}', [ExpenseController::class, 'update'])->middleware('auth');

// delete listing
Route::delete('expenses/{expense}', [ExpenseController::class, 'destroy'])->middleware('auth');

// single expense
Route::get('/expenses/{expense}', [ExpenseController::class, 'show'])->middleware('auth');



// show register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// create a new user
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// logout user
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// login user
Route::post('/users/authenticate', [UserController::class, 'authenticate'])->middleware('guest');

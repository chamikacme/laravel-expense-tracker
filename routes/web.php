<?php

use App\Http\Controllers\ExpenseController;
use Illuminate\Support\Facades\Route;

use App\Models\Expense;

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
Route::get('/', [ExpenseController::class, 'index']);

// show add form
Route::get('/expenses/create', [ExpenseController::class, 'create']);

// single expense
Route::post('/expenses', [ExpenseController::class, 'store']);

// show edit form
Route::get('/expenses/{expense}/edit', [ExpenseController::class, 'edit']);


// update listing
Route::put('expenses/{expense}', [ExpenseController::class, 'update']);

// delete listing
Route::delete('expenses/{expense}', [ExpenseController::class, 'destroy']);

// single expense
Route::get('/expenses/{expense}', [ExpenseController::class, 'show']);











// Route::get('/hello', function () {
//     return response("<h1>Hello World</h1>", 200);
// });

// Route::get('/projects/{id}', function ($id) {
//     return response('post ' . $id);
// });

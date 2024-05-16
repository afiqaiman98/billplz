<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PasswordGeneratorController;
use App\Http\Controllers\PizzaController;
use App\Http\Controllers\SnailController;
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

Route::get('/', function () {
    return view('start');
});


Route::get('/generate-password', [PasswordGeneratorController::class, 'index'])->name('password.generator');
Route::post('/generate-password', [PasswordGeneratorController::class, 'generatePassword'])->name('generate.password');

Route::get('/pizza', [PizzaController::class, 'showOrderForm'])->name('order');
Route::post('/pizza', [PizzaController::class, 'processOrder']);


Route::get('/filter-credits', [CreditController::class, 'filterCreditsForm'])->name('filter-credits');
Route::post('/filter-credits', [CreditController::class, 'filterCredits']);

Route::get('/comment',[CommentController::class,'index']);


Route::get('/snail', [SnailController::class, 'index']);
Route::post('/calculate', [SnailController::class, 'calculate']);

Route::resource('orders', OrderController::class);




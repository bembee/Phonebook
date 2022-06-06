<?php

use App\Http\Controllers\PhonebookController;
use App\Models\Phonebook;
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

Route::get('/', [PhonebookController::class, 'index']);
Route::get('/new', [PhonebookController::class, 'create']);
Route::resource('phonebook', 'App\Http\Controllers\PhonebookController');

<?php

use App\Http\Controllers\ImageController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[ImageController::class,'index'])->name('image.index');
Route::post('/store',[ImageController::class,'store'])->name('image.store');
Route::delete('/destroy',[ImageController::class,'destroy'])->name('image.destroy');
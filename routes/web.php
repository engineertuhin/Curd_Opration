<?php

use App\Http\Controllers\UserCreareController;
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

Route::get("/",[UserCreareController::class,'index']);
Route::get("Create_User",[UserCreareController::class,'userCreare'])->name('userCreare');
Route::POST("Insert",[UserCreareController::class,'userinsert'])->name('userinsert');
Route::get("Edit/{id}",[UserCreareController::class,'userEdit'])->name('userEdit');
Route::POST("updateUser/{id}",[UserCreareController::class,'updateUser'])->name('updateUser');
Route::POST("Delete/{id}",[UserCreareController::class,'deleteuser'])->name('deleteuser');
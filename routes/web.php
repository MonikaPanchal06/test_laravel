<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/showdata',[UserController::class,'index'])->name('showdata.data');
Route::get('/userpage',[UserController::class,'create']);
Route::post('/userpage',[UserController::class,'store'])->name('user.save');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::post('/user/edit/{id}', [UserController::class, 'update'])->name('user.edit');
Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');


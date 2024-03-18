<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperheroeController;

Route::get('/',function(){
    return view('auth.login');
});

//Route::get('/', [SuperheroeController::class, 'index']);


//Route:: get('/superheroe/create',[SuperheroeController::class,'create']);

Route::resource('superheroe',SuperheroeController::class);

Auth::routes();

Route::get('/home', [SuperheroeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function() {

    Route::get('/', [SuperheroeController::class, 'index'])->name('home');
});
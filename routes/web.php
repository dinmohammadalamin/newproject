<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('index'); // Assuming your blade file is named index.blade.php


});

//use App\Http\Controllers\UserController;

Route::get('/showForm', [UserController::class, 'showForm']);

Route::post('/submitForm', [UserController::class, 'submitForm'])->name('submitForm');


// // routes/web.php






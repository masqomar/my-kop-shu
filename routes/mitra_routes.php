<?php

use Illuminate\Support\Facades\Route;


/*---- All Mitra Routes List----*/
Route::middleware(['auth', 'user-access:mitra'])->group(function () {
  
    Route::get('/mitra/home', [App\Http\Controllers\HomeController::class, 'mitraHome'])->name('mitra.home');
});
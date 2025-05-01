<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return redirect('/buku');
});

Route::resource('buku', BukuController::class);


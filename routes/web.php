<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\TopsisController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::resource('operator', OperatorController::class);
Route::resource('kriteria', KriteriaController::class)->parameters([
    'kriteria' => 'kriteria',
    ]);
Route::resource('nilai', NilaiController::class);
Route::get('/topsis', [TopsisController::class, 'index'])->name('topsis.index');
Route::resource('nilai', \App\Http\Controllers\NilaiController::class);


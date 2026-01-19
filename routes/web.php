<?php

use App\Http\Controllers\OperatorController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\TopsisController;
use App\Http\Controllers\SubKriteriaController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('operator', OperatorController::class);
Route::resource('kriteria', KriteriaController::class)
->parameters(['kriteria' => 'kriteria']);
Route::resource('nilai', NilaiController::class);

Route::resource('subkriteria', SubKriteriaController::class)
->parameters(['subkriteria' => 'subkriteria']);
   

Route::get('/topsis', [TopsisController::class, 'index'])
    ->name('topsis.index');

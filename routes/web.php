<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notes', function () {
    $notes = [
        "primera nota",
        "segunda nota",
        "tercera nota",
        "cuarta nota",
        "quinta nota",
    ];
    return view('notes.index')->with('notes', $notes);
})->name('notes.index');
Route::get('/notes/create', function () {
    return view('notes.create');
});

Route::get('/notes/{id}', function ($id) {
    return 'Detalles de la note' . ' ' . $id;
})->name('notes.view');

Route::get('/notes/create', function () {
    return view('notes.create');
})->name('notes.create');



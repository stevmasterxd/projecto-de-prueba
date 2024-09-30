<?php

use Illuminate\Support\Facades\DB;
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
    $notes = DB::table('notes_tables')->get();
    return view('notes.index')->with('notes', $notes);
})->name('notes.index');

Route::get('/notes/create', function () {
    return view('notes.create');
})->name('notes.create');

Route::get('/notes/{id}', function ($id) {
    return 'Note ditail' . ' ' . $id;
})->name('notes.view');

Route::get('/notes/{id}/edit', function ($id) {
    $note = DB::table('notes_tables')->find($id);
    abort_if($note === null, 404);
    return 'Edit note: ' . $note-> title;
})->name('notes.edit');

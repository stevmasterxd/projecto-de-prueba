<?php

use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
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
    $notes = Note::query()
        ->orderByDesc('id')
        ->get();
    return view('notes.index')->with('notes', $notes);
})->name('notes.index');

Route::get('/notes/create', function () {
    return view('notes.create');
})->name('notes.create');

Route::post('/notes', function () {
    Note::create([
        'title' => Request::input('title'),
        'content' => Request::input('content'),
    ]);

    return redirect()->route('notes.index');
})->name('notes.store');

Route::get('/notes/{id}', function ($id) {
    return 'Note ditail' . ' ' . $id;
})->name('notes.view');

Route::get('/notes/{id}/edit', function ($id) {
    $note = Note::findOrFail($id);
    return 'Edit note: ' . $note->title;
})->name('notes.edit');

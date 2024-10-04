<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NoteController
{
    public function index()
    {
        $notes = Note::query()
            ->orderByDesc('id')
            ->get();
        return view('notes.index')->with('notes', $notes);
    }

    public function show(int $id)
    {   
        return 'Note ditail: '  .$id;
    }
    public function create()
    {
        return view('notes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3', Rule::unique('notes_tables')],
            'content' => 'required',
        ]);

        Note::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return to_route('notes.index');
    }
    public function edit($id)
    {
        $note = Note::findOrFail($id);
        return view('notes.edit', ['note' => $note]);
    }
    public function update($id, Request $request)
    {
        $note = Note::findOrFail($id);
        $request->validate([
            'title' => ['required', 'min:3', Rule::unique('notes_tables')->ignore($note)],
            'content' => 'required',
        ]);
        $note->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        return to_route('notes.index');
    }
    public function destroy(Request $request, $id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        if ($request->ajax()){
            return response()->noContent();
        }
        return to_route('notes.index');
    }
} 

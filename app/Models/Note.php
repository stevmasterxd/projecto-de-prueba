<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{   
    protected $fillable = ['title', 'content'];
    protected $table = 'notes_tables';
    public function editUrl()
    {
        return route('notes.edit', ['id' => $this->id]);
    }
}

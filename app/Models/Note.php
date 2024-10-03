<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{   use SoftDeletes; 
    protected $fillable = ['title', 'content'];
    protected $table = 'notes_tables';
    public function editUrl()
    {
        return route('notes.edit', ['id' => $this->id]);
    }
}

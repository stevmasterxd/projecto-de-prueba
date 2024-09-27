<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('notes')->insert([
            'title' => 'Note 1',
            'content' => 'contend',

        ]);
    }
}

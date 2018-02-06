<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grade extends Model
{
    public function getAll()
    {
        return DB::table('grades')->get();
    }

    public function showAll()
    {
        $entities = DB::table('grades')->orderBy('id')->paginate(10);
        return $entities;
    }
}

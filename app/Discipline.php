<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Discipline extends Model
{
    public function getAll()
    {
        return DB::table('disciplines')->get();
    }

    public function showAll()
    {
        $entities = DB::table('disciplines')->orderBy('id')->paginate(10);
        return $entities;
    }
}

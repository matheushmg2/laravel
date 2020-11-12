<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TesteDB extends Model
{
    protected $connection = 'mysql'; // configurando a conexão remota

    public function index()
    {
        $testeDB = DB::select('SELECT * FROM estudantes');
        return $testeDB;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['pNome', 'sNome'];
    // Palavra reservada "$fillable" para caso queira inserir algum dados diretamente
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analista extends Model
{
    protected $fillable = ['id', 'nome'];
    public $timestamps = false;
}

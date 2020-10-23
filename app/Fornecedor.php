<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = ['id', 'nome','fornsap'];
    public $timestamps = false;
}

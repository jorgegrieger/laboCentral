<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    protected $fillable = ['id', 'nome','fornsap'];
    public $timestamps = false;


    public function produtos()
    {
        return $this->belongsTo(Produto::class,'produto_id', 'id');
    }
}

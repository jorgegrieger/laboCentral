<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arearesp extends Model
{



    protected $fillable = ['id', 'nome'];
    public $timestamps = false;

    public function produtos()
    {
        return $this->belongsTo(Produto::class,'produto_id', 'id');
    }

}

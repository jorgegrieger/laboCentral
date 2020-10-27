<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Produto extends Model
{

    use softdeletes;

    protected $fillable = [ 'id', 'produtobo', 'nometec', 'fornecedor_id', 'resparea_id', 'st', 'cosap'];
    public $timestamps = false;

    public function fornecedores()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
        return $this->belongsTo('App\Fornecedor');
    }

    
}


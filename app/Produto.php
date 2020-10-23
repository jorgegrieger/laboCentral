<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [ 'id', 'produtobo', 'nometec', 'fornecedor_id', 'resparea_id', 'st', 'cosap'];
    public $timestamps = false;

    public function fornecedores()
    {
        return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
        return $this->belongsTo('App\Fornecedor');
    }

    public function areasresps()
    {
        return $this->belongsTo(Arearesp::class, 'resparea_id', 'id');
        return $this->belongsTo('App\Fornecedor');
    }

}


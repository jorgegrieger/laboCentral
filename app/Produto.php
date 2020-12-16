<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Produto extends Model
{

    use softdeletes;

    protected $fillable = [ 'id', 'produtobo', 'nometec', 'fornecedor_id', 'resparea_id', 'st','resparea', 'cosap'];
    public $timestamps = false;

    public function fornecedores()
    {
        return $this->belongsToMany(Fornecedor::class, 'fornecedor_id', 'id');
    }

    public function recebimento()
    {
        return $this->belongsToMany(Recebimento::class,'produto_id', 'id');
        
    }

    public function analise()
    {
        return $this->belongsToMany(Analises::class,'produto_id', 'id');
        return $this->belongsToMany(Fornecedor::class,'fornecedor_id', 'id');
        
    }
}


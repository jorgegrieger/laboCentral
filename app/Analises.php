<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analises extends Model
{
    protected $fillable = ['produto_id','fornecedor_id', 'recebimento_id','datalaudo', 'analista_id','tplaudo','fds', 'sto', 'obs', 'laudo'];

    public function recebiments()
    {
        return $this->belongsTo(Recebimento::class,'recebimento_id', 'id','st');
        
    }

    public function fornecedors()
    {

        return $this->belongsTo(Fornecedor::class,'fornecedor_id', 'id');

    }

    public function analist()
    {
        return $this->belongsTo(Analista::class,'analista_id', 'id');
        
    }

    public function produt()
    {
        return $this->belongsTo(Produto::class,'produto_id', 'id','fornecedor_id');
        
    }
    

}

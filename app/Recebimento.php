<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recebimento extends Model
{
   protected $fillable = ['produto_id', 'nfe','pesonf', 'fornecedor_id', 'st', 'pesoliqnf', 'tipoliberacao'];
   
   
   public function fornecedores()
   {
       return $this->belongsTo(Fornecedor::class, 'fornecedor_id', 'id');
       return $this->belongsTo('App\Fornecedor');
   }

   public function produts()
   {
       return $this->belongsTo(Produto::class,'produto_id', 'id');
       
   }

   
}

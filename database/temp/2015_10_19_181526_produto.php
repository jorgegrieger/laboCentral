<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produto extends Migration
{
    public function up()
    {
    Schema::create('produtos', function(Blueprint $table){

        $table->bigIncrements('id');
        $table->string('produtobo');
        $table->string('nometec');
        $table->bigInteger('fornecedor_id')->nullable()->unsigned();
        $table->string('resparea');
        $table->string('st');
        $table->string('cosap');
        $table->softDeletes();

    });

    Schema::table('produtos', function(Blueprint $table){
            
        $table->foreign('fornecedor_id')->references('id')->on('fornecedors')->onDelete('cascade');   

    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recebiment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recebiments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('produto_id')->nullable()->unsigned();
            $table->string('nfe');
            $table->string('pesonf');
            $table->bigInteger('fornecedor_id')->nullable()->unsigned();
            $table->timestamps();
            $table->string('st');
            $table->string('pesoliqnf');
            $table->string('tipoliberacao');
            $table->softDeletes();

        });

        Schema::table('recebiments', function(Blueprint $table){
            
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedors');   

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

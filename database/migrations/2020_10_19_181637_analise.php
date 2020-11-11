<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Analise extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analises', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('recebimento_id')->nullable()->unsigned();
            $table->bigInteger('produto_id')->nullable()->unsigned();
            $table->timestamps();
            $table->bigInteger('analista_id')->nullable()->unsigned();
            $table->bigInteger('fornecedor_id')->nullable()->unsigned();
            $table->string('tplaudo');
            $table->string('fds');
            $table->text('obs');
            $table->text('laudo');
            $table->string('st');
            $table->softDeletes();

        });

        Schema::table('analises', function(Blueprint $table){
            

            $table->foreign('recebimento_id')->references('id')->on('recebimentos')->onDelete('cascade');
            $table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreign('analista_id')->references('id')->on('analistas')->onDelete('cascade');
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

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
            $table->bigInteger('resparea_id')->nullable()->unsigned();
            $table->dateTime('datalaudo');
            $table->bigInteger('analista_id')->nullable()->unsigned();
            $table->text('obs');
            $table->text('laudo');
            $table->string('st');
            $table->softDeletes();

        });

        Schema::table('analises', function(Blueprint $table){
            

            $table->foreign('recebimento_id')->references('id')->on('recebiments');   
            $table->foreign('resparea_id')->references('id')->on('arearesps');   
            $table->foreign('analista_id')->references('id')->on('analistas');
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
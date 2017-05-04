<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionandoRelacionamentoLivrosCategorias extends Migration
{
   public function up()
    {
        Schema::table('livros', function(Blueprint $table){
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')
            ->references('id')
            ->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('livros', function(Blueprint $table){
            $table->dropColumn('categoria_id');
        });   
    }
}

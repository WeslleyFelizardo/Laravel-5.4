<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPedidoLivro extends Migration
{
   public function up()
    {
        Schema::create('pedido_livro', function (Blueprint $table){
            $table->increments('id');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')
                  ->references('id')
                  ->on('pedidos')
                  ->onDelete('cascade');

            $table->integer('livro_id')->unsigned();
            $table->foreign('livro_id')
                  ->references('id')
                  ->on('livros')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pedido_livro');
    }
}

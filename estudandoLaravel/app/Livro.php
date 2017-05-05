<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    public function categoria() {
    	return $this->belongsTo('App\Categoria');
    }

    public function pedidos(){
    	return $this->belongsToMany('App\Pedido');
    }
}

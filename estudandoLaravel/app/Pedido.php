<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //

    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function livros() {
    	return $this->belongsToMany('App\Livro', 'pedido_livro');
    }
}

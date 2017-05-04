<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function livros() {
    	return $this->hasMany('App\Livro');
    }
}

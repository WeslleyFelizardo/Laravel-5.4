<?php

namespace App\Http\Controllers;

use Request;
use App\Livro;

class LivroController extends Controller
{
    //

    public function inserirLivro (Request $request){
    	$livro = new Livro;

    	$livro->nome = $resquest->input('nome');
    	$livro->valor = $request->input('valor');
    	$livro->quantidade = $request->input('quantidade');
    	$livro->categoria->id = $request->input('categoria');
    	$livro->imagem = $request->input('imagem');
    	$livro->descricao = $request->input('descricao');

    	$livro->save();

		return redirect("/");
    }

    public function lista(){

    	return view('livro.manutencaoLivro')->with('livros', Livro::all());

    }
}

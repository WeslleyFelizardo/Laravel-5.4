<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Livro;
use Session;

class CategoriaController extends Controller
{
	private $livros;
	private $quantidadePorPagina = 9;
    //

	public function __contruct() {
		//$this->livros = Livro::all();
		//Session::put('username', 'Weslley');
	}

	public function home() {
		$this->livros = Livro::paginate($this->quantidadePorPagina);

		return view('welcome')->with('categorias', Categoria::all())->with('livros', $this->livros);
	}

    public function lista() {
    	$categorias = Categoria::all();

    	return $categorias;
    }

    public function filtroPorCategoria(Request $request, $id) {
    	$this->livros = Livro::where('categoria_id', $id)->get();

    	//dd($request->session()->get('key'));
    	//$request->session()->forget('carrinho');
   
    	return view('welcome')->with('livros', $this->livros)->with('categorias', Categoria::all());
    }
}

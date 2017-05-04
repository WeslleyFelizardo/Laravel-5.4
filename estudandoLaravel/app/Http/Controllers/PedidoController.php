<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Livro;
use Session;

class PedidoController extends Controller
{
	private $itensCarrinho = null; 

    public function index(Request $request) {
    	$this->itensCarrinho = $request->session()->get('carrinho');	
    	//dd($this->itensCarrinho);
    	return view('pedido.carrinho')->with('itens', sizeof($this->itensCarrinho) > 0 ? $this->itensCarrinho : null)->with('total', $this->calcularTotalCarrinho());
    }

    public function lista() {
    	return view('pedido.listagem')->with('categorias', Categoria::all());
    }

    public function carrinho(Request $request, $id) {
    	$produto = Livro::find($id);
    	$produtoAdicionado = ["id" => $produto->id, "nome" => $produto->nome, "valor" => $produto->valor, "quantidade" => 1, "subtotal" => $produto->valor];

    	 $jaTem = $this->buscarItemCarrinho($request, $id) == 0 ? true : false;
       
       	$this->itensCarrinho = $request->session()->get('carrinho');
       	
       
       	if ($jaTem) {
       		$request->session()->push('carrinho', $produtoAdicionado);
       	}
       	
       	$this->itensCarrinho = $request->session()->get('carrinho');

    	return view('pedido.carrinho')->with('itens', $this->itensCarrinho)->with('total', $this->calcularTotalCarrinho());
    }

    public function excluir(Request $request, $id) {
      //$request->session()->forget('carrinho');
    	$this->itensCarrinho = $request->session()->get('carrinho');
    	//dd($this->itensCarrinho);
    	$key = array_search(Livro::find($id)->id, array_column($this->itensCarrinho,"id"));

    	unset($this->itensCarrinho[$key]);
    	//dd($this->itensCarrinho[0]);
    	$request->session()->put('carrinho', $this->itensCarrinho);

    	return redirect('/carrinho')->with('itens', $this->itensCarrinho)->with('total', $this->calcularTotalCarrinho());
    }

    public function calcularTotalCarrinho() {
    	$total = 0.0;

    		if (sizeof($this->itensCarrinho) > 0) {
	    		foreach ($this->itensCarrinho as $item) {
		       		$total += $item["valor"] * $item["quantidade"];
		       	}
    		}

    	return $total;
    }

    private function buscarItemCarrinho(Request $request, $id) {

     $this->itensCarrinho = $request->session()->get('carrinho');
    	if (sizeof($this->itensCarrinho) > 0) {	
	       	foreach ($this->itensCarrinho as $item) {
	       	 //dd($item['id']);
            if ($item["id"] == $id) {
               //dd($item["id"]);
               return $item["id"];
           }
	       	}
    	}
        //dd(0);
       	return 0;
       	
    }
}

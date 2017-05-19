<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Livro;
use App\Pedido;
use Auth;
use Session;

class PedidoController extends Controller
{
	  private $itensCarrinho = null;

    public function __construct() {
      //$this->middleware('autorizador', ['only' =>['finalizar', 'lista']]);
    }

    public function index(Request $request) {
    	$this->itensCarrinho = $request->session()->get('carrinho');	
    	
    	return view('pedido.carrinho')->with('itens', sizeof($this->itensCarrinho) > 0 ? $this->itensCarrinho : null)->with('total', $this->calcularTotalCarrinho());
    }

    public function finalizar(Request $request) {

      $this->itensCarrinho = $request->session()->get('carrinho');
      //date('d/m/y') 
      $pedido = new Pedido;
      $pedido->data_pedido = date('d/m/y');
      $pedido->valor = $this->calcularTotalCarrinho();
      $pedido->estado = "Aguardando Pagamento";
      $pedido->user_id = 1; // ainda falta pegar o id do usuario atual logado no sistema
      $pedido->save();

      $livros = array();

      foreach ($this->itensCarrinho as $item) {
        array_push($livros, $item["id"]);
      }

      $pedido->livros()->sync($livros);
      $request->session()->forget('carrinho');

      return view('pedido.finalizado')->with('dadosPedido', 'teste');
    }

    public function lista() {
      //dd(Pedido::where('user_id', 1)->get()->first()->id);
    	return view('pedido.listagem')->with('categorias', Categoria::all())->with('pedidos', Pedido::where('user_id', Auth::user()->id)->get());
    }

    public function carrinho(Request $request, $id) {
    	$produto = Livro::find($id);
    	$produtoAdicionado = ['id' => $produto->id, 'nome' => $produto->nome, 'valor' => $produto->valor, 'quantidade' => 1, 'subtotal' => $produto->valor];

    	 $jaTem = $this->buscarItemCarrinho($request, $id) == 0 ? true : false;
       
       	$this->itensCarrinho = $request->session()->get('carrinho');
       	
       
       	if ($jaTem) {
       		$request->session()->push('carrinho', $produtoAdicionado);
       	}
       	
       	$this->itensCarrinho = $request->session()->get('carrinho');

    	return view('pedido.carrinho')->with('itens', $this->itensCarrinho)->with('total', $this->calcularTotalCarrinho());
    }

    public function excluir(Request $request, $id) {
      
    	$this->itensCarrinho = $request->session()->get('carrinho');
      
      foreach ($this->itensCarrinho as $key => $value) {
        if ($value['id'] == $id) {
          unset($this->itensCarrinho[$key]);
        }
      }
        
      
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

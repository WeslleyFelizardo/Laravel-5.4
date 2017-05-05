@extends('layout.principal');

<div class="center">

@section('conteudo')

@if($itens != null)
	<table class="table table-hover">
		<tr>
			<th>Produto</th>
			<th>Preço unitário</th>
			<th>Quantidade</th>
			<th>Subtotal</th>
			<th>Excluir</th>
		</tr>
		@foreach($itens as $item)
		<tr>
			<td>{{$item["nome"]}}</td>
			<td>{{number_format($item["valor"], 2, ',', '.')}}</td>
			<td>
				<div class="col-sm-5">
					<input value="1" min="1" class="form-control sm" type="number" name="quantidade" />
				</div>
			</td>
			<td>{{number_format($item["subtotal"], 2, ',', '.')}}</td>
			<td>
				<a href="/carrinho/remover/{{$item["id"]}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
			</td>
		</tr>
		@endforeach
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td>Total</td>
			<td>{{  'R$ '.number_format($total, 2, ',', '.') }}</td>
		</tr>
	</table>
</div>
<div class="container">
<div class="row">
	
	<div class="col-md-12">
		<a href="/" class="btn btn-info">Continuar Comprando</a>
		<a href="/pedido/finalizar" class="btn btn-success">Finalizar Compra</a>
	</div>
</div>
</div>
@else
	<div class="text-center">
		<a class="btn btn-warning" href="/">Ir as compras</a>
	</div>
@endif
@stop
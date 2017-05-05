@extends('layout.principal')

@section('conteudo')

	<table class="table table-hover">
		<tr>
			<td>Numero do pedido</td>
			<td>Data</td>
			<td>Status</td>
			<td></td>
		</tr>
		@foreach($pedidos as $pedido)
			<tr>
				<td>{{ $pedido->id }}</td>
				<td>{{ $pedido->data_pedido }}</td>
				<td>{{ $pedido->estado }}</td>
				<td><a>Detalhes</a></td>
			</tr>
		@endforeach
	</table>

@stop
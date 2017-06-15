 @extends('layout.principal')
 @section('conteudo')

<div class="row">
	<div class="col-md-6">
		<h2>Manutenção de Livros</h2>	
		<a class="btn btn-success">Novo</a>
	</div>
</div>
<br>

<table class="table">
	<tr>
		<th>Id</th>
		<th>Nome</th>
		<th>Valor</th>
		<th>Quantidade</th>
		<th>Categoria</th>
	</tr>
	@foreach($livros as $livro)
	<tr>
		<td>{{ $livro->id }}</td>
		<td>{{ $livro->nome }}</td>
		<td>{{ $livro->valor }}</td>
		<td>{{ $livro->quantidade }}</td>
		<td>{{ $livro->categoria->nome }}</td>
		<td>
			<a href="" class="btn btn-warning">Editar</a>
			<a href="" class="btn btn-danger">Excluir</a>
		</td>
	</tr>
	@endforeach
</table>


 @stop
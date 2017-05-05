@extends('layout.principal')

@section('conteudo')

<h3>Venha ser nosso cliente</h3>
<hr/>
<form>
  <div class="form-group">
	 <label for="exampleInputEmail1">Nome</label>
	 <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" id="password" placeholder="Senha">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirmar Senha</label>
    <input type="password" class="form-control" id="password" placeholder="Senha">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Endereço</label>
    <input type="text" class="form-control" id="endereco" placeholder="Endereço">
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>

@stop
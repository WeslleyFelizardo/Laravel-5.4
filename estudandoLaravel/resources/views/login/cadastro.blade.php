@extends('layout.principal')

@section('conteudo')

<h3>Venha ser nosso cliente</h3>
<hr/>
<form action="/user/inserir" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="permissao_id" value="1">
  <div class="form-group">
	 <label for="exampleInputEmail1">Nome</label>
	 <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Senha</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Senha">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirmar Senha</label>
    <input type="password" class="form-control" name="confirmarSenha" id="password" placeholder="Senha">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Endereço</label>
    <input type="text" class="form-control" name="endereco" id="endereco" placeholder="Endereço">
  </div>

  <div class="text-center">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>
</form>

@stop
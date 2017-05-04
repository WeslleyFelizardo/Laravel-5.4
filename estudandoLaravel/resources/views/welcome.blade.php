 @extends('layout.principal')
 @section('conteudo')
                <div class="row">
                @if($livros != null)
                @foreach($livros as $livro)
                     <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <img src="http://placehold.it/320x150" alt="">
                            <div class="caption">
                                <h4 class="pull-right">${{ $livro->valor }}</h4>
                                <h4><a href="#">{{ $livro->nome }}</a>
                                </h4>
                                <p>{{ $livro->descricao }}</p>
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <br><br>
                                    <a href="/carrinho/{{$livro->id}}" class="btn btn-primary btn-sm">Comprar</a>
                                </p>
                            </div>                         
                        </div>
                    </div>
                @endforeach
                @endif
                </div>
                
@stop
  
@extends('layout/principal')

@section('conteudo')

    @if(empty($produtos))
        <div>Você não tem nenhum produto cadastrado</div>

    @else    
        <h1>Listagem de produtos</h1>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <th>Nome</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <th colspan="3">Ações</th>
            </thead>
            @foreach ($produtos as $p)
                <tr>
                    <td>{{$p->nome}}</td>
                    <td>{{$p->valor}}</td>
                    <td>{{$p->descricao}}</td>
                    <td>{{$p->quantidade}}</td>
                    <td>
                        <a href="{{action('ProdutoController@mostra', $p->id)}}">
                           Detalhes     
                        </a>
                    </td>
                    <td>
                        <a href="{{action('ProdutoController@remove', $p->id)}}">
                            Remover
                        </a>
                    </td>
                    <td>
                        <a href="{{action('ProdutoController@altera', $p->id)}}">
                            Alterar
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif

    @if(old('nome'))
        <div class="alert alert-sucess">
            <strong>Sucesso!</strong> o produto {{old('nome')}} foi adicionado!
        </div>
    @endif
 @stop
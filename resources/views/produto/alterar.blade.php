@extends('layout.principal')

@section('conteudo')
<h1>Alterar produto</h1>

<form action="/produtos/alteraDado/{{$p->id}}" method="post">

<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />

    <div class="form-group">
        <label>Nome: </label>
        <input class="form-control" name="nome" value="{{$p->nome}}"/>
    </div>

    <div class="form-group">
        <label>Descrição</label>
        <input class="form-control" name="descricao" value="{{$p->descricao}}"/>
    </div>

    <div class="form-group">
        <label>Valor: </label>
        <input class="form-control" name="valor" value="{{$p->valor}}"/>
    </div>

    <div class="form-group">
        <label>Quantidade: </label>
        <input type="number" class="form-control" name="quantidade" value="{{$p->quantidade}}"/>
    </div>

    <button type="submit" class="btn btn-primary btn-block">Alterar</button>
</form>

@stop


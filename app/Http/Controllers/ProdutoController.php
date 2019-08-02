<?php

namespace estoque\Http\Controllers;

use Request;
use estoque\Http\Requests\ProdutosRequest;
use estoque\Produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller {
    
    public function lista(){
        //$produtos = DB::select('select * from produtos');
        
        $produtos = Produto::all();
        if(view()->exists('produto.listagem')){
            return view('produto.listagem')->withProdutos($produtos);
        }
    }

    public function mostra($id){

        //$id = Request::route('id');//Request::input('id', '0');

        //$resposta = DB::select('select * from produtos where id=?', [$id]);
        $resposta = Produto::findOrFail($id);
        if(empty($resposta)){
            return 'Esse produto não existe';
        } else {
            if(view()->exists('produto.detalhes')){
                return view('produto.detalhes')->withP($resposta);
            }
    
        }   
    }

    public function novo(){
        return view('produto.formulario');
    }

    public function adiciona(ProdutosRequest $request){

        /*$nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $quantidade = Request::input('quantidade');

        DB::insert('insert into produtos(nome, valor, descricao, quantidade)values(?,?,?,?)',
        array($nome,$valor,$descricao,$quantidade));*/

        
        Produto::create($request->all());
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function remove($id){
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->action('ProdutoController@lista');
    }

    public function altera($id){
        $produto = Produto::findOrFail($id);
        return view('produto.alterar')->withP($produto);
    }

    public function alteraDado(Request $request, $id){
        Produto::findOrFail($id)->update($request->all());
        return redirect()->action('ProdutoController@lista');
    }
}

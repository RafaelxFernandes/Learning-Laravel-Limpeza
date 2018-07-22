<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    public function criarProduto(Request $request){

    	$novoProduto = new Produto;

    	$novoProduto->codigo = $request->codigo;
    	$novoProduto->quantidade = $request->quantidade;
    	$novoProduto->nome = $request->nome;
    	$novoProduto->preco = $request->preco;
    	$novoProduto->categoria_id = $request->categoria_id;

    	$novoProduto->save();
    	
    	return response()->json(['Produto criado com sucesso!']);
    }

    public function getProduto($id){

    	$produto = Produto::findorfail($id);

    	return response()->json([$produto]);
    }

    public function atualizarProduto(Request $request, $id){

		$produto = Produto::findorfail($id);

		if($request->codigo){
			$produto->codigo = $request->codigo;
		}

		if($request->quantidade){
			$produto->quantidade = $request->quantidade;
		}

		if($request->nome){
			$produto->nome = $request->nome;
		}

		if($request->preco){
			$produto->preco = $request->preco;
		}

		if($request->categoria_id){
			$produto->categoria_id = $request->categoria_id;
		}

		$produto->save();

		return response()->json(['Produto atualizado com sucesso!']);
    }

    public function deletarProduto($id){

    	Produto::destroy($id);

    	return response()->json(['Produto deletado com sucesso!']);
    }
}
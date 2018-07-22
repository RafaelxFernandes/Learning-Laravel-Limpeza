<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;

class PedidoController extends Controller
{
    public function criarPedido(Request $request){

    	$novoPedido = new Pedido;

    	$novoPedido->codigo = $request->codigo;
    	$novoPedido->quantidade = $request->quantidade;
    	$novoPedido->data = $request->data;
    	$novoPedido->produto_id = $request->produto_id;
    	$novoPedido->produto_quantidade = $request->produto_quantidade;

    	$novoPedido->save();

    	return response()->json(['Pedido criado com sucesso!']);
    }

    public function getPedido($id){

    	$pedido = Pedido::findorfail($id);

    	return response()->json([$pedido]);
    }

    public function atualizarPedido(Request $request, $id){

    	$pedido = Pedido::findorfail($id);

    	if($request->codigo){
    		$pedido->codigo = $request->codigo;
    	}

    	if($request->quantidade){
    		$pedido->quantidade = $request->quantidade;
    	}

    	if($request->data){
    		$pedido->data = $request->data;
    	}

    	if($request->produto_id){
    		$pedido->produto_id = $request->produto_id;
    	}

    	if($request->produto_quantidade){
    		$pedido->produto_quantidade = $request->produto_quantidade;
    	}

    	$pedido->save();

    	return response()->json(['Pedido atualizado com sucesso!']);
    }

    public function deletarPedido($id){

    	Pedido::destroy($id);
    	
    	return response()->json(['Pedido deletado com sucesso!']);
    }
}
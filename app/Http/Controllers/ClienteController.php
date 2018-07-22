<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClienteController extends Controller
{
    public function criarCliente(Request $request){

    	$novoCliente = new Cliente;

    	$novoCliente->codigo = $request->codigo;
    	$novoCliente->nome = $request->nome;
    	$novoCliente->endereco = $request->endereco;
    	$novoCliente->telefone = $request->telefone;
    	$novoCliente->limiteCredito = $request->limiteCredito;

        if($request->status){
            $novoCliente->status = $request->status;
        }

    	$novoCliente->save();

    	return response()->json(['Cliente criado com sucesso!']);
    }

    public function getCliente($id){

    	$cliente = Cliente::findorfail($id);

    	return response()->json([$cliente]);
    }

    public function atualizarCliente(Request $request, $id){

    	$cliente = Cliente::findorfail($id);

    	if($request->codigo){
    		$cliente->codigo =  $request->codigo;
    	}

    	if($request->nome){
    		$cliente->nome =  $request->nome;
    	}

    	if($request->endereco){
    		$cliente->endereco =  $request->endereco;
    	}

    	if($request->telefone){
    		$cliente->telefone =  $request->telefone;
    	}

    	if($request->status){
    		$cliente->status =  $request->status;
    	}

    	if($request->limiteCredito){
    		$cliente->limiteCredito =  $request->limiteCredito;
    	}

    	$cliente->save();

    	return response()->json(['Cliente atualizado com sucesso!']);
    }

    public function deletarCliente($id){

    	Cliente::destroy($id);

    	return response()->json(['Cliente deletado com sucesso!']);    	
    }
}
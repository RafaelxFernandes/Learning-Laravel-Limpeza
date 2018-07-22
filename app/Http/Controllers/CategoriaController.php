<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;

class CategoriaController extends Controller
{
    public function criarCategoria(Request $request){

    	$novoCategoria = new Categoria;

    	$novoCategoria->codigo = $request->codigo;
    	$novoCategoria->nome = $request->nome;

    	$novoCategoria->save();
    	
    	return response()->json(['Categoria criada com sucesso!']);
    }

    public function getCategoria($id){

    	$categoria = Categoria::findorfail($id);

    	return response()->json([$categoria]);
    }

    public function atualizarCategoria(Request $request, $id){

    	$categoria = Categoria::findorfail($id);

    	if($request->codigo){
    		$categoria->codigo = $request->codigo;
    	}

    	if($request->nome){
    		$categoria->nome = $request->nome;
    	}

    	$categoria->save();

    	return response()->json(['Categoria atualizada com sucesso!']);
    }

    public function deletarCategoria($id){

    	Categoria::destroy($id);

     	return response()->json(['Categoria deletada com sucesso!']);   	
    }
}
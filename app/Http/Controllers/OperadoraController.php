<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Operadora;

class OperadoraController extends Controller{
    
    //Rota de criação de nova operadora
    public function create(Request $request){
      $operadora = new Operadora();
      $operadora->operadora = $request->operadora;
      $operadora->descricao = $request->descricao;
      $operadora->status = $request->status;
      $operadora->save();
    
      return response($operadora->jsonSerialize(), Response::HTTP_CREATED);
    }
    
    //Rota de busca de todas as operadoras
    public function index(){
        return response(Operadora::all()->jsonSerialize(), Response::HTTP_OK);
    }

    //Rota de atualização das operadoras recebendo id como parâmetro
    public function update(Request $request, $id){
        $operadora = Operadora::findOrFail($id);
        $operadora->status = $request->status;
        $operadora->descricao = $request->descricao;
        $operadora->operadora = $request->operadora;
        
        $operadora->save();
        return response(null, Response::HTTP_OK);
    }

    //Rota de deleção de registro recebendo id como parâmetro
    public function destroy($id){
        Operadora::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}

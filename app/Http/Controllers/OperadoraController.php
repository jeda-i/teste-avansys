<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Faker\Generator; //remover importação
use App\Models\Operadora;

class OperadoraController extends Controller
{
    public function create(Generator $faker){
      $operadora = new Operadora();
      $operadora->operadora = $faker->lexify('????????');
      $operadora->status = $faker->boolean ? 'red' : 'green';
      $operadora->save();
    
      return response($operadora->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function index(){
        return response(Operadora::all()->jsonSerialize(), Response::HTTP_OK);
    }

    public function update(Request $request, $id){
        $operadora = Operadora::findOrFail($id);
        $operadora->status = $request->status;
        $operadora->operadora = $request->operadora;
        
        $operadora->save();
        return response(null, Response::HTTP_OK);
    }

    public function destroy($id){
        Operadora::destroy($id);

        return response(null, Response::HTTP_OK);
    }
}
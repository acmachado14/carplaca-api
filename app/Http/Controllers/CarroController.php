<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
    public function index() {

        return Carro::all();
    }


    public function store(Request $request)
    {
        return response()
            ->json(
                Carro::create($request->all()),
                201
            );
    }
  
    public function show(int $id)
    {
        $Carro = Carro::find($id);
        if (is_null($Carro)) {
            return response()->json('', 204);
        }
    
        return response()->json($Carro);
    }
    
    public function update(int $id, Request $request)
    {
        $Carro = Carro::find($id);
        if (is_null($Carro)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
        $Carro->fill($request->all());
        $Carro->save();
    
        return $Carro;
    }
    
    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = Carro::destroy($id);
        if ($qtdRecursosRemovidos === 0) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
    
        return response()->json('', 204);
    }

}
<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debito;

class DebitoController extends Controller
{
    public function index() {

        return Debito::all();
    }


    public function store(Request $request)
    {
        return response()
            ->json(
                Debito::create($request->all()),
                201
            );
    }
  
    public function show(int $id)
    {
        $Debito = Debito::find($id);
        if (is_null($Debito)) {
            return response()->json('', 204);
        }
    
        return response()->json($Debito);
    }
    
    public function update(int $id, Request $request)
    {
        $Debito = Debito::find($id);
        if (is_null($Debito)) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
        $Debito->fill($request->all());
        $Debito->save();
    
        return $Debito;
    }
    
    public function destroy(int $id)
    {
        $qtdRecursosRemovidos = Debito::destroy($id);
        if ($qtdRecursosRemovidos === 0) {
            return response()->json([
                'erro' => 'Recurso não encontrado'
            ], 404);
        }
    
        return response()->json('', 204);
    }

}
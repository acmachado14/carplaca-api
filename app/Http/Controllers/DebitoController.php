<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Debito;

class DebitoController extends Controller
{
    public function __construct()
    {
        $this->classe = Debito::class;
    }

    public function DebitosPorCarro(int $cdCarro)
    {
    $debitos = Debito::query()
        ->where('cdCarro', $cdCarro)
        ->get();

    return $debitos;
}
}
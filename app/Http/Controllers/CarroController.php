<?php
namespace App\Http\Controllers;


use App\Models\Carro;

class CarroController extends Controller
{
    public function __construct()
    {
        $this->classe = Carro::class;
    }
}
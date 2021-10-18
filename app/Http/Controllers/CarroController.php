<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
    public function __construct()
    {
        $this->classe = Carro::class;
    }
}
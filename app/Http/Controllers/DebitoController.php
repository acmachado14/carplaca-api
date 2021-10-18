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
}
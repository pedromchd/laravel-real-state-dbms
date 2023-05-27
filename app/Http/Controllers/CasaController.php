<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
  public function home()
  {
    $casas = Casa::all();
    return view('home', ['casas' => $casas]);
  }
}

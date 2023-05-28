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

  public function adicionar()
  {
    return view('adicionar');
  }

  public function adicionarCasa(Request $request)
  {
    $data = $request->all();
    Casa::create([
      'imobiliaria' => $data['imobiliaria'],
      'endereco' => $data['endereco'],
      'preco' => $data['preco'],
      'situacao' => $data['situacao']
    ]);
    return redirect('/');
  }

  public function editar($id)
  {
    $casa = Casa::find($id);
    return view('editar', ['casa' => $casa]);
  }

  public function editarCasa($id, Request $request)
  {
    $data = $request->all();
    Casa::find($id)->update([
      'imobiliaria' => $data['imobiliaria'],
      'endereco' => $data['endereco'],
      'preco' => $data['preco'],
      'situacao' => $data['situacao']
    ]);
    return redirect('/');
  }

  public function deletarCasa($id)
  {
    Casa::find($id)->delete();
    return redirect('/');
  }
}

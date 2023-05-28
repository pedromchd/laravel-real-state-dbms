<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
  public function homeView() {
    $casas = Casa::all();
    return view('home', compact('casas'));
  }

  public function pesquisarCasas(Request $request) {
    $query = $request->input('q');
    $casas = Casa::where('imobiliaria', 'LIKE', "%$query%")->orWhere('endereco', 'LIKE', "%$query%")->get();
    return view('home', compact('casas', 'query'));
  }

  public function adicionarView() {
    return view('adicionar');
  }

  public function adicionarCasa(Request $request) {
    Casa::create([
      'imobiliaria' => $request->imobiliaria,
      'endereco' => $request->endereco,
      'preco' => $request->preco,
      'situacao' => $request->situacao
    ]);
    return redirect('/');
  }

  public function editarView($id) {
    $casa = Casa::find($id);
    return view('editar', compact('casa'));
  }

  public function editarCasa($id, Request $request) {
    Casa::find($id)->update([
      'imobiliaria' => $request->imobiliaria,
      'endereco' => $request->endereco,
      'preco' => $request->preco,
      'situacao' => $request->situacao
    ]);
    return redirect('/');
  }

  public function deletarCasa($id) {
    Casa::find($id)->delete();
    return redirect('/');
  }
}

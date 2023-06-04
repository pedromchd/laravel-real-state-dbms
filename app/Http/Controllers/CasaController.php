<?php

namespace App\Http\Controllers;

use App\Models\Casa;
use Illuminate\Http\Request;

class CasaController extends Controller
{
  public function homeView(Request $request) {
    $query = $request->input('q', '');
    $orderBy = $request->input('order_by', 'id');
    $orderDirection = $request->input('order_direction', 'asc');
    $casas = Casa::where('imobiliaria', 'LIKE', "%$query%")->orWhere('endereco', 'LIKE', "%$query%")->orderBy($orderBy, $orderDirection)->get();
    $status = $request->input('status', '3');
    if ($status !== '3') {
      $casas = $casas->where('situacao', $status);
    }
    $maisCara = $casas->where('situacao', '!=', '0');
    if ($maisCara->isNotEmpty()) {
      $maisCara = $maisCara->sortByDesc('preco')->first()->id;
    } else {
      $maisCara = '';
    }
    return view('home', compact('casas', 'maisCara', 'query', 'status', 'orderBy', 'orderDirection'));
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

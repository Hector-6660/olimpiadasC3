<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Resultado;
use Illuminate\Http\Request;

class ResultadoController extends Controller
{
    public function index()
    {
        $resultados = Resultado::all();
        return view('admin.resultados.index', compact('resultados'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.resultados.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'palmares' => 'required',
        ]);

        Resultado::create([
            'id' => $request->id,
            'palmares' => $request->palmares,
        ]);

        return redirect()->route('resultados.index')->with('success', 'Resultado creado correctamente.');
    }

    public function edit(Resultado $resultado)
    {
        $categorias = Categoria::all();
        return view('admin.resultados.edit', compact('resultado', 'categorias'));
    }

    public function update(Request $request, Resultado $resultado)
    {
        $request->validate([
            'id' => 'required',
            'palmares' => 'required',
        ]);

        $resultado->id = $request->id;
        $resultado->palmares = $request->palmares;
        $resultado->save();

        return redirect()->route('resultados.index')->with('success', 'Resultado actualizado correctamente.');
    }

    public function destroy(Resultado $resultado)
    {
        $resultado->delete();

        return redirect()->route('resultados.index')->with('success', 'Resultado eliminado correctamente.');
    }
}

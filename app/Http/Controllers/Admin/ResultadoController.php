<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.resultados.create', compact('patrocinadores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'palmares' => 'required',
        ]);

        Resultado::create([
            'palmares' => $request->palmares,
        ]);

        return redirect()->route('resultados.index')->with('success', 'Resultado creado correctamente.');
    }

    public function edit(Resultado $resultado)
    {
        return view('admin.resultados.edit', compact('resultado'));
    }

    public function update(Request $request, Resultado $resultado)
    {
        $request->validate([
            'palmares' => 'required',
        ]);

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

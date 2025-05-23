<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Grupo;
use Illuminate\Http\Request;

class GrupoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grupos = Grupo::all();
        return view('admin.grupos.index', ['grupos' => $grupos]);
    }

    /**
     * Display one resource.
     */
    public function show(Grupo $grupo)
    {
        return view('admin.grupos.show', compact('grupo'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        return view('admin.grupos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        Grupo::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('grupos.index')->with('success', 'Grupo creado correctamente.');
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(Grupo $grupo)
    {
        return view('admin.grupos.edit', compact('grupo'));
    }
    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Grupo $grupo){
        $request->validate([
            'nombre' => 'required|max:100',
        ]);

        $grupo->nombre = $request->nombre;
        $grupo->save();

        return redirect()->route('grupos.index')->with('success', 'Grupo actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();
        return redirect()->route('grupos.index')->with('success', 'Grupo eliminado correctamente.');
    }

}

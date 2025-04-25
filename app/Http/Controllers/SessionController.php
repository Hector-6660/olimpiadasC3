<?php

namespace App\Http\Controllers;

use App\Models\Edicion;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function setEdicion(Request $request)
    {
        $edicion = Edicion::findOrFail($request->input('edicion_id'));
        session(['edicion' => $edicion]);
        return redirect()->route('home');
    }
}

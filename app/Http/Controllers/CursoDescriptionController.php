<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoDescriptionController extends Controller
{
    public function show($curso)
    {
        if(session('authenticated')){
            return view('vistas.view_cursos.curso_description', compact('curso'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
}

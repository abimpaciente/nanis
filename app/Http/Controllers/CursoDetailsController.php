<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoDetailsController extends Controller
{
    public function index()
    {
        if(session('authenticated')){
            return view('vistas.view_cursos.curso_details');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
}

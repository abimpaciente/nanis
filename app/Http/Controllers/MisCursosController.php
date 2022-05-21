<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MisCursosController extends Controller
{
    public function index()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.mis_cursos');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
}

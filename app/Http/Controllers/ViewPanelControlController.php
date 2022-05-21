<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class ViewPanelControlController extends Controller
{
    public function index(){

        if(session('authenticated')){
           return redirect()->route('dashboard');
       }
       return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

   public function store(Request $request){
        $usuario = Usuario::where('id', session('id'))->where('status', '1')->get();
        if(session('authenticated') && $usuario->count()){
            switch ($request->view) 
            {
                case 'mis_datos':
                    return $this->MisDatos();
                break;
                case 'mis_materias':
                    return $this->MisMaterias();
                break;
                case 'mi_historial_academico':
                    return $this->HistorialAcademico();
                break;
                case 'mis_pagos':
                    return $this->Pagos();
                break;
                case 'mi_directorio_escolar':
                    return $this->DirectorioEscolar();
                break;
                case 'materias_cursos':
                    return $this->MateriasCrusos();
                break;
            }
        }else{
            return view('login'); 
        }
    }
    public function MisDatos()
    {
        if(session('authenticated')){
            return view('vistas.subvistas_dashboard.panel_control.mis_datos');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function MisMaterias()
    {
        if(session('authenticated')){
            return view('vistas.subvistas_dashboard.panel_control.mis_materias');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function HistorialAcademico()
    {
        if(session('authenticated')){
            return view('vistas.subvistas_dashboard.panel_control.historial_academico');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function Pagos()
    {
        if(session('authenticated')){
            return view('vistas.subvistas_dashboard.panel_control.pagos');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function DirectorioEscolar()
    {
        if(session('authenticated')){
            return view('vistas.subvistas_dashboard.panel_control.directorio_escolar');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function MateriasCrusos()
    {
        if(session('authenticated')){
            return view('vistas.subvistas_dashboard.panel_control.materias_cursos');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }    
}

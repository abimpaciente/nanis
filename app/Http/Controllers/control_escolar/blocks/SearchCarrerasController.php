<?php

namespace App\Http\Controllers\control_escolar\blocks;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use Illuminate\Http\Request;

class SearchCarrerasController extends Controller
{
    public function index()
    {
        return "esto";
    }
    public function store(Request $request)
    {
        $usuarioUpdate = Carrera::where('clave', $request->clave_carrera)->where('nombre_carrera', $request->nombre_carrera)->get();
        $response = "";
        if($usuarioUpdate->count()==0 && $request->clave_carrera!=''){
            
            $valuesUsuario = array(
                'foto' => '',
                'clave' => $request->clave_carrera,
                'nombre_carrera' => $request->nombre_carrera,
                'descripcion' => $request->descripcion_carrera,
                'area' =>  $request->area,
                'semestres' => $request->semestres
                );

            Carrera::create($valuesUsuario);            

            $lastID =  Carrera::orderBy('id', 'desc')->take(1)->first();

            $target_path = "uploads/carreras/".$lastID->id;
            $target_path = str_replace(' ', '', $target_path);
            if (!file_exists($target_path)) 
            {
                mkdir($target_path, 0777, true);
            }

            $filepath = "";
            if ($request->file('foto')) {
                
                $file = $request->file('foto');
                $name = $file->getClientOriginalName();

                $filename = $lastID->id.'_foto.'.$file->getClientOriginalExtension();
                // File upload location
                // Upload file
                $file->move($target_path,$filename);                
                // File path
                $filepath = url($target_path.'/'.$filename);   
            }
            $usuarioUpdate = Carrera::where('id', $lastID->id)
                ->update(array(
                    'foto' => $filepath,
                ));

            if($usuarioUpdate){
                $response = "Carrera guardada con exito";
            }
            
            return $response;

        }else{
            if($request->clave_carrera!=''){
                $response = "Ya existe este carrera registrada";
            }else{
                $response = "falta clave de carrera";
            }
        }               
    
        return $response;  
    }

    public function actualizarCarrera(Request $request)
    {
        $response = "";
        $alumnosCheck= Carrera::where('id', $request->id_carrera)->get();
        if($alumnosCheck->count()>0){
            $filepath = "";
            if ($request->file('foto')) {
                $target_path = "uploads/carreras/".$request->id_carrera;
                $target_path = str_replace(' ', '', $target_path);
                if (!file_exists($target_path)) 
                {
                    mkdir($target_path, 0777, true);
                }

                $file = $request->file('foto');
                $filename = $request->id_carrera.'_foto.'.$file->getClientOriginalExtension();
                // Upload file
                $file->move($target_path,$filename);                
                // File path
                $filepath = url($target_path.'/'.$filename);   
            }
            $valuesUsuario = array(
                'foto' => $filepath,
                'clave' => $request->clave_carrera,
                'nombre_carrera' => $request->nombre_carrera,
                'descripcion' => $request->descripcion_carrera,
                'area' =>  $request->area,
                'semestres' => $request->semestres
                );
            $usuarioUpdate = Carrera::where('id', $request->id_carrera)
                ->update($valuesUsuario);
            
            if($usuarioUpdate=="1"){
                $response = "Actualizado con exito!";
            }else{
                $response = "Fallo la actualización";
            }
        }else{
            $response = "No existe la carrera";
        }
        
        return $response;
    }

    public function editModal(Request $request)
    {
        $id_carrera = $request->id_carrera;
        $carreras = Carrera::where('id', $id_carrera)->get(); 
        return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.modal_edit_carrera', compact('carreras'));
    } 
    public function addModal()
    {
        return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.modal_add_carrera');
    } 
}

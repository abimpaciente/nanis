<?php

namespace App\Http\Controllers\control_escolar\blocks;

use App\Http\Controllers\Controller;
use App\Mail\NewDocente;
use App\Models\Docente;
use App\Models\Usuario;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Mail;

class SearchDocentesController extends Controller
{
    public function index()
    {
        return "esto";
    }
    public function store(Request $request)
    {
        $faker = Faker::create();

        $usuarioUpdate = Usuario::where('correo', $request->email)->get();
        $response = "";
        if($usuarioUpdate->count()==0 && $request->email!=''){
            
            $valuesUsuario = array(
                'foto' => '',
                'correo' => $request->email,
                'password' => $request->password,
                'tipo' => 'Docente',
                'token' =>  Str::random(32),
                'status' => '1'
                );

            $usuarioInsert = Usuario::create($valuesUsuario);
            if($usuarioInsert){
                $response = "Usuario guardado";
            }
            $valuesDocente = array(
                'nombre' => $request->nombre,
                'apellidoP' => $request->apellidoP,
                'apellidoM' => $request->apellidoM,
                'clave_profesional' => $request->clave_profesional,
                'genero' => $request->genero,
                'estado_civil' => $request->estado_civil,
                'cedula_fiscal' => $request->cedula_fiscal,
                'nss' => $request->nss,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'fecha_ingreso' => $request->fecha_ingreso,
                'telefono' => $request->telefono
                );

            $docenteInsert = Docente::create($valuesDocente);

            $lastID =  Usuario::orderBy('id', 'desc')->take(1)->first();

            $target_path = "uploads/".$lastID->id;
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
            $usuarioUpdate = Usuario::where('id', $lastID->id)
                ->update(array(
                    'foto' => $filepath,
                ));

            if($docenteInsert){
                $response .= " y docente guardado";

                //$carrera = Carrera::get();
                $data = [
                    'saludo' => 'Hola, '.$request->nombre,
                    'message' => 'Bienvenido a Campus Aula Virtual, a partir de hoy ya puedes tener acceso a tus clases e información relevante de tu estancia educacional.'
                ];        
                Mail::to($request->email)->send(new NewDocente($data));
            }
            
            return $response;

        }else{
            if($request->email!=''){
                $response = "Ya existe este correo registrado";
            }else{
                $response = "falta correo";
            }
        }               
    
        return $response;  
    }

    public function actualizarDocente(Request $request)
    {
        $response = "";
        $alumnosCheck= Docente::where('id', $request->id)->get();
        if($alumnosCheck->count()>0){
            $filepath = "";
            if ($request->file('foto')) {
                $target_path = "uploads/".$request->id;
                $target_path = str_replace(' ', '', $target_path);
                if (!file_exists($target_path)) 
                {
                    mkdir($target_path, 0777, true);
                }

                $file = $request->file('foto');
                $filename = $request->id.'_foto.'.$file->getClientOriginalExtension();
                // Upload file
                $file->move($target_path,$filename);                
                // File path
                $filepath = url($target_path.'/'.$filename);   
            }
            $valuesUsuario = array(
                'foto' => $filepath,
                'correo' => $request->email,
                'password' => $request->password
                );
            $usuarioUpdate = Usuario::where('id', $request->id)
                ->update($valuesUsuario);

            $valuesDocente = array(
                    'nombre' => $request->nombre,
                    'apellidoP' => $request->apellidoP,
                    'apellidoM' => $request->apellidoM,
                    'clave_profesional' => $request->clave_profesional,
                    'genero' => $request->genero,
                    'estado_civil' => $request->estado_civil,
                    'cedula_fiscal' => $request->cedula_fiscal,
                    'nss' => $request->nss,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'fecha_ingreso' => $request->fecha_ingreso,
                    'telefono' => $request->telefono
                    );
            $docenteUpdate = Docente::where('id', $request->id)
                ->update($valuesDocente);
            
            if($usuarioUpdate=="1" && $docenteUpdate=="1"){
                $response = "Actualizado con exito!";
            }else{
                $response = "Fallo la actualización";
            }
        }else{
            $response = "No existe el docente";
        }
        
        return $response;
    }

    public function autosearch(Request $request)
    {
        $term = $request->busqueda;
        if($term){
        $docentes = Usuario::join('docente', 'usuario.id', '=', 'docente.id')
            ->where('docente.nombre', 'like', '%' . $term . '%')
            ->orWhere('usuario.correo', 'like', '%' . $term . '%')
            ->orderBy('status', 'desc')
            ->orderBy('docente.fecha_ingreso', 'desc')
            ->get();            
            return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.view_table_docente_search', compact('docentes'));
        }else{
            $docentes = Usuario::join('docente', 'usuario.id', '=', 'docente.id')->orderBy('status', 'desc')->orderBy('docente.fecha_ingreso', 'desc')->get();
            return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.view_table_docente_search', compact('docentes'));
        }     
    }
    public function editModal(Request $request)
    {
        $id_docente = $request->id_docente;
        $docentes = Usuario::join('docente', 'usuario.id', '=', 'docente.id')->where('usuario.id', $id_docente)->get();

        return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.modal_edit_docente', compact('docentes'));
    }
    public function addModal()
    {
        return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.modal_add_docente');
    } 
}

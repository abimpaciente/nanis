<?php

namespace App\Http\Controllers\control_escolar\blocks;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Usuario;
use App\Models\Carrera;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAlumnoMail;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Artisan;

class SearchOrdenesController extends Controller
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
            
            

            $usuarioInsert = Usuario::insert(array(
            'foto' => '',
            'correo' => $request->email,
            'password' => $request->password,
            'tipo' => 'Orden',
            'token' =>  Str::random(32),
            'status' => '1'
            ));
            if($usuarioInsert){
                $response = "Usuario guardado";
            }

            $ordenInsert = Orden::insert(array(
                'matricula' => $faker->unique()->numerify('##########'),
                'nombre' => $request->nombre,
                'apellidoP' => $request->apellidoP,
                'apellidoM' => $request->apellidoM,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'fecha_ingreso' => $request->fecha_ingreso,
                'telefono' => $request->telefono,
                'id_carrera' => $request->carrera
            ));

            

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

            if($ordenInsert){
                $response .= " y orden guardado";

                //$carrera = Carrera::get();
                $data = [
                    'saludo' => 'Hola, '.$request->nombre,
                    'message' => 'Bienvenido a Campus Aula Virtual, a partir de hoy ya puedes tener acceso a tus clases e información relevante de tu estancia educacional.'
                ];        
                Mail::to($request->email)->send(new NewOrdenMail($data));
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
    public function actualizarOrden(Request $request)
    {
        $response = "";
        $ordenesCheck= Orden::where('id', $request->id)->get();
        if($ordenesCheck->count()>0){
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
                // File extension
                $extension = $file->getClientOriginalExtension();
                // File upload location
                // Upload file
                $file->move($target_path,$filename);                
                // File path
                $filepath = url($target_path.'/'.$filename);   
            }

            $usuarioUpdate = Usuario::where('id', $request->id)
                ->update(array(
                    'foto' => $filepath,
                    'correo' => $request->email,
                    'password' => $request->password,
                ));

            $ordenesUpdate = Orden::where('id', $request->id)
                ->update(array(
                    'nombre' => $request->nombre,
                    'apellidoP' => $request->apellidoP,
                    'apellidoM' => $request->apellidoM,
                    'fecha_nacimiento' => $request->fecha_nacimiento,
                    'fecha_ingreso' => $request->fecha_ingreso,
                    'telefono' => $request->telefono,
                    'id_carrera' => $request->carrera
                ));
            
            if($usuarioUpdate=="1" && $ordenesUpdate=="1"){
                $response = "Actualizado con exito!";
            }else{
                $response = "Fallo la actualización";
            }
        }else{
            $response = "No existe el orden";
        }
        
        return $response;
    }
    public function changeStatus(Request $request)
    {
        $response = "";
        $message = "";
        if($request->status=='1'){
            $message = "alta";
        }else{
            $message = "baja";
        }
        if($request->id){

            $usuarioUpdate = Usuario::where('id', $request->id)
            ->update(array(
                'status' => $request->status
            )); 
            if($usuarioUpdate){
                $response = "Dado de ".$message." con exito";
            }else{
                $response = "Error al ".$message;
            }
        }else{
            $response = "Falta usuario a da de ".$message;
        }       
        
        return $response;
    }

    public function deleteOrden(Request $request)
    {
        $response = "";
        if($request->id){
            $usuarioDelete = Usuario::where('id', $request->id)
            ->delete(); 
            $ordenUpdate = orden::where('id', $request->id)
            ->delete(); 
            if($usuarioDelete){
                $response = "Eliminado con exito";
            }else{
                $response = "Error al eliminar";
            }
        }else{
            $response = "Falta usuario a eliminar";
        }   
        return $response;
    }
    public function autosearch(Request $request)
    {
        $term = $request->busqueda;
        $carreras = Carrera::get();
        if($term){
            $ordenes = Usuario::join('ordenes', 'usuario.id', '=', 'ordenes.id')
                ->where('ordenes.nombre', 'like', '%' . $term . '%')
                ->orWhere('ordenes.matricula', 'like', '%' . $term . '%')
                ->orWhere('usuario.correo', 'like', '%' . $term . '%')
                ->orderBy('status', 'desc')
                ->orderBy('ordenes.fecha_ingreso', 'desc')
                ->get();
            return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.view_table_ordenes_search', compact('ordenes'), compact('carreras'));
        }else{
            $ordenes = Usuario::join('ordenes', 'usuario.id', '=', 'ordenes.id')->orderBy('status', 'desc')->orderBy('ordenes.fecha_ingreso', 'desc')->get();
            return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.view_table_ordenes_search', compact('ordenes'), compact('carreras'));
        }        
    }
    public function editModal(Request $request)
    {
        
        $id_orden = $request->id_orden;
        $ordenes = Usuario::join('ordenes', 'usuario.id', '=', 'ordenes.id')->where('usuario.id', $id_orden)->get();
        $carreras = Carrera::get();
        return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.modal_edit_orden', compact('ordenes'), compact('carreras'));
    }
    public function addModal()
    {
        $carreras = Carrera::get();
        return view('vistas.subvistas_dashboard.control_escolar.bloques_view_table.modal_add_orden', compact('carreras'));
    } 
}

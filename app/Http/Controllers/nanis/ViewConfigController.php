<?php

namespace App\Http\Controllers\nanis;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ViewConfigController extends Controller
{
    public function index(){

        if(session('authenticated')){
           return redirect()->route('dashboard');
       }
       return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function store(Request $request){
        if(session('authenticated')){
            switch ($request->view) 
            {
                case 'settings':
                    return $this->Config();
                break;
                case 'empleados':
                    return $this->Administrativos();
                break;
            }
        }else{
            return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
        }
    }

    public function changeStatusEmpleado(Request $request){
        
        $response = "";
        $message = "";
        if($request->status=='1'){
            $message = "alta";
        }else{
            $message = "baja";
        }
        $id = $request->id;
        $status = $request->status;
        if($request->id){            
            $response = Http::post('http://api.mundomagiconannys.com/enable_disable_personal_interno?username='.$id.'&switch='.$status);
            if($response->json()['response']){
                $response = "Dado de ".$message." con exito";
            }else{
                $response = "Error al ".$message;
            }
        }else{
            $response = "Falta empleado a da de ".$message;
        }   
                
        return $response;
    }

    public function editModalEmpleado(Request $request){
        
        $id_empleado = $request->id_empleado;
        $empleados = Http::Post('http://api.mundomagiconannys.com/get_all_personal_interno')->collect();
        $empleados = $empleados->whereIn('id', $id_empleado);

        $response = Http::Post('http://api.mundomagiconannys.com/get_list_tipo_personal_interno')->collect();
        $tipos = $response;
        
        return view('vistas.subvistas_dashboard.nanis.modal_edit_empleados',compact('empleados'),compact('tipos'));
    }

    public function empleadoEdit(Request $request){
        
        if(session('authenticated')){
            $response = Http::acceptJson()
                ->post("http://api.mundomagiconannys.com/update_personal_interno", [
                    'username' => $request->usuario,
                    'correo' => $request->email,
                    'password' => $request->pass,
                    'tipo' => $request->tipo,
                ]);
            return $response['message'];
        }else{
            return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
        }
    }
    public function save(Request $request){
         
        if(session('authenticated')){
            $response = Http::acceptJson()
                ->post("http://api.mundomagiconannys.com/insert_personal_interno", [
                    'username' => $request->usuario,
                    'correo' => $request->email,
                    'password' => $request->pass,
                    'tipo' => $request->tipo,
                ]);
            return $response['message'];
        }else{
            return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
        }
    }

    public function Administrativos()
    {
        if(session('authenticated')){
            $response = Http::Post('http://api.mundomagiconannys.com/get_all_personal_interno')->collect();
            $empleados = $response;
            $response = Http::Post('http://api.mundomagiconannys.com/get_list_tipo_personal_interno')->collect();
            $tipos = $response;
            return view('vistas.subvistas_dashboard.nanis.empleados', compact('empleados','tipos'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function Config()
    {
        if(session('authenticated')){


            $response = Http::Post('http://api.mundomagiconannys.com/get_config')->collect();
            $config = $response;
            return view('vistas.subvistas_dashboard.nanis.settings', compact('config'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function addModalEmpleado()
    {
        $response = Http::Post('http://api.mundomagiconannys.com/get_list_tipo_personal_interno')->collect();
        $tipo = $response;
        
        return view('vistas.subvistas_dashboard.nanis.modal_add_empleado',compact('tipo'));
    } 

    public function empleadoAutoSearch(Request $request)
    {     
        if(session('authenticated')){

            $term = $request->busqueda;
            // echo($term);
            $response = Http::Post('http://api.mundomagiconannys.com/get_all_personal_interno')->collect();
            if($response != null){
                $empleados = $response;
                $empleados = $empleados->filter(function ($item) use ($term) {
                    return strpos($item['username'], $term) !== false 
                    || strpos($item['tipo'], $term) !== false
                    || strpos($item['correo'], $term) !== false;
                });

                $response = Http::Post('http://api.mundomagiconannys.com/get_list_tipo_personal_interno')->collect();
                $tipos = $response;
                // echo($empleados);

            }else{
                $empleados = [];
                $tipos = [];
            }

            return view('vistas.subvistas_dashboard.nanis.view_table_empleados_search', compact('empleados'), compact('tipos'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
}

<?php

namespace App\Http\Controllers\nanis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;


class SearchOrdenesController extends Controller
{
    public function index()
    {
    }

   public function store(Request $request){
        if(session('authenticated')){
            return $this->Servicios($request->view);
        }else{
            return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
        }
    }
    
    public function actualizarOrden(Request $request)
    {

    }
    public function changeStatus(Request $request)
    {        
        $folio = $request->folio;
        $status = $request->status_pedido;
        $response = Http::acceptJson()
        ->post("http://api.mundomagiconannys.com/update_servicio", [
            'folio' => $folio,
            'status_pedido' => $status,
        ]);

        if($response->json()['response']){
            return  $message = $response['message'];
        }else{
          return  "Ocurrio un error,intente mas tarde";
        }
    }
    public function changeStatusConfig(Request $request)
    {        

        $id = $request->id;
        $sid = $request->sid;
        $auth_token = $request->auth_token;
        $sid_test = $request->sid_test;
        $auth_test = $request->auth_test;
        $msg1 = $request->msg1;
        $msg2 = $request->msg2;
        $token = $request->token;
        $response = Http::acceptJson()
        ->post("http://api.mundomagiconannys.com/insert_update_config", [
            'id' => $id,
            'stripe_Publishable_Key_live' => $sid,
            'stripe_Secret_Key_live' => $auth_token,
            'stripe_Publishable_Key_test' => $sid_test,
            'stripe_Secret_Key_test' => $auth_test,
            'twilio_SID' => $msg1,
            'twilio_Auth_Token' => $msg2,
            'firebase_Token' => $token,
        ]);

        if($response->json()['response']){
            return  $message = $response['message'];
        }else{
          return  "Ocurrio un error,intente mas tarde";
        }
    }
    

    public function deleteOrden(Request $request)
    {
    }
    public function autosearch(Request $request)
    { 
        if(session('authenticated')){

            $term = strtolower($request->busqueda);
            $status = $request->status;
            $response = Http::Post('http://api.mundomagiconannys.com/get_all_servicios');
            if($response->json()['response']){
                $servicios = collect($response->json()['data']);
                $servicios = $servicios->whereIn('status', $status);   
                $servicios = $servicios->filter(function ($item) use ($term) {
                    return strpos(strtolower($item['tipo_servicio']), $term) !== false 
                    || strpos(strtolower($item['nombre_cliente']), $term) !== false 
                    || strpos(strtolower($item['nanny_nombre']), $term) !== false;
                });

                $response = Http::Post('http://api.mundomagiconannys.com/get_list_servicios')->collect();
                $tipos = $response;
                
                $response = Http::Post('http://api.mundomagiconannys.com/get_list_process_servicios')->collect();
                $procesos = $response;

            }else{
                $servicios = [];
                $tipos = [];
                $procesos = [];
            }

            return view('vistas.subvistas_dashboard.nanis.view_table_ordens_search', compact('servicios','tipos','procesos'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function editModal(Request $request)
    {
        $id_servicio = $request->id_servicio;
        $response = Http::Post('http://api.mundomagiconannys.com/get_all_servicios');
        $servicios = collect($response->json()['data']);
        $servicios = $servicios->whereIn('id_servicio', $id_servicio);
        return view('vistas.subvistas_dashboard.nanis.modal_edit_orden',compact('servicios'));
        
    }
    public function addModal()
    {
        return view('vistas.subvistas_dashboard.nanis.modal_add_ordens');
    } 


    public function Servicios(String $status)
    {
        if(session('authenticated')){

            $response = Http::Post('http://api.mundomagiconannys.com/get_all_servicios');

            if($response->json()['response']){
                $servicios = collect($response->json()['data']);
                $servicios = $servicios->whereIn('status', $status);    

                $response = Http::Post('http://api.mundomagiconannys.com/get_list_servicios')->collect();
                $tipos = $response;

                $response = Http::Post('http://api.mundomagiconannys.com/get_list_process_servicios')->collect();
                $procesos = $response;
            }else{
                $servicios = [];
                $tipos = [];
                $procesos = [];
            }

            $orden = $status;
            return view('vistas.subvistas_dashboard.nanis.servicios',compact('orden','tipos','procesos','servicios'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

}

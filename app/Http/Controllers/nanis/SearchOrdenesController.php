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
        $response = Http::post('http://api.mundomagiconannys.com/update_servicio', [
            'folio' => $folio,
            'status_pedido' => $status,
        ]);
        // echo($response);
        // $servicios = collect($response->json()['data']);
        // $servicios = $servicios->whereIn('id_servicio', $id_servicio);
        // return view('vistas.subvistas_dashboard.nanis.modal_edit_orden',compact('servicios'));
    }

    public function deleteOrden(Request $request)
    {
    }
    public function autosearch(Request $request)
    {     
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
            }else{
                $servicios = [];
            }

            $orden = $status;
            return view('vistas.subvistas_dashboard.nanis.servicios',compact('orden'), compact('servicios'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

}

<?php

namespace App\Http\Controllers\nanis;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewAlumnoMail;
use Illuminate\Filesystem\Cache;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class SearchUsuariosController extends Controller
{
    public function index()
    {
    }
    public function store(Request $request)
    {
        if(session('authenticated')){
            $path = $request->file('foto');
            if ($request->file('foto')) {
                
               $response = Http::acceptJson()
                ->attach('image_promo', File::get($path), File::basename($path))
                ->post("http://api.mundomagiconannys.com/insert_promo", [
                    'promo_code' => $request->codigo,
                    'descripcion' => $request->descripcion,
                    'servicio' => $request->servicio,
                    'discount' => $request->descuento,
                    'fecha_inicio' => $request->fecha_inicio,
                    'fecha_fin' => $request->fecha_fin,
                ]);
            }else{
                $response = Http::acceptJson()
                 ->post("http://api.mundomagiconannys.com/insert_promo", [
                     'promo_code' => $request->codigo,
                     'descripcion' => $request->descripcion,
                     'servicio' => $request->servicio,
                     'discount' => $request->descuento,
                     'fecha_inicio' => $request->fecha_inicio,
                     'fecha_fin' => $request->fecha_fin,
                 ]);
            }
            return collect($response->json()['message']);
        }else{
            return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
        }
    }
    public function actualizarOrden(Request $request)
    {

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
        $id = $request->id;
        $tipo = $request->tipo;
        $status = $request->status;
        if($request->id){            
            $response = Http::post('http://api.mundomagiconannys.com/update_status_usuario?id_cliente_o_nanny='.$id.'&tipo='.$tipo.'&status='.$status);
            if($response->json()['response']){
                $response = "Dado de ".$message." con exito";
            }else{
                $response = "Error al ".$message;
            }
        }else{
            $response = "Falta usuario a da de ".$message;
        }   
                
        return $response;
    }

    public function changeStatusPromo(Request $request)
    {
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
            $response = Http::post('http://api.mundomagiconannys.com/enable_disable_promo?promo_code='.$id.'&switch='.$status);
            if($response->json()['response']){
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
    }
    public function promoAutoSearch(Request $request)
    {     
        if(session('authenticated')){

            $term = $request->busqueda;
            $response = Http::Post('http://api.mundomagiconannys.com/get_all_promos')->collect();
            if($response != null){
                $promos = $response;
                $promos = $promos->filter(function ($item) use ($term) {
                    return strpos($item['promo_code'], $term) !== false 
                    || strpos($item['descripcion'], $term) !== false 
                    || strpos($item['servicio'], $term) !== false;
                });

            }else{
                $promos = [];
            }

            return view('vistas.subvistas_dashboard.nanis.view_table_promos_search', compact('promos'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function promoEdit(Request $request)
    {
        if(session('authenticated')){
            $path = $request->file('foto');
            if ($request->file('foto')) {
                
               $response = Http::acceptJson()
                ->attach('image_promo', File::get($path), File::basename($path))
                ->post("http://api.mundomagiconannys.com/update_promo", [
                    'promo_code' => $request->codigo,
                    'descripcion' => $request->descripcion,
                    'servicio' => $request->servicio,
                    'discount' => $request->descuento,
                    'fecha_inicio' => $request->fecha_inicio,
                    'fecha_fin' => $request->fecha_fin,
                ]);
            }else{
                $response = Http::acceptJson()
                 ->post("http://api.mundomagiconannys.com/update_promo", [
                     'promo_code' => $request->codigo,
                     'descripcion' => $request->descripcion,
                     'servicio' => $request->servicio,
                     'discount' => $request->descuento,
                     'fecha_inicio' => $request->fecha_inicio,
                     'fecha_fin' => $request->fecha_fin,
                 ]);
            }
            return collect($response->json()['message']);
        }else{
            return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
        }
    }
    public function editModalPromo(Request $request)
    {
        $id_promo = $request->id_promo;
        $promos = Http::Post('http://api.mundomagiconannys.com/get_all_promos')->collect();
        $promos = $promos->whereIn('promo_code', $id_promo);
        return view('vistas.subvistas_dashboard.nanis.modal_edit_promos',compact('promos'));
    }
    public function addModalPromo()
    {
        return view('vistas.subvistas_dashboard.nanis.modal_add_promos');
    } 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\MisDispositivos;
use Illuminate\Support\Facades\Auth;


class ViewDashboardController extends Controller
{
    public function index(){

        if(session('authenticated')){
           return redirect()->route('dashboard');
       }
       return view('login'); 
   }

   public function store(Request $request){
        $usuario = Usuario::where('id', session('id'))->where('status', '1')->get();
        if(session('authenticated') && $usuario->count()){
            switch ($request->view) 
            {
                case 'inicio':
                    return $this->dashboard();
                break;
                case 'ordenes':
                    return $this->ordenes();
                break;
                case 'usuarios':
                    return $this->usuarios();
                break;
                case 'nanis':
                    return $this->nanis();
                break;
                case 'servicio_cliente':
                    return $this->servicioCliente();
                break;
                case 'configuracion':
                    return $this->configuracion();
                break;

                case 'biblioteca_digital':
                    return $this->bibliotecaDigital();
                break;
                case 'panel_control':
                    return $this->panelControl();
                break;
                case 'calendario':
                    return $this->calendario();
                break;
                case 'educacion_continua':
                    return $this->educacionContinua();
                break;
                case 'foro':
                    return $this->foro();
                break;
                case 'mis_dispositivos':
                    return $this->MisDispositivos();
                break;
                case 'notificaciones':
                    return $this->Notificaciones();
                break;
                case 'ayuda':
                    return $this->Ayuda();
                break;
                case 'control_escolar':
                    return $this->ControlEscolar();
                break;
                case 'check_session':
                    return $this->CheckSession();
                break;
                case 'check_wheater':
                    return $this->getClima($request);
                break;
            }
        }else{
            return view('login'); 
        }
    }

    //Views
    public function dashboard(){
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.inicio_dashboard');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function bibliotecaDigital()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.biblioteca_digital');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function ordenes()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.ordenes');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function nanis()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.nanis');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function usuarios()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.usuarios');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function servicioCliente()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.servicio_cliente');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function configuracion()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.configuracion');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function panelControl()
    {
        if(session('authenticated')){
            $mis_datos = Usuario::where('id', session('id'))
            ->where('status', '1')
            ->get();
            return view('vistas.bloques_dasboard.panel_control', compact('mis_datos'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function calendario()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.calendario');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function educacionContinua()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.educacion_continua');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function foro()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.foro');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function MisDispositivos()
    {
        if(session('authenticated')){

            $misdispositivos = MisDispositivos::where('id_usuario', session('id'))->orderBy('fecha', 'desc')
            ->get();
            return view('vistas.bloques_dasboard.mis_dispositivos', compact('misdispositivos'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function Notificaciones()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.notificaciones');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function Ayuda()
    {
        if(session('authenticated')){
            return view('vistas.bloques_dasboard.ayuda');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
    public function ControlEscolar()
    {
        if(session('authenticated')){
            
            return view('vistas.bloques_dasboard.control_escolar');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }


    public function CheckSession()
    {
        $usuario = Usuario::where('id', session('id'))->where('status', '1')->get();
        if($usuario->count()){
            if(session('authenticated')){            
                return 1;
            }else{
                return 0;
            }
        }else{
            $this->logout();
            return 2;
        }
    }

    public function getClima(Request $request)
    {
        $googleApiUrl = "api.openweathermap.org/data/2.5/weather?lat=".$request->lat."&lon=".$request->lng."&units=metric&lang=es&appid=fbb0af4d2407b9d616835447ff631c50";
        //$googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=Guadalajara&units=metric&lang=es&appid=fbb0af4d2407b9d616835447ff631c50";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        //$data = json_decode($response);
        return $response;
    }


    public function logout() {
        Auth::logout();
        session()->flush();
    }
}

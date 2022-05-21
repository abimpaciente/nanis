<?php

namespace App\Http\Controllers\control_escolar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Usuario;
use App\Models\Carrera;


class ViewControlEscolarController extends Controller
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
                case 'docentes':
                    return $this->Docentes();
                break;
                case 'alumnos':
                    return $this->Alumnos();
                break;
                case 'administrativos':
                    return $this->Administrativos();
                break;
                case 'control_escolar':
                    return $this->ControlEscolar();
                break;

                //Subvistas de Control Escolar
                case 'biblioteca_digital_control_escolar':
                    return $this->BibliotecaDigitalControlEscolar();
                break;
                case 'carrera_control_escolar':
                    return $this->CarreraControlEscolar();
                break;
                case 'expendiente_control_escolar':
                    return $this->ExpedienteControlEscolar();
                break;
                case 'formatos_pago_control_escolar':
                    return $this->formatosPagoControlEscolar();
                break;
                case 'foro_control_escolar':
                    return $this->ForoControlEscolar();
                break;
                case 'horarios_escolares_control_escolar':
                    return $this->horariosEscolaresControlEscolar();
                break;
                case 'materias_control_escolar':
                    return $this->MateriasControlEscolar();
                break;
                case 'notificaciones_control_escolar':
                    return $this->NotificacionesControlEscolar();
                break;
                case 'periodos_control_escolar':
                    return $this->periodosControlEscolar();
                break;
            }
        }else{
            return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
        }
    }

    public function Docentes()
    {
        if(session('authenticated')){

            $docentes = Usuario::join('docente', 'usuario.id', '=', 'docente.id')->orderBy('status', 'desc')->orderBy('docente.fecha_ingreso', 'desc')->get();
            return view('vistas.subvistas_dashboard.control_escolar.docentes', compact('docentes'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function Alumnos()
    {
        if(session('authenticated')){

            $alumnos = Usuario::join('alumnos', 'usuario.id', '=', 'alumnos.id')->orderBy('status', 'desc')->orderBy('alumnos.fecha_ingreso', 'desc')->get();
            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.alumnos', compact('alumnos'), compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }


    public function Administrativos()
    {
        if(session('authenticated')){
            return view('vistas.subvistas_dashboard.control_escolar.administrativos');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function ControlEscolar()
    {
        if(session('authenticated')){
            return view('vistas.subvistas_dashboard.control_escolar.control_escolar');
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }


    //Subvistas dentro de Control Escolar

    public function BibliotecaDigitalControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.biblioteca_digital_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }


    public function CarreraControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.carreras_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function ExpedienteControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.expendientes_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function formatosPagoControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.formatos_pago_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function ForoControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.foro_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function horariosEscolaresControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.horarios_escolares_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function MateriasControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.materias_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function NotificacionesControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.notificaciones_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

    public function periodosControlEscolar()
    {
        if(session('authenticated')){

            $carreras = Carrera::get();
            return view('vistas.subvistas_dashboard.control_escolar.options.periodos_control_escolar', compact('carreras'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Docente;
use App\Models\MisDispositivos;
use App\Models\Usuario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Location;
use Jenssegers\Agent\Agent;



class LoginController extends Controller
{
    public function index(){

         if(session('authenticated')){
            return redirect()->route('dashboard');
        }
        return view('login'); 
    }
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $usuario = Usuario::where('correo', $request->username)
               ->where('password', $request->password)
               ->where('status', '1')
               ->get();
        if($usuario->count()){            
            foreach ($usuario as $user) {
                session()->put('authenticated', $user->token);
                session()->put('id', $user->id);
                session()->put('correo', $user->correo);
                session()->put('matricula', $user->matricula);
                session()->put('status', $user->status);
                session()->put('tipo', $user->tipo);
                session()->put('foto', $user->foto);
                if($user->tipo=='Alumno'){
                    $alumno = Alumno::where('id', $user->id)->get();
                    foreach ($alumno as $alum) {
                        session()->put('nombre', $alum->nombre." ".$alum->apellidoP." ".$alum->apellidoM);
                    }                   
                }else if($user->tipo=='Docente'){
                    $docente = Docente::where('id', $user->id)->get();
                    foreach ($docente as $doce) {
                        session()->put('nombre', $doce->nombre." ".$doce->apellidoP." ".$doce->apellidoM);
                    }
                }else{
                    
                }
                $browser = \Agent::browser();
                $platform = "";
                $device = \Agent::device();
                $ip = $request->ip();

                $agent = "";
                if (\Agent::isMobile() || \Agent::isTablet()) {
                    if (\Agent::isAndroidOS()) {
                        $agent =  'android';
                    }else if (\Agent::isPhone()) {
                        $agent =  'ios';
                    }else{
                        $agent = 'sin dispositivo';
                    }
                    $platform = \Agent::platform();
                }
                if (\Agent::isDesktop()) {
                    if (\Agent::is('Windows')) {
                        $agent =  'windows';
                    }
                    if (\Agent::is('OS X')) {
                        $agent =  'OSX';
                    }
                    $platform =  'desktop';
                }


                MisDispositivos::create([
                    'id_usuario' => $user->id,
                    'tipo' => $agent,
                    'navegador' => $browser,
                    'dispositivo' => $device." ".$platform,
                    'ip' => $ip,
                    'fecha' => Carbon::now(),
                ]);                

                return redirect()->route('dashboard'); 
            }
        }else{
            return redirect()->route('login.index')->with('errorMessageDuration', 'Usuario no encontrado o dado de baja');
        }
    }
    public function logout() {
        Auth::logout();
        session()->flush();
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
}

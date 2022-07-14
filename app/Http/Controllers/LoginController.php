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
use Illuminate\Support\Facades\Http;



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

        $user= $request->username;       
        $pass= $request->password;
       

        $response = Http::acceptJson()
        ->post("http://api.mundomagiconannys.com/login_personal_interno", [
            'username_email' => $user,
            'password' => $pass,
        ]);

        if($response->json()['response']){
            $usuario = collect($response->json()['data']);
            if($usuario->count()){            
                foreach ($usuario as $user) {
                    session()->put('authenticated', $user['username']);
                    session()->put('username', $user['username']);
                    session()->put('correo', $user['correo']);
                    session()->put('status', $user['status']);
                    session()->put('tipo', $user['tipo']);                    
                    session()->put('nombre', $user['username']);
                    return redirect()->route('dashboard'); 
                }
            }else{
                return redirect()->route('login.index')->with('errorMessageDuration', 'Usuario no encontrado o dado de baja');
            }
        }else{
            $message = $response['message'];
            return redirect()->route('login.index')->with('errorMessageDuration', $message);
        }

    }
    public function logout() {
        Auth::logout();
        session()->flush();
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
}

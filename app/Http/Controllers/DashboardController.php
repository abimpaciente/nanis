<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request){
        if(session('authenticated')){
            $ip = request()->getClientIp();;
            return view('vistas.dashboard', compact('ip'));
        }
        return redirect()->route('login.index')->with('errorMessageDuration', 'Sesión finalizada');
    }
}

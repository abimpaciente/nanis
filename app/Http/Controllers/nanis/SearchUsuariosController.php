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

class SearchUsuariosController extends Controller
{
    public function index()
    {
    }
    public function store(Request $request)
    {
        $response = "";
        return $response;
    }
    public function actualizarOrden(Request $request)
    {

    }
    public function changeStatus(Request $request)
    {
        
    }

    public function deleteOrden(Request $request)
    {
    }
    public function autosearch(Request $request)
    {     
    }
    public function editModal(Request $request)
    {
        
    }
    public function addModal()
    {
        return view('vistas.subvistas_dashboard.nanis.modal_add_usuarios');
    } 
}

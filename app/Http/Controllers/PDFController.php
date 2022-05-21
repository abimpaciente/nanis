<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Usuario;
use App\Models\Carrera;
use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function generatePDF(Request $request)
    {
        $id_alumno = $request->id_alumno;
        /* $data = [
            'nombre' => 'Luis Sizzo',
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')

        ]; */
        $alumnos = Usuario::join('alumnos', 'usuario.id', '=', 'alumnos.id')
        ->join('carrera', 'alumnos.id_carrera', '=', 'carrera.id')
        ->where('usuario.id', $id_alumno)
        ->select('usuario.foto',
                'usuario.correo',
                'usuario.status',
                'alumnos.matricula',
                'alumnos.nombre',
                'alumnos.apellidoP',
                'alumnos.apellidoM',
                'alumnos.fecha_ingreso',
                'carrera.clave',
                'carrera.nombre_carrera',
                'carrera.descripcion')
        ->get();

        $pdf = PDF::loadView('pdfs/kardex_alumnos', compact('alumnos'));
        return $pdf->download($request->id_alumno.'.pdf');
        //return $alumnos;
    }
}

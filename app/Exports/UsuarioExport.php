<?php

namespace App\Exports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsuarioExport implements FromCollection, WithHeadings, WithStyles, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $usuario = Usuario::join('alumnos', 'usuario.id', '=', 'alumnos.id')
        ->select(
                'usuario.id',
                'alumnos.matricula',
                'alumnos.nombre',
                'alumnos.apellidoP',
                'alumnos.apellidoM',
                'usuario.correo',
                'usuario.status',
                'alumnos.fecha_ingreso')->get();
        return $usuario;
    }
    public function headings(): array
    {
        return [
            'ID',
            'Matricula',
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Correo',
            'Tipo',
            'Token',
            'Status',
        ];
    }
    public function styles(Worksheet $sheet)
    {
        $styleArray = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => '00417A'),
                'name'  => 'Verdana'
            ));

        $sheet->getStyle('A1:K1')->applyFromArray($styleArray);
        $sheet->getStyle('A1:K1')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP);
        $sheet->getRowDimension('1')->setRowHeight(30);
    }
    /* public function registerEvents(): array
    {
        return [
            Usuario::class    => function(Usuario $event) {
                $cellRange = 'A1:W1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    } */
}

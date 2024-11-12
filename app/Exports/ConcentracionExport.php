<?php

namespace App\Exports;

use App\Models\Concentracion;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConcentracionExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Concentracion::all(); 
    }

    public function headings(): array
    {
        return [
            'ID', 
            'Clave', 
            'Nombre Expediente', 
            'Fondo', 
            'Sección', 
            'Subsección', 
            'Serie', 
            'Subserie', 
            'Año Creación', 
            'Año Cierre', 
            'Motivo Cierre', 
            'Legajos', 
            'Medida', 
            'Ubicación Física', 
            'Digitalizado'
        ];
    }
}


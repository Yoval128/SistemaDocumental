<?php

namespace App\Exports;

use App\Models\UsuarioArea;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsuarioAreaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return UsuarioArea::all();
    }
    public function headings(): array
    {
        return [
            'id_rol',
            'nombre',
            'activo',
            'descripccion',
            'activo'
        ];
    }
}

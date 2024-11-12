<?php

namespace App\Exports;

use App\Models\UsuarioAreaRol;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsuarioAreaRolExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return UsuarioAreaRol::all();
    }
    public function headings(): array
    {
        return [
            'id_usuario_area_rol',
            'id_usuario',
            'id_area',
            'id_rol',
            'fecha_asignacion'
        ];
    }
}

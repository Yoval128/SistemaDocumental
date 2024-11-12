<?php

namespace App\Exports;

use App\Models\Rol;
use Maatwebsite\Excel\Concerns\FromCollection;

class RolExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Rol::all();
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

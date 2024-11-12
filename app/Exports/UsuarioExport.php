<?php

namespace App\Exports;

use App\Models\Usuario;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsuarioExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Usuario::all();
    }
    public function headings(): array
    {
        return [
            'id_usuario',
            'nombre',
            'apellidoP',
            'apellidoM',
            'sexo',
            'fecha_nacimiento',
            'email',
            'password',
            'rol',
            'foto',
            'activo',
        ];
    }
}

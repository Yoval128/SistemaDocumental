<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
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

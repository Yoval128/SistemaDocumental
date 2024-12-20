<?php

namespace App\Exports;

use App\Models\Area;
use Maatwebsite\Excel\Concerns\FromCollection;

class AreaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Area::all();
    }

    public function headings(): array
    {
        return [
            'id_area',
            'nombre',
            'descripccion',
            'activo'
        ];
    }
}



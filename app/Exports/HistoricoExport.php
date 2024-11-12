<?php

namespace App\Exports;

use App\Models\Historico;
use Maatwebsite\Excel\Concerns\FromCollection;

class HistoricoExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Historico::all();
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

<?php

namespace App\Exports;

use App\Models\Tramite;
use Maatwebsite\Excel\Concerns\FromCollection;

class TramiteExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Tramite::all();
    }
    public function headings(): array
    {
        return [
            'id_tramite',
            'id_area',
            'id_usuario',
            'fecha_inicio',
            'fecha_limite',
            'estado',
            'observaciones',
            'documentos_adjuntos',
        ];
    }
}

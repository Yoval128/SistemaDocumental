<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concentracion;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ConcentracionExport;

class ConcentracionController extends Controller
{
    /*      public function __construct()
        {
            $this->middleware('auth');
        } */

    public function concentracion_index(Request $request)
    {
        // Obtener los valores de 'buscar', 'fecha_inicio' y 'fecha_limite' desde el request
        $buscar = $request->input('buscar');
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_limite = $request->input('fecha_limite');

        // Realizar la búsqueda utilizando el método de búsqueda en el modelo
        $concentraciones = Concentracion::Buscar($buscar)
            ->FechaInicio($fecha_inicio)
            ->FechaLimite($fecha_limite)
            ->paginate(5);

        // Pasar las variables a la vista
        return view('concentracion.concentracion_index', compact('concentraciones', 'buscar', 'fecha_inicio', 'fecha_limite'));
    }




    public function concentracion_alta()
    {
        return view('concentracion.concentracion_alta');
    }

    public function concentracion_registrar(Request $request)
    {

        $this->validate($request, [
            'clave' => 'required|string|max:255',
            'nombre_expediente' => 'required|string|max:255',
            'fondo' => 'required|string|max:255',
            'seccion' => 'required|string|max:255',
            'subseccion' => 'nullable|string|max:255',
            'serie' => 'required|string|max:255',
            'subserie' => 'required|string|max:255',
            'ano_creacion' => 'required|date',
            'ano_cierre' => 'required|date',
            'motivo_cierre' => 'required|string|max:255',
            'legajos' => 'required|integer|min:1',
            'medida' => 'required|numeric',
            'ubicacion_fisica' => 'required|string|max:255',
            'digitalizado' => 'required|boolean',
            'archivo_pdf' => 'nullable|array',
            'archivo_pdf.*' => 'file|mimes:pdf|max:2048',
        ]);

        $documentos = [];
        if ($request->file('archivo_pdf')) {
            foreach ($request->file('archivo_pdf') as $file) {
                $pdfName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('pdfs'), $pdfName);
                $documentos[] = $pdfName;
            }
        }

        Concentracion::create([
            'clave' => $request->input('clave'),
            'nombre_expediente' => $request->input('nombre_expediente'),
            'fondo' => $request->input('fondo'),
            'seccion' => $request->input('seccion'),
            'subseccion' => $request->input('subseccion'),
            'serie' => $request->input('serie'),
            'subserie' => $request->input('subserie'),
            'ano_creacion' => $request->input('ano_creacion'),
            'ano_cierre' => $request->input('ano_cierre'),
            'motivo_cierre' => $request->input('motivo_cierre'),
            'legajos' => (int) $request->input('legajos'),
            'medida' => (float) $request->input('medida'),
            'ubicacion_fisica' => $request->input('ubicacion_fisica'),
            'archivo_pdf' => json_encode($documentos),
            'digitalizado' => (bool) $request->input('digitalizado'),
        ]);


        return redirect()->route('concentracion_index')->with('success', 'Registro creado con éxito.');
    }


    public function concentracion_eliminar(Concentracion $id)
    {
        $id->delete();
        return redirect()->route('concentracion_index');
    }

    public function concentracion_modificar(Concentracion $id)
    {
        return view('concentracion.concentracion_modificacion')->with('concentracion', $id);
    }

    public function concentracion_actualizar(Request $request, Concentracion $id)
    {
        // Validar los datos recibidos
        $this->validate($request, [
            'clave' => 'required|string|max:255',
            'nombre_expediente' => 'required|string|max:255',
            'fondo' => 'required|string|max:255',
            'seccion' => 'required|string|max:255',
            'subseccion' => 'nullable|string|max:255',
            'serie' => 'required|string|max:255',
            'subserie' => 'required|string|max:255',
            'ano_creacion' => 'required|date',
            'ano_cierre' => 'required|date',
            'motivo_cierre' => 'required|string|max:255',
            'legajos' => 'required|integer|min:1',
            'medida' => 'required|numeric',
            'ubicacion_fisica' => 'required|string|max:255',
            'digitalizado' => 'required|boolean',
            'archivo_pdf' => 'nullable|array',
            'archivo_pdf.*' => 'file|mimes:pdf|max:2048',
            'documentos_a_eliminar' => 'nullable|array',
            'documentos_a_eliminar.*' => 'string',
        ]);

        // Manejo de archivos PDF
        $documentos = json_decode($id->archivo_pdf, true) ?: [];

        if ($request->file('archivo_pdf')) {
            foreach ($request->file('archivo_pdf') as $file) {
                $pdfName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('pdfs'), $pdfName);
                $documentos[] = $pdfName;
            }
        }

        // Eliminar documentos seleccionados
        if ($request->input('documentos_a_eliminar')) {
            foreach ($request->input('documentos_a_eliminar') as $key) {
                $filePath = public_path('pdfs/' . $documentos[$key]);
                if (file_exists($filePath)) {
                    unlink($filePath); // Eliminar el archivo físico
                }
                unset($documentos[$key]); // Eliminar de la lista de documentos
            }
            $documentos = array_values($documentos); // Reindexar el array
        }

        // Actualizar el registro
        $id->update([
            'clave' => $request->input('clave'),
            'nombre_expediente' => $request->input('nombre_expediente'),
            'fondo' => $request->input('fondo'),
            'seccion' => $request->input('seccion'),
            'subseccion' => $request->input('subseccion'),
            'serie' => $request->input('serie'),
            'subserie' => $request->input('subserie'),
            'ano_creacion' => $request->input('ano_creacion'),
            'ano_cierre' => $request->input('ano_cierre'),
            'motivo_cierre' => $request->input('motivo_cierre'),
            'legajos' => (int) $request->input('legajos'),
            'medida' => (float) $request->input('medida'),
            'ubicacion_fisica' => $request->input('ubicacion_fisica'),
            'archivo_pdf' => json_encode($documentos),
            'digitalizado' => (bool) $request->input('digitalizado'),
        ]);

        return redirect()->route('concentracion_index')->with('success', 'Registro actualizado con éxito.');
    }



    public function concentracion_detalle($id)
    {
        $query = Concentracion::find($id);
        return view('concentracion.concentracion_detalle')->with(['concentracion' => $query]);
    }

    public function concentracion_exportar_pdf()
    {
        $concentraciones = Concentracion::all();  // Obtener todas las concentraciones
        $pdf = \PDF::loadView('concentracion.pdf', compact('concentraciones'));
        return $pdf->download('concentraciones.pdf');  // Descargar el archivo PDF generado
    }

    public function concentracion_exportar_excel()
    {
        return Excel::download(new ConcentracionExport, 'concentraciones.xlsx');
    }

    public function mostrarGrafica(Request $request)
    {
         $documentosPorClasificacion = Concentracion::selectRaw('fondo, seccion, subseccion, count(*) as total')
            ->groupBy('fondo', 'seccion', 'subseccion')  // Agrupamos por fondo, sección y subsección
            ->get();

        $labels = [];
        $data = [];
        foreach ($documentosPorClasificacion as $doc) {
            $labels[] = $doc->fondo . ' - ' . $doc->seccion . ' - ' . ($doc->subseccion ?? 'Sin subsección');
            $data[] = $doc->total;
        }

        return view('estadisticas.concentracion_grafica', compact('labels', 'data'));
    }
}

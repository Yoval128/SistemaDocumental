{{-- resources/views/concentracion/pdf.blade.php --}}
<!DOCTYPE html>
<html>
<head>
    <title>Concentraciones</title>
    <style>
        /* Aquí puedes poner estilos específicos para el PDF */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Concentraciones</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>ID</th>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Fondo</th>
                <th>Sección</th>
                <th>Año</th>
            </tr>
        </thead>
        <tbody>
            @foreach($concentraciones as $key => $concentracion)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $concentracion->id_concentracion }}</td>
                    <td>{{ $concentracion->clave }}</td>
                    <td>{{ $concentracion->nombre_expediente }}</td>
                    <td>{{ $concentracion->fondo }}</td>
                    <td>{{ $concentracion->seccion }}</td>
                    <td>{{ \Carbon\Carbon::parse($concentracion->ano_creacion)->format('m d, Y') }} hasta {{ \Carbon\Carbon::parse($concentracion->ano_cierre)->format('m d, Y') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

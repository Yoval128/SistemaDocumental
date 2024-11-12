<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Asignación de Áreas</h3>


                    <table id="areas-table" class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Area</th>
                                <th>Área</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($areas->isEmpty())
                                <tr>
                                    <td colspan="4" class="text-center">No hay áreas disponibles.</td>
                                </tr>
                            @else
                                @foreach ($areas as $key => $area)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $area->id_area }}</td>
                                        <td>{{ $area->nombre }}</td>
                                        <td>
                                            <a href="{{ route('areas_modificar', ['id' => $area->id_area]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a href="{{ route('areas_eliminar', ['id' => $area->id_area]) }}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que quieres borrar esta asignación?')">Borrar</button>
                                            </a>
                                            <a href="{{ route('areas_detalle', ['id' => $area->id_area]) }}">
                                                <button type="button" class="btn btn-info btn-sm">Detalle</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>

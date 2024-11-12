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

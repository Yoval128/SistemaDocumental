<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Asignación de Roles</h3>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID Rol</th>
                                    <th>Rol</th>
                                    <th>Descripcción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($roles->isEmpty())
                                    <tr>
                                        <td colspan="5" class="text-center">No hay roles disponibles.</td>
                                    </tr>
                                @else
                                    @foreach ($roles as $key => $rol)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $rol->id_rol }}</td>
                                            <td>{{ $rol->nombre }}</td>
                                            <td>{{ $rol->descripccion }}</td>
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

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
                        <h3 class="card-title">Lista de Trámites</h3>
                    </div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID</th>
                                <th>Área</th>
                                <th>Usuario</th>
                                <th>Fecha de Inicio</th>
                                <th>Fecha Límite</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tramites as $key => $tramite)
                                <tr>

                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $tramite->id_tramite }}</td>
                                    <td>{{ $tramite->area->nombre }}</td>
                                    <td>{{ $tramite->usuario->nombre }} {{ $tramite->usuario->apellidoP }}
                                        {{ $tramite->usuario->apellidoM }}</td>
                                    <!-- Muestra el nombre completo del usuario -->
                                    <td>{{ \Carbon\Carbon::parse($tramite->fecha_inicio)->format('m/d/y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($tramite->fecha_limite)->format('m/d/y') }}</td>
                                    <td>{{ $tramite->estado }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    </div>

</body>

</html>

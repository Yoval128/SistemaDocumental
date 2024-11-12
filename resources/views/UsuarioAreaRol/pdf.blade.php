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
        <h3>Nuevo Registro de Asignación de Usuario, Área y Rol</h3>
        <hr>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Usuario</th>
                    <th>Área</th>
                    <th>Rol</th>
                    <th>Fecha de Asignación</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asignaciones as $key => $asignacion)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $asignacion->id_usuario_area_rol }}</td>
                        <td>{{ $asignacion->usuario->nombre }} {{ $asignacion->usuario->apellidoP }}
                            {{ $asignacion->usuario->apellidoM }}</td>
                        <td>{{ $asignacion->area->nombre }}</td>
                        <td>{{ $asignacion->rol->nombre }}</td>
                        <td>
                            <a
                                href="{{ route('usuario_area_rol_modificar', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                            </a>
                            <a
                                href="{{ route('usuario_area_rol_eliminar', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que quieres borrar esta asignación?')">Borrar</button>
                            </a>
                            <a
                                href="{{ route('usuario_area_rol_detalle', ['id' => $asignacion->id_usuario_area_rol]) }}">
                                <button type="button" class="btn btn-info btn-sm">Detalle</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

</body>

</html>

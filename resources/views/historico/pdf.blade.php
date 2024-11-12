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
                        <h3 class="card-title">Lista de Históricos</h3>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Usuario Asignado</th>
                                    <th>Trámite</th>
                                    <th>Tipo de Documento</th>
                                    <th>Valor Histórico</th>
                                    <th>Acceso Público</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($historicos->isEmpty())
                                    <tr>
                                        <td colspan="8" class="text-center">No hay registros disponibles.</td>
                                    </tr>
                                @else
                                    @foreach ($historicos as $key => $historico)
                                        <tr>
                                            <td>{{ $historicos->firstItem() + $key }}</td>
                                            <td>{{ $historico->id_historico }}</td>
                                            <td>{{ $historico->usuario->nombre }} {{ $historico->usuario->apellidoP }}
                                                {{ $historico->usuario->apellidoM }}</td>
                                            <td>
                                                @if ($historico->tramite)
                                                    {{ $historico->tramite->estado }}
                                                @else
                                                    <span class="text-muted">Sin trámite asignado</span>
                                                @endif
                                            </td>
                                            <td>{{ $historico->tipo_documento }}</td>
                                            <td>{{ $historico->valor_historico }}</td>
                                            <td>{{ $historico->acceso_publico ? 'Sí' : 'No' }}</td>
                                            <td>
                                                <a
                                                    href="{{ route('historico_modificar', ['id' => $historico->id_historico]) }}">
                                                    <button type="button"
                                                        class="btn btn-warning btn-sm">Editar</button>
                                                </a>
                                                <a
                                                    href="{{ route('historico_eliminar', ['id' => $historico->id_historico]) }}">
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                        Borrar
                                                    </button>
                                                </a>
                                                <a
                                                    href="{{ route('historico_detalle', ['id' => $historico->id_historico]) }}">
                                                    <button type="button" class="btn btn-info">Detalle</button>
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

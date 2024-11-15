@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Lista de Usuarios</h3>

                        <div class="d-flex justify-content-between align-items-center mb-3">

                            <a href="{{ route('usuario_alta') }}">
                                <button type="button" class="btn btn-warning">Nuevo Usuario</button>
                            </a>

                            <form action="{{ route('usuario_index') }}" method="GET" class="d-flex align-items-center">
                                {{ csrf_field() }}

                                <div class="form-floating me-2">
                                    <input type="text" class="form-control" name="buscar" value="{{ old('buscar') }}"
                                        id="floatingBuscar" placeholder="ejemplo: Roberto Vinicio"
                                        aria-describedby="buscarHelp">
                                    <label for="floatingBuscar">Buscar</label>
                                    <div id="buscarHelp" class="form-text">
                                        @if ($errors->first('buscar'))
                                            <small class="text-danger">{{ $errors->first('buscar') }}</small>
                                        @endif
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Buscar</button>

                                <!-- Botón para reiniciar la búsqueda -->
                                <a href="{{ route('usuario_index') }}">
                                    <button type="button" class="btn btn-danger">Reiniciar</button>
                                </a>
                            </form>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Id</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuario as $key => $usuarios)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $usuarios->id_usuario }}</td>
                                        <td><img src="{{ asset('img/' . $usuarios->foto) }}"
                                                style="width: 50px; height:50px;"></td>
                                        <td>{{ $usuarios->nombre }}</td>
                                        <td>{{ $usuarios->apellidoP . ' ' . $usuarios->apellidoM }}</td>
                                        <td>{{ $usuarios->email }}</td>
                                        <td>{{ $usuarios->rol }}</td>
                                        <td>
                                            <a href="{{ route('usuario_modificar', ['id' => $usuarios->id_usuario]) }}">
                                                <button type="button" class="btn btn-warning btn-sm">Editar</button>
                                            </a>
                                            <a href="{{ route('usuario_eliminar', ['id' => $usuarios->id_usuario]) }}">
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Seguro que quieres borrar este registro?')">
                                                    Borrar
                                                </button>
                                            </a>
                                            <a href="{{ route('usuario_detalle', ['id' => $usuarios->id_usuario]) }}">
                                                <button type="button" class="btn btn-info btn-sm">Detalle</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-between">
                            <div>
                                <small>Mostrando {{ $usuario->firstItem() }} a {{ $usuario->lastItem() }} de
                                    {{ $usuario->total() }} usuarios</small>
                            </div>
                            <div>
                                {{ $usuario->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                        <!-- Botones para generar PDF y Excel -->
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('usuario_exportar_pdf') }}" class="me-2">
                                <button id="download-pdf" class="btn btn-outline-danger btn-lg">
                                    <i class="bi bi-file-earmark-pdf"></i> Descargar PDF
                                </button>
                            </a>
                            <a href="{{ route('usuario_exportar_excel') }}">
                                <button id="download-excel" class="btn btn-outline-success btn-lg">
                                    <i class="bi bi-file-earmark-excel"></i> Descargar Excel
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <hr>
        <!-- Gráficas (dos por fila) -->
        <div class="row">
            <div class="col-md-6">
                <h4>Distribución de Género</h4>
                <div style="position: relative; width: 100%; height: 300px; max-height: 400px; overflow: hidden;">
                    <canvas id="graficaGenero"></canvas>
                </div>
            </div>

            <div class="col-md-6">
                <h4>Distribución por Roles</h4>
                <canvas id="graficaRoles"></canvas>
            </div>
        </div>

        <!-- Fila nueva para la tercera gráfica -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h4>Usuarios Activos/Inactivos</h4>
                <div style="position: relative; width: 100%; height: 300px; max-height: 400px; overflow: hidden;">
                    <canvas id="graficaActivosInactivos"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Datos de la gráfica
        const hombres = @json($hombres);
        const mujeres = @json($mujeres);
        const usuariosActivos = @json($usuariosActivos);
        const usuariosInactivos = @json($usuariosInactivos);
        const roles = @json($roles);

        // 1. Gráfica de Género (Pastel)
        const ctxGenero = document.getElementById('graficaGenero').getContext('2d');
        new Chart(ctxGenero, {
            type: 'pie',
            data: {
                labels: ['Masculino', 'Femenino'],
                datasets: [{
                    label: 'Género',
                    data: [hombres, mujeres],
                    backgroundColor: ['#36A2EB', '#FF6384'],
                    hoverOffset: 4
                }]
            }
        });

        // 2. Gráfica de Roles (Barras)
        const ctxRoles = document.getElementById('graficaRoles').getContext('2d');
        new Chart(ctxRoles, {
            type: 'bar',
            data: {
                labels: Object.keys(roles),
                datasets: [{
                    label: 'Usuarios por Rol',
                    data: Object.values(roles),
                    backgroundColor: '#FFCD56',
                    borderColor: '#FFCD56',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        // 3. Gráfica de Activos/Inactivos (Barras)
        const ctxActivosInactivos = document.getElementById('graficaActivosInactivos').getContext('2d');
        new Chart(ctxActivosInactivos, {
            type: 'bar',
            data: {
                labels: ['Activos', 'Inactivos'],
                datasets: [{
                    label: 'Usuarios',
                    data: [usuariosActivos, usuariosInactivos],
                    backgroundColor: ['#4BC0C0', '#FF5733'],
                    borderColor: ['#4BC0C0', '#FF5733'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

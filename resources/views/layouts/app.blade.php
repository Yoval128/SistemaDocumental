<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Gestión de archivos')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


</head>

<body>

    @include('layouts.header')

    <div class="d-flex">
        <div class="sidebar">
            <h5>Acciones Rápidas</h5>
            <ul class="list-group">

                <li class="list-group-item active"><i class="fas fa-home"></i><strong>Inicio</strong></li>

                <!-- Mostrar el nombre y el correo del usuario -->
                <li class="list-group-item">
                    <strong>Bienvenido, {{ Auth::user()->nombre }} {{ Auth::user()->apellidoP }}!</strong><br>
                    <small>{{ Auth::user()->email }}</small>
                </li>

                <li class="list-group-item"><a href="{{ route('dashboard') }}"><i class="fas fa-arrow-right"></i>Ir a
                        Home</a></li>
                <li class="list-group-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn-cerrar" type="submit">Cerrar Sesión</button>
                    </form>
                    {{--  @php
                        dd(Auth::user()->rol); // Esto te permitirá ver el valor exacto del rol
                    @endphp --}}
                </li>

                @if (Auth::user()->rol == 'Jefe de archivo general')
                    <!-- Mostrar módulos solo para el Jefe de archivo general -->
                    <li class="list-group-item"><strong>Cuadro de Clasificación</strong></li>
                    <li class="list-group-item"><a href="{{ route('concentracion_index') }}"><i
                                class="fas fa-balance-scale"></i>Mostrar Cuadro de Clasificación</a></li>
                    <li class="list-group-item"><a href="{{ route('concentracion_alta') }}"><i
                                class="fas fa-plus-circle"></i>Crear Concentración</a></li>

                    <!-- Áreas (solo para el Jefe de archivo general) -->
                    <li class="list-group-item"><strong>Áreas</strong></li>
                    <li class="list-group-item"><a href="{{ route('areas_index') }}"><i
                                class="fas fa-briefcase"></i>Mostrar Áreas</a></li>
                    <li class="list-group-item"><a href="{{ route('areas_alta') }}"><i
                                class="fas fa-plus-circle"></i>Crear Áreas</a></li>

                    <!-- Roles (solo para el Jefe de archivo general) -->
                    <li class="list-group-item"><strong>Roles</strong></li>
                    <li class="list-group-item"><a href="{{ route('rol_index') }}"><i class="fas fa-cogs"></i>Mostrar
                            Roles</a></li>
                    <li class="list-group-item"><a href="{{ route('rol_alta') }}"><i
                                class="fas fa-user-shield"></i>Crear Roles</a></li>

                    <!-- Usuarios (solo para el Jefe de archivo general) -->
                    <li class="list-group-item"><strong>Usuarios</strong></li>
                    <li class="list-group-item"><a href="{{ route('usuario_index') }}"><i
                                class="fas fa-users"></i>Mostrar Usuarios</a></li>
                    <li class="list-group-item"><a href="{{ route('usuario_alta') }}"><i
                                class="fas fa-user-plus"></i>Crear Usuario</a></li>

                    <!-- Asignación de Usuario a Roles y Áreas (solo para el Jefe de archivo general) -->
                    <li class="list-group-item"><strong>Asignación de Usuario a Roles y Áreas</strong></li>
                    <li class="list-group-item"><a href="{{ route('usuario_area_rol_index') }}"><i
                                class="fas fa-link"></i>Mostrar Lista de Asignaciones</a></li>

                    <!-- Mostrar solo el módulo de Trámites para el Empleado de Trámite -->

                    <li class="list-group-item"><strong>Trámites</strong></li>
                    <li class="list-group-item"><a href="{{ route('tramite_index') }}"><i
                                class="fas fa-file-alt"></i>Mostrar Trámites</a></li>
                    <li class="list-group-item"><a href="{{ route('tramite_alta') }}"><i
                                class="fas fa-plus-square"></i>Crear Trámite</a></li>

                    <!-- Histórico (accesible por ambos roles) -->
                    {{-- Empleado de Concentración --}}
                    <li class="list-group-item"><strong>Histórico</strong></li>
                    <li class="list-group-item"><a href="{{ route('historico_index') }}"><i
                                class="fas fa-history"></i>Mostrar Histórico</a></li>
                    <li class="list-group-item"><a href="{{ route('historico_alta') }}"><i
                                class="fas fa-folder-plus"></i>Agregar Documento Histórico</a></li>
                @endif

                @if (Auth::user()->rol == 'Empleado de Concentración')
                    <!-- Mostrar módulos solo para el Jefe de archivo general -->
                    <li class="list-group-item"><strong>Cuadro de Clasificación</strong></li>
                    <li class="list-group-item"><a href="{{ route('concentracion_index') }}"><i
                                class="fas fa-balance-scale"></i>Mostrar Cuadro de Clasificación</a></li>
                    <li class="list-group-item"><a href="{{ route('concentracion_alta') }}"><i
                                class="fas fa-plus-circle"></i>Crear Concentración</a></li>
                @endif

                @if (Auth::user()->rol === 'Empleado de trámite')
                    <!-- Mostrar solo el módulo de Trámites para el Empleado de Trámite -->

                    <li class="list-group-item"><strong>Trámites</strong></li>
                    <li class="list-group-item"><a href="{{ route('tramite_index') }}"><i
                                class="fas fa-file-alt"></i>Mostrar Trámites</a></li>
                    <li class="list-group-item"><a href="{{ route('tramite_alta') }}"><i
                                class="fas fa-plus-square"></i>Crear Trámite</a></li>
                @endif

                @if (Auth::user()->rol === 'Empleado de Histórico')
                    <!-- Histórico (accesible por ambos roles) -->
                    <li class="list-group-item"><strong>Histórico</strong></li>
                    <li class="list-group-item"><a href="{{ route('historico_index') }}"><i
                                class="fas fa-history"></i>Mostrar Histórico</a></li>
                    <li class="list-group-item"><a href="{{ route('historico_alta') }}"><i
                                class="fas fa-folder-plus"></i>Agregar Documento Histórico</a></li>
                @endif
            </ul>
        </div>

        <div class="main-content">
            <main>
                @yield('content')
            </main>
        </div>
    </div>

    @include('layouts.footer')

    <script src="{{ asset('js/validaciones.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>

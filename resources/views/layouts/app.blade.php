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
            <h5>Acciones Rapidas</h5>
            <ul class="list-group">

                <li class="list-group-item active"><i class="fas fa-home"></i><strong>Inicio</strong></li>
                <li class="list-group-item"><a href="{{ route('dashboard') }}"><i class="fas fa-arrow-right"></i>Ir a
                        Home</a></li>
                <li class="list-group-item">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn-cerrar" type="submit">Cerrar Sesión</button>
                    </form>
                </li>

                <li class="list-group-item active-section" id="clasificacion-toggle"><i class="fas fa-balance-scale"></i><strong>Cuadro de Clasificación</strong></li>
                <ul class="submenu" id="clasificacion-menu">
                    <li><a href="{{ route('concentracion_index') }}"><i class="fas fa-balance-scale"></i>Mostrar Cuadro de Clasificación</a></li>
                    <li><a href="{{ route('concentracion_alta') }}"><i class="fas fa-plus-circle"></i>Crear Concentración</a></li>
                </ul>

                <li class="list-group-item active-section" id="areas-toggle"><i class="fas fa-briefcase"></i><strong>Áreas</strong></li>
                <ul class="submenu" id="areas-menu">
                    <li><a href="{{ route('areas_index') }}"><i class="fas fa-briefcase"></i>Mostrar Áreas</a></li>
                    <li><a href="{{ route('areas_alta') }}"><i class="fas fa-plus-circle"></i>Crear Áreas</a></li>
                </ul>

                <li class="list-group-item active-section" id="roles-toggle"><i class="fas fa-cogs"></i><strong>Roles</strong></li>
                <ul class="submenu" id="roles-menu">
                    <li><a href="{{ route('rol_index') }}"><i class="fas fa-cogs"></i>Mostrar Roles</a></li>
                    <li><a href="{{ route('rol_alta') }}"><i class="fas fa-user-shield"></i>Crear Roles</a></li>
                </ul>

                <li class="list-group-item active-section" id="usuarios-toggle"><i class="fas fa-users"></i><strong>Usuarios</strong></li>
                <ul class="submenu" id="usuarios-menu">
                    <li><a href="{{ route('usuario_index') }}"><i class="fas fa-users"></i>Mostrar Usuarios</a></li>
                    <li><a href="{{ route('usuario_alta') }}"><i class="fas fa-user-plus"></i>Crear Usuario</a></li>
                </ul>

                <li class="list-group-item active-section" id="asignaciones-toggle"><i class="fas fa-link"></i><strong>Asignación de Usuario a Roles y Áreas</strong></li>
                <ul class="submenu" id="asignaciones-menu">
                    <li><a href="{{ route('usuario_area_rol_index') }}"><i class="fas fa-link"></i>Mostrar Lista de Asignaciones</a></li>
                </ul>

                <li class="list-group-item active-section" id="tramites-toggle"><i class="fas fa-file-alt"></i><strong>Trámites</strong></li>
                <ul class="submenu" id="tramites-menu">
                    <li><a href="{{ route('tramite_index') }}"><i class="fas fa-file-alt"></i>Mostrar Trámites</a></li>
                    <li><a href="{{ route('tramite_alta') }}"><i class="fas fa-plus-square"></i>Crear Trámite</a></li>
                </ul>

                <li class="list-group-item active-section" id="historico-toggle"><i class="fas fa-history"></i><strong>Histórico</strong></li>
                <ul class="submenu" id="historico-menu">
                    <li><a href="{{ route('historico_index') }}"><i class="fas fa-history"></i>Mostrar Histórico</a></li>
                    <li><a href="{{ route('historico_alta') }}"><i class="fas fa-folder-plus"></i>Agregar Documento Histórico</a></li>
                </ul>
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

    <script>
        $(document).ready(function () {
            // Manejadores de clic para los títulos de sección
            $('#clasificacion-toggle').click(function () {
                $('#clasificacion-menu').toggle();
            });

            $('#areas-toggle').click(function () {
                $('#areas-menu').toggle();
            });

            $('#roles-toggle').click(function () {
                $('#roles-menu').toggle();
            });

            $('#usuarios-toggle').click(function () {
                $('#usuarios-menu').toggle();
            });

            $('#asignaciones-toggle').click(function () {
                $('#asignaciones-menu').toggle();
            });

            $('#tramites-toggle').click(function () {
                $('#tramites-menu').toggle();
            });

            $('#historico-toggle').click(function () {
                $('#historico-menu').toggle();
            });
        });
    </script>
</body>

</html>

<div class="d-flex">
    <div class="sidebar">
        <h5>Acciones Rapidas</h5>
        <ul class="list-group">
            <!-- Inicio -->
            <li class="list-group-item active"><i class="fas fa-home"></i><strong>Inicio</strong></li>
            <li class="list-group-item"><a href="{{ route('dashboard') }}"><i class="fas fa-arrow-right"></i>Ir a
                    Home</a></li>
            <li class="list-group-item">
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="btn-cerrar" type="submit">Cerrar Sesión</button>
                </form>
            </li>


            <!-- Concentración -->
            <li class="list-group-item"><strong>Cuadro de Clasificación</strong></li>
            <li class="list-group-item"><a href="{{ route('concentracion_index') }}"><i
                        class="fas fa-balance-scale"></i>Mostrar Cuadro de Clasificación</a></li>
            <li class="list-group-item"><a href="{{ route('concentracion_alta') }}"><i
                        class="fas fa-plus-circle"></i>Crear Concentración</a></li>

            <!-- Áreas -->
            <li class="list-group-item"><strong>Áreas</strong></li>
            <li class="list-group-item"><a href="{{ route('areas_index') }}"><i class="fas fa-briefcase"></i>Mostrar
                    Áreas</a></li>
            <li class="list-group-item"><a href="{{ route('areas_alta') }}"><i class="fas fa-plus-circle"></i>Crear
                    Áreas</a></li>

            <!-- Roles -->
            <li class="list-group-item"><strong>Roles</strong></li>
            <li class="list-group-item"><a href="{{ route('rol_index') }}"><i class="fas fa-cogs"></i>Mostrar
                    Roles</a></li>
            <li class="list-group-item"><a href="{{ route('rol_alta') }}"><i class="fas fa-user-shield"></i>Crear
                    Roles</a></li>

            <!-- Usuarios -->
            <li class="list-group-item"><strong>Usuarios</strong></li>
            <li class="list-group-item"><a href="{{ route('usuario_index') }}"><i class="fas fa-users"></i>Mostrar
                    Usuarios</a></li>
            <li class="list-group-item"><a href="{{ route('usuario_alta') }}"><i class="fas fa-user-plus"></i>Crear
                    Usuario</a></li>

            <!-- Asignación de Usuario a Roles y Áreas -->
            <li class="list-group-item"><strong>Asignación de Usuario a Roles y Áreas</strong></li>
            <li class="list-group-item"><a href="{{ route('usuario_area_rol_index') }}"><i
                        class="fas fa-link"></i>Mostrar Lista de Asignaciones</a></li>

            <!-- Trámites -->
            <li class="list-group-item"><strong>Trámites</strong></li>
            <li class="list-group-item"><a href="{{ route('tramite_index') }}"><i class="fas fa-file-alt"></i>Mostrar
                    Trámites</a></li>
            <li class="list-group-item"><a href="{{ route('tramite_alta') }}"><i class="fas fa-plus-square"></i>Crear
                    Trámite</a></li>


            <!-- Histórico -->
            <li class="list-group-item"><strong>Histórico</strong></li>
            <li class="list-group-item"><a href="{{ route('historico_index') }}"><i class="fas fa-history"></i>Mostrar
                    Histórico</a></li>
            <li class="list-group-item"><a href="{{ route('historico_alta') }}"><i
                        class="fas fa-folder-plus"></i>Agregar Documento Histórico</a></li>
        </ul>
    </div>

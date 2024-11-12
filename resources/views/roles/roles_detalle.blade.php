@extends('layouts.app')

@section('content')
    <h3>Detalles del Rol: {{ $roles->nombre }}</h3>
    <hr>

    <div class="card">
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>ID del Rol:</strong>
                    <p>{{ $roles->id_rol}}</p>
                </div>
                <div class="col-md-4">
                    <strong>Nombre del Rol:</strong>
                    <p>{{ $roles->nombre }}</p>
                </div>
                <div class="col-md-4">
                    <strong>Estado:</strong>
                    <p>{{ $roles->activo ? 'Activo' : 'Inactivo' }}</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <strong>Descripción:</strong>
                    <p>{{ $roles->descripccion }}</p>
                </div>
            </div>

            <a href="{{ route('rol_index') }}" class="btn btn-secondary">Regresar</a>
        </div>
    </div>
@endsection

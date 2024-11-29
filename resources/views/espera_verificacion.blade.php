@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Verificación de Cuenta</h3>
        <hr>
        <div class="alert alert-info">
            <p>Gracias por registrarte. Hemos enviado un correo electrónico con un enlace de verificación a la dirección que proporcionaste. Por favor, revisa tu bandeja de entrada (y tu carpeta de spam) para confirmar tu cuenta.</p>
            <p>Una vez verificado tu correo, podrás acceder a todas las funcionalidades del sistema.</p>
        </div>
        <p>Si no recibiste el correo electrónico, asegúrate de que tu dirección de correo sea correcta o intenta nuevamente.</p>
    </div>
@endsection

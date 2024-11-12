<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 d-none d-md-flex align-items-center justify-content-center">
                <img class="imagen1 img-fluid" src="{{ asset('img/logo/Optilinex33.png') }}" alt="Logo Empresa">
            </div>
            <div class="col-md-6">
                <div class="card">
                    <h3 class="card-title text-center">Iniciar Sesión</h3>

                    <div class="text1 text-center">
                        <p>Accede a tu cuenta para comenzar a explorar.</p>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('login_post') }}" method="post">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Iniciar Sesión</button>
                    </form>

                    <div class="dere-text">
                        <p>© Optilinex. Todos los derechos reservados.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

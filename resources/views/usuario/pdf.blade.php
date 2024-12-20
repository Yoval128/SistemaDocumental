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
                        <h3 class="card-title">Lista de Usuarios</h3>

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

@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row mb-4">
            <div class="col-12">
                <div style="background-color: black; padding: 20px;">
                    <h1 style="color: white;">Cuadro de Clasificación</h1>
                </div>

                <div style="padding: 20px;">
                    <h3>Documentos por Clasificación</h3>
                    <p>Mostrar la cantidad de documentos agrupados por categoría (trámite, concentración, histórico) o por
                        fondo, sección, y subsección, para ver cómo se distribuyen los archivos</p>
                </div>
            </div>

        </div>

        <div class="row mb-4">
            <div class="col-12">
                <nav>
                    <ul class="nav" style="list-style-type: none; padding-left: 0;">
                        <li class="nav-item" style="display: inline-block; margin-right: 20px;">
                            <a href="{{ route('estadistica_tramite') }}"
                                style="color: white; text-decoration: none; font-size: 18px; font-weight: bold; padding: 10px; border-radius: 5px; transition: background-color 0.3s ease, color 0.3s ease;">
                                <i class="fas fa-arrow-right" style="margin-right: 8px;"></i> Tramite
                            </a>
                        </li>
                        <li class="nav-item" style="display: inline-block; margin-right: 20px;">
                            <a href="{{ route('estadistica_concentracion') }}"
                                style="color: white; text-decoration: none; font-size: 18px; font-weight: bold; padding: 10px; border-radius: 5px; transition: background-color 0.3s ease, color 0.3s ease;">
                                <i class="fas fa-arrow-right" style="margin-right: 8px;"></i> Cuadro de Clacifición
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>

        <div style="position: relative; width: 100%; height: 600px; max-height: 400px; overflow: hidden;">
            <canvas id="graficoDocumentos" width="300" height="150"></canvas>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('graficoDocumentos').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($labels) !!},
                    datasets: [{
                        label: 'Cantidad de Documentos',
                        data: {!! json_encode($data) !!},
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
@endsection

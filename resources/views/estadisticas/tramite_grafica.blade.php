@extends('layouts.app')

@section('content')
    <div class="container mt-4">

        <div class="row mb-4">
            <div class="col-12">
                <div class="bg-dark text-white p-4 rounded-lg">
                    <h1 class="display-4">Estado de Documentos y Tareas</h1>
                </div>

                <div class="p-4 bg-light rounded-lg shadow-sm">
                    <h3 class="mb-3">Seguimiento de Documentos y Trámites</h3>
                    <p class="lead">En esta sección podrás consultar el estado de tus documentos y trámites mediante
                        gráficos.
                        Podrás visualizar el número de trámites y documentos clasificados según su estado (archivado, en
                        revisión, pendiente).
                        Esta herramienta te permitirá monitorear el progreso de las tareas y priorizar aquellas que
                        requieran atención inmediata.</p>
                </div>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <nav>
                    <ul class="nav justify-content-start" style="list-style-type: none; padding-left: 0;">
                        <li class="nav-item">
                            <a href="{{ route('estadistica_tramite') }}" class="btn btn-primary btn-lg mx-2">
                                <i class="fas fa-arrow-right mr-2"></i> Tramite
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('estadistica_concentracion') }}" class="btn btn-secondary btn-lg mx-2">
                                <i class="fas fa-arrow-right mr-2"></i> Cuadro de Concentración
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <h3 class="mb-4">Gráfico de Estado de Documentos</h3>
                <div style="position: relative; width: 100%; height: 300px; max-height: 400px; overflow: hidden;">
                    <canvas id="estadoGrafica" width="300" height="150"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var tramitesPorEstado = @json($tramitesPorEstado);

        var etiquetas = tramitesPorEstado.map(function(tramite) {
            return tramite.estado;
        });

        var datos = tramitesPorEstado.map(function(tramite) {
            return tramite.total;
        });

        var colores = [
            'rgba(54, 162, 235, 0.6)', // Azul
            'rgba(255, 99, 132, 0.6)', // Rojo
            'rgba(75, 192, 192, 0.6)', // Verde
            'rgba(153, 102, 255, 0.6)' // Morado
        ];

        var ctx = document.getElementById('estadoGrafica').getContext('2d');
        var estadoGrafica = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: etiquetas,
                datasets: [{
                    label: 'Cantidad de Documentos',
                    data: datos,
                    backgroundColor: colores,
                    borderColor: colores.map(color => color.replace('0.6',
                        '1')),
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        }
                    },
                    x: {
                        ticks: {
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        }
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                        labels: {
                            font: {
                                size: 12,
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.dataset.label + ': ' + tooltipItem.raw + ' documentos';
                            }
                        }
                    }
                }
            }

        });
    </script>
@endsection

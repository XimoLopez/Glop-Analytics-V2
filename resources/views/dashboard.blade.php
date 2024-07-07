@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-sm">
            <x-adminlte-small-box title="3156" text="Pedidos" icon="fas fa-shopping-basket" theme="blue" url="#"
                url-text="Más info" />
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="1639" text="Clientes" icon="fas fa-users" theme="maroon" url="#"
                url-text="Más info" />
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="84%" text="Recurrencias" icon="fas fa-redo" theme="indigo" url="#"
                url-text="Más info" />
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="€ 72.759" text="Ganancias" icon="fas fa-coins" theme="success" url="#"
                url-text="Más info" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <x-adminlte-card title="Pedidos por mes" icon="fas fa-shopping-basket">
                <canvas id="pedidosChart"></canvas>
            </x-adminlte-card>
            <x-adminlte-card title="Ganancias por mes" icon="fas fa-coins">
                <canvas id="gananciasChart"></canvas>
            </x-adminlte-card>
        </div>
        <div class="col-md-5">
            <x-adminlte-card title="Recurrencias" icon="fas fa-redo">
                <canvas id="recurrenciasChart"></canvas>
            </x-adminlte-card>
            <x-adminlte-card title="Milestones Anuales" icon="fas fa-tasks">
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Pedidos</span>
                        <span>3156 / 2150</span>
                    </div>
                    <x-adminlte-progress theme="blue" value=100 animated with-label />
                </div>
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Clientes</span>
                        <span>1639 / 1211</span>
                    </div>
                    <x-adminlte-progress theme="maroon" value=100 animated with-label />
                </div>
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Ganancias</span>
                        <span>72.759 € / 54.397 €</span>
                    </div>
                    <x-adminlte-progress theme="success" value=100 animated with-label />
                </div>
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/styles/css/admin.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            var pedidosChartcontainer = document.getElementById('pedidosChart').getContext('2d');
            var pedidosChart = new Chart(pedidosChartcontainer, {
                type: 'bar',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                    datasets: [{
                            label: ['2023'],
                            data: [353, 311, 345, 389, 354, 398],
                            backgroundColor: [
                                '#bad2f3'
                            ],
                        },
                        {
                            label: ['2024'],
                            data: [437, 539, 475, 505, 591, 609],
                            backgroundColor: [
                                '#3E86E3'
                            ],
                        },
                    ]
                },
                options: {
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    },
                    borderRadius: 50,
                    responsive: true,
                    maintainAspectRatio: false,
                },
            });

            var gananciasChartcontainer = document.getElementById('gananciasChart').getContext('2d');
            var gananciasChart = new Chart(gananciasChartcontainer, {
                type: 'line',
                data: {
                    labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                    datasets: [{
                            label: ['2023'],
                            data: [7653, 9822, 8341, 8562, 9563, 10456],
                            backgroundColor: '#9Ad3b1',
                            borderColor: '#9Ad3b1',
                            pointBackgroundColor: '#9Ad3b1',
                            tension: 0.3,
                            borderWidth: 2,
                            pointRadius: 4,
                        },
                        {
                            label: ['2024'],
                            data: [10305, 12852, 11246, 11474, 13450, 13432],
                            backgroundColor: '#2BBA68',
                            borderColor: '#2BBA68',
                            pointBackgroundColor: '#2BBA68',
                            tension: 0.3,
                            borderWidth: 2,
                            pointRadius: 4,
                        },
                    ]
                },
                options: {
                    scales: {
                        x: {
                            grid: {
                                display: false
                            }
                        },
                        y: {
                            beginAtZero: true
                        }
                    },
                    borderRadius: 50,
                    responsive: true,
                    maintainAspectRatio: false,
                },
            });

            var recurrenciasChartContainer = document.getElementById('recurrenciasChart').getContext('2d');
            var recurrenciasChart = new Chart(recurrenciasChartContainer, {
                type: 'pie',
                data: {
                    labels: ['Un pedido', 'Dos pedidos', 'tres o más pedidos'],
                    datasets: [{
                        data: [642, 527, 312],
                        backgroundColor: [
                            '#dcb8fb',
                            '#d095ff',
                            '#a065e3',
                        ],
                    }, ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                },
            });

        });
    </script>
@stop

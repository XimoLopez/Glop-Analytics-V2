@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_top_nav_left')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm">
            <x-adminlte-small-box title="{{ $totalOrdersCurrentYear }}" text="Pedidos {{ $currentYear }}" icon="fas fa-shopping-basket" theme="blue" url="{{ url('/admin/pedidos') }}" url-text="Más info" />
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="{{ $totalClients }}" text="Clientes" icon="fas fa-users" theme="maroon" url="{{ url('/admin/clientes') }}" url-text="Más info" class="bouncer" data-target="#clientesCard"/>
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="84%" text="Recurrencias" icon="fas fa-redo" theme="info" url="#" url-text="Más info" class="bouncer" data-target="#recurrenciasCard"/>
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="€ {{ number_format($totalEarningsCurrentYear, 2) }}" text="Ganancias {{ $currentYear }}" icon="fas fa-coins" theme="success" url="#" url-text="Más info" class="bouncer" data-target="#gananciasCard"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <x-adminlte-card id="pedidosCard" title="Pedidos por mes" icon="fas fa-shopping-basket">
                <canvas id="pedidosChart"></canvas>
            </x-adminlte-card>
            <x-adminlte-card id="gananciasCard" title="Ganancias por mes" icon="fas fa-coins">
                <canvas id="gananciasChart"></canvas>
            </x-adminlte-card>
        </div>
        <div class="col-md-5">
            <x-adminlte-card id="recurrenciasCard" title="Recurrencias" icon="fas fa-redo">
                <canvas id="recurrenciasChart"></canvas>
            </x-adminlte-card>
            <x-adminlte-card id="milestonesCard" title="Milestones Anuales" icon="fas fa-tasks">
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Pedidos</span>
                        <span>{{ $totalOrdersCurrentYear }} / 2150</span>
                    </div>
                    <x-adminlte-progress theme="blue" value=100 animated with-label />
                </div>
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Clientes</span>
                        <span>{{ $totalClients }} / 1211</span>
                    </div>
                    <x-adminlte-progress theme="orange" value=100 animated with-label />
                </div>
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Ganancias</span>
                        <span>€ {{ number_format($totalEarningsCurrentYear, 2) }} / 54.397 €</span>
                    </div>
                    <x-adminlte-progress theme="success" value=100 animated with-label />
                </div>
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('css')
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let pedidosDataPreviousYear = @json(array_values($monthlyOrdersPreviousYear));
            let pedidosDataCurrentYear = @json(array_values($monthlyOrdersCurrentYear));
            let pedidosLabels = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio']; // Adjust labels as needed

            let pedidosChartcontainer = document.getElementById('pedidosChart').getContext('2d');
            let pedidosChart = new Chart(pedidosChartcontainer, {
                type: 'bar',
                data: {
                    labels: pedidosLabels,
                    datasets: [{
                            label: '{{ $previousYear }}',
                            data: pedidosDataPreviousYear,
                            backgroundColor: [
                                '#bad2f3'
                            ],
                        },
                        {
                            label: '{{ $currentYear }}',
                            data: pedidosDataCurrentYear,
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

            let gananciasDataPreviousYear = @json(array_values($monthlyEarningsPreviousYear));
            let gananciasDataCurrentYear = @json(array_values($monthlyEarningsCurrentYear));

            let gananciasChartcontainer = document.getElementById('gananciasChart').getContext('2d');
            let gananciasChart = new Chart(gananciasChartcontainer, {
                type: 'line',
                data: {
                    labels: pedidosLabels,
                    datasets: [{
                            label: '{{ $previousYear }}',
                            data: gananciasDataPreviousYear,
                            backgroundColor: '#9Ad3b1',
                            borderColor: '#9Ad3b1',
                            pointBackgroundColor: '#9Ad3b1',
                            tension: 0.3,
                            borderWidth: 2,
                            pointRadius: 4,
                        },
                        {
                            label: '{{ $currentYear }}',
                            data: gananciasDataCurrentYear,
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

            let recurrenciasChartContainer = document.getElementById('recurrenciasChart').getContext('2d');
            let recurrenciasChart = new Chart(recurrenciasChartContainer, {
                type: 'pie',
                data: {
                    labels: ['Un pedido', 'Dos pedidos', 'tres o más pedidos'],
                    datasets: [{
                        data: [642, 527, 312],
                        backgroundColor: [
                            '#7ac6ce',
                            '#47abb9',
                            '#1490a4',
                        ],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                },
            });
        });
    </script>
@stop

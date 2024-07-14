@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_top_nav_left')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-sm">
            <x-adminlte-small-box title="{{ $totalOrders }}" text="Pedidos" icon="fas fa-shopping-basket" theme="blue" url="{{ url('/admin/pedidos') }}" url-text="Más info" />
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="{{ $totalClients }}" text="Clientes" icon="fas fa-users" theme="maroon" url="{{ url('/admin/clientes') }}" url-text="Más info" />
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="{{ number_format($clientsRecurrenciesReal, 2) }} %" text="Recurrencias (2+)" icon="fas fa-redo" theme="indigo" url="#" url-text="Más info" class="bouncer" data-target="#recurrenciasCard"/>
        </div>
        <div class="col-sm">
            <x-adminlte-small-box title="{{ number_format($totalEarnings) }} €" text="Ganancias" icon="fas fa-coins" theme="success" url="#" url-text="Más info" class="bouncer" data-target="#gananciasCard"/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7">
            <x-adminlte-card id="pedidosCard" title="Pedidos mensuales" icon="fas fa-shopping-basket">
                <canvas id="pedidosChart"></canvas>
            </x-adminlte-card>
            <x-adminlte-card id="gananciasCard" title="Ganancias mensuales" icon="fas fa-coins">
                <canvas id="gananciasChart"></canvas>
            </x-adminlte-card>
        </div>
        <div class="col-md-5">
            <x-adminlte-card id="recurrenciasCard" title="Recurrencias" icon="fas fa-redo">
                <canvas id="recurrenciasChart"></canvas>
            </x-adminlte-card>
            <x-adminlte-card id="milestonesCard" title="Milestones % ({{ $currentYear }} / {{ $previousYear }})" icon="fas fa-tasks">
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Pedidos</span>
                        <span>{{ $totalOrdersCurrentYear }} / {{ $totalOrdersPreviousYear }}</span>
                    </div>
                    <x-adminlte-progress theme="blue" value="{{ number_format($totalOrdersMilestoneCompletion, 2) }}" animated with-label />
                </div>
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Clientes</span>
                        <span>{{ $totalClientsCurrentYear }} / {{ $totalClientsPreviousYear }}</span>
                    </div>
                    <x-adminlte-progress theme="maroon" value="{{ number_format($totalClientsMilestoneCompletion) }}" animated with-label />
                </div>
                <div class="milestone">
                    <div class="milestone-title">
                        <span>Ganancias</span>
                        <span>{{ number_format($totalEarningsCurrentYear) }} € / {{ number_format($totalEarningsPreviousYear) }} € </span>
                    </div>
                    <x-adminlte-progress theme="success" value="{{ number_format($totalEarningsMilestoneCompletion, 2) }}" animated with-label />
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
            var mesesLabels = ['ENE', 'FEB', 'MAR', 'ABR', 'MAY', 'JUN', 'JUL', 'AGO', 'SEP', 'OCT', 'NOV', 'DIC'];

            // Pedidos Chart
            var pedidosChartContainer = document.getElementById('pedidosChart').getContext('2d');
            var pedidosChart = new Chart(pedidosChartContainer, {
                type: 'bar',
                data: {
                    labels: mesesLabels,
                    datasets: [
                        @foreach($monthlyData as $year => $yearData)
                        {
                            label: '{{ $year }}',
                            data: [
                                @foreach($yearData as $monthData)
                                    {{ $monthData['totalOrders'] }},
                                @endforeach
                            ],
                            backgroundColor: '{{ $year % 2 == 0 ? "#3E86E3" : "#bad2f3" }}'
                        },
                        @endforeach
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

            // Ganancias Chart
            var gananciasChartContainer = document.getElementById('gananciasChart').getContext('2d');
            var gananciasChart = new Chart(gananciasChartContainer, {
                type: 'line',
                data: {
                    labels: mesesLabels,
                    datasets: [
                        @foreach($monthlyData as $year => $yearData)
                        {
                            label: '{{ $year }}',
                            data: [
                                @foreach($yearData as $monthData)
                                    {{ $monthData['totalEarnings'] }},
                                @endforeach
                            ],
                            backgroundColor: '{{ $year % 2 == 0 ? "#2BBA68" : "#9Ad3b1" }}',
                            borderColor: '{{ $year % 2 == 0 ? "#2BBA68" : "#9Ad3b1" }}',
                            pointBackgroundColor: '{{ $year % 2 == 0 ? "#2BBA68" : "#9Ad3b1" }}',
                            tension: 0.3,
                            borderWidth: 2,
                            pointRadius: 4,
                            order: '{{ -$year }}',
                        },
                        @endforeach
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

            // Recurrencias Chart (Static Example)
            var recurrenciasChartContainer = document.getElementById('recurrenciasChart').getContext('2d');
            var recurrenciasChart = new Chart(recurrenciasChartContainer, {
                type: 'pie',
                data: {
                    labels: ['Sin pedidos', 'Un pedido', 'Dos pedidos', 'tres o más pedidos'],
                    datasets: [{
                        data: [
                            {{ $clientsRecurrenciesNone }},
                            {{ $clientsRecurrencies['once'] }},
                            {{ $clientsRecurrencies['twice'] }},
                            {{ $clientsRecurrencies['thriceOrMore'] }},
                        ],
                        backgroundColor: [
                            '#9ac6ce',
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

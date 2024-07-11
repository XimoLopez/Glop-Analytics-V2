@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_top_nav_left')
    <h1>Clientes</h1>
@stop

@section('content')

    @php
        $heads = [
            ['label' => 'ID'],
            ['label' => 'Nombre'],
            ['label' => 'Email'],
            ['label' => 'Registro'],
            ['label' => 'Pedidos'],
            ['label' => 'Gastos'],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];

        $config = [
            'data' => $clients->map(function ($client) {
                return [
                    $client->id,
                    $client->name,
                    $client->email,
                    $client->created_at->format('d/m/y'),
                    $client->orders_count,
                    $client->total_spent . ' €', // Use 'total_spent' attribute from Client model
                    '<nobr>' . '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button>' .
                    '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i></button>' .
                    '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"><i class="fa fa-lg fa-fw fa-eye"></i></button>' . '</nobr>',
                ];
            }),
            'columns' => [
                ['type' => 'num'],
                null,
                null,
                ['type' => 'date'],
                ['type' => 'num'],
                ['type' => 'num'],
                ['orderable' => false],
            ],
            'order' => [[0, 'desc']],
            'language' => ['url' => '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-ES.json'],
        ];
    @endphp

    {{-- Minimal example / fill data using the component slot --}}
    <div class="row">
        <div class="col-md-12">
            <x-adminlte-card title="Listado de clientes" icon="fas fa-users">
                <x-adminlte-datatable id="table-clientes" :heads="$heads" :config="$config" theme="light" striped hoverable
                    with-buttons />
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('css')
    @vite(['resources/css/admin.css'])
@stop

@section('js')

@stop

@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

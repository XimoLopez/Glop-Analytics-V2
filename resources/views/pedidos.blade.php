@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_top_nav_left')
    <h1>Pedidos</h1>
@stop

@section('content')

    @php
        // Definición de los encabezados de la tabla
        $heads = [
            ['label' => '#'],
            ['label' => 'Cliente'],
            ['label' => 'Fecha'],
            ['label' => 'Items'],
            ['label' => 'Valor'],
            ['label' => 'Estado'],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];

        // Configuración de la datatable
        $config = [
            'data' => $orders->map(function ($order) {
                return [
                    $order->id,
                    $order->client->name,
                    $order->date,
                    $order->items,
                    $order->value . ' €',
                    $order->status,
                    '<span style="white-space: nowrap;">' . 
                    '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button>' .
                    '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i></button>' .
                    '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"><i class="fa fa-lg fa-fw fa-eye"></i></button>' . 
                    '</span>',
                ];
            }),
            'columns' => [
                ['type' => 'num'],  
                ['type' => 'text'],               
                ['type' => 'date'],    
                ['type' => 'num'],
                ['type' => 'num'],     
                ['orderable' => false],
                ['orderable' => false],
            ],
            'order' => [[0, 'desc']], // Ordenar por la primera columna en orden descendente
            // Configuración de idioma
            'language' => ['url' => '//cdn.datatables.net/plug-ins/2.0.8/i18n/es-ES.json'],
        ];
    @endphp

    <div class="row">
        <div class="col-md-12">
            <x-adminlte-card title="Listado de pedidos" icon="fas fa-shopping-basket">
                <x-adminlte-datatable id="table-pedidos" :heads="$heads" :config="$config" theme="light" striped hoverable with-buttons />
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

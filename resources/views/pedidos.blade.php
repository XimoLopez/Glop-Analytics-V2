@extends('adminlte::page')

@section('title', 'Pedidos')

@section('content_top_nav_left')
    <h1>Pedidos</h1>
@stop

@section('content')

    @php
        $heads = [
            ['label' => '#'],
            ['label' => 'Cliente'],
            ['label' => 'Fecha'],
            ['label' => 'Items'],
            ['label' => 'Valor'],
            ['label' => 'Estado'],
            ['label' => 'Actions', 'no-export' => true, 'width' => 5],
        ];

        $config = [
            'data' => $orders->map(function ($order) {
                return [
                    $order->id,
                    $order->client_id . ' - ' . $order->client->name,
                    $order->date->format('d/m/y'),
                    $order->items,
                    $order->value . ' €',
                    $order->status,
                    '<nobr>' . '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit"><i class="fa fa-lg fa-fw fa-pen"></i></button>' .
                    '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete"><i class="fa fa-lg fa-fw fa-trash"></i></button>' .
                    '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details"><i class="fa fa-lg fa-fw fa-eye"></i></button>' . '</nobr>',
                ];
            }),
            'columns' => [
                ['type' => 'num'],
                null,
                ['type' => 'date'],
                ['type' => 'num'],
                ['type' => 'num'],
                ['orderable' => false],
                ['orderable' => false],
            ],
            'order' => [[0, 'desc']],
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

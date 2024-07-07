@extends('adminlte::page')

@section('title', 'Pedidos')


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

        $btnEdit = '<button class="btn btn-xs btn-default text-primary mx-1 shadow" title="Edit">
            <i class="fa fa-lg fa-fw fa-pen"></i>
        </button>';
        $btnDelete = '<button class="btn btn-xs btn-default text-danger mx-1 shadow" title="Delete">
            <i class="fa fa-lg fa-fw fa-trash"></i>
        </button>';
        $btnDetails = '<button class="btn btn-xs btn-default text-teal mx-1 shadow" title="Details">
            <i class="fa fa-lg fa-fw fa-eye"></i>
        </button>';

        $config = [
            'data' => [
                [
                    453,
                    'John Bender',
                    '12/03/23',
                    '17',
                    '322 €',
                    'Entregado',
                    '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>',
                ],
                [
                    812,
                    'Sophia Clemens',
                    '05/08/23',
                    '13',
                    '245 €',
                    'Entregado',
                    '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>',
                ],
                [
                    932,
                    'Peter Sousa',
                    '17/02/24',
                    '6',
                    '107 €',
                    'Reembolsado',
                    '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>',
                ],
            ],
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

    {{-- Minimal example / fill data using the component slot --}}
    <div class="row">
        <div class="col-md-12">
            <x-adminlte-card title="Listado de pedidos" icon="fas fa-shopping-basket">
                <x-adminlte-datatable id="table-pedidos" :heads="$heads" :config="$config" theme="light" striped hoverable
                    with-buttons />
            </x-adminlte-card>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/styles/css/admin.css">
@stop

@section('js')

@stop


@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

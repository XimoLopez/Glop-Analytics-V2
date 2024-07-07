@extends('adminlte::page')

@section('title', 'Clientes')


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
                    32,
                    'John Bender',
                    'johnbendeer@gmail.com',
                    '12/03/23',
                    '17',
                    '322 €',
                    '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>',
                ],
                [
                    114,
                    'Sophia Clemens',
                    'sophiaclemens@gmail.com',
                    '05/08/23',
                    '13',
                    '245 €',
                    '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>',
                ],
                [
                    282,
                    'Peter Sousa',
                    'petersousa@gmail.com',
                    '17/02/24',
                    '6',
                    '107 €',
                    '<nobr>' . $btnEdit . $btnDelete . $btnDetails . '</nobr>',
                ],
            ],
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
    <link rel="stylesheet" href="/styles/css/admin.css">
@stop

@section('js')

@stop


@section('plugins.Datatables', true)
@section('plugins.DatatablesPlugins', true)

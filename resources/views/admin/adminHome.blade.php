@extends('adminlte::page')

@section('title', 'Lista de patrimônios')

@section('content_header')
    <h1>Lista de patrimônios</h1>
@stop

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Tipo</th>
            <th scope="col">Etiqueta</th>
            <th scope="col">Valor</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

    @foreach($EstateList as $propertie)

        <tr>
            <td>{{$propertie->name}}</td>
            <td>{{$propertie->name}}</td>
            <td>{{$propertie->label_id}}</td>
            <td>{{$propertie->value}}</td>

            <td>
                <button type="button" class="btn btn-info">Editar</button>
                <button type="button" class="btn btn-danger">Danger</button>
            </td>

        </tr>
    @endforeach
        </tbody>
    </table>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

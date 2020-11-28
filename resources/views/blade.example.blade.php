@extends('adminlte::page')

@section('title', 'Adicionar colaborador')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Listar colaboradores</h1>
@stop

@if(session()->has('message'))

    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@endif



@section('content')
    @if(count($errors)>0)
        <div class="card">
            <div class="card-header h5">
                Opss... houve algum erro no preenchimento
            </div>
            <div class="card-body alert-danger">
                @foreach($errors->all() as $error)
                    <li style="color: white">{{$error}}</li>
                @endforeach
            </div>
        </div>
        <ul>

        </ul>
    @endif






@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

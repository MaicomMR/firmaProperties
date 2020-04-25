@extends('adminlte::page')

@section('title', 'Listagem de colaboradores')

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





    <table class="table table-striped">





        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>

                @foreach($employees as $employee)
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->cpf}}</td>
                    <td>
                        <button type="button" class="btn btn-warning">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger">
                            <i class="fas fa-trash-alt" aria-hidden="true"></i>
                        </button>
                    </td>


            </tr>
            @endforeach

            </tr>
            </tbody>
        </table>







@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')


@section('css')
    <link rel="stylesheet" href="/css/superAdminStyle.css">
@stop

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
    @endif

    Olá Nome
    <div class="admin-base-container">

        <div class="config-item-container">
            <div class="config-item-left">
                e-mail list
            </div>
            <div class="config-item-right">
                Configurações
            </div>
        </div>

        <div class="config-item-container">
            <div class="config-item-left">
                e-mail list
            </div>
            <div class="config-item-right">
                Acessos
            </div>
        </div>

        <div class="config-item-container">
            <div class="config-item-left">
                e-mail list
            </div>
            <div class="config-item-right">
                Relatórios
            </div>
        </div>

        <div class="config-item-container">
            <div class="config-item-left">
                e-mail list
            </div>
            <div class="config-item-right">
                Emails de Alerta
            </div>
        </div>
    </div>

@stop

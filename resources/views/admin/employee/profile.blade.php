@extends('adminlte::page')

@section('title', 'Perfil do colaborador')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Perfil do colaborador</h1>
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



    <div class="container btn-success" style="padding: 10px">
        <h4 class="text-center"><i class="fa fa-plus-circle" style="padding: 10px"></i>Adicionar patrimônio ao colaborador</h4>
    </div>

    <div class="container card" style="padding: 20px">
        <h2>Exemplerino da Silva Costa</h2>

        <div class="row">
            <div class="col-sm-2">
                <i class="fa fa-id-card"></i>CPF: 000-000-000-00<br>
            </div>
            <div class="col-sm-2">
                <i class="fa fa-phone-square"></i>53 9 9999 9999<br>
            </div>
            <div class="col-sm-4">
                <i class="fa fa-envelope"></i>exemplo@atlastechnol.com<br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm">
                <i class="fa fa-map-signs"></i>Endereço: Rua das Abóboras Fredericas, 4582, B<br>
            </div>
        </div>
    </div>

    <div class="card-estate col-sm">
        <div class="estate-icon flex col-sm-2 text-center btn-warning">


{{--TODO: SWITCH ESTATE TIPE SHOW SPECIFIC ICON--}}
            {{-- monitor --}}
{{--            <i class="fas fa-tv"></i>--}}

            {{-- mouse --}}
{{--            <i class="fas fa-mouse"></i>--}}

            {{-- notebook --}}
            <i class="fas fa-laptop"></i>

            {{-- teclado --}}
{{--            <i class="fas fa-keyboard"></i>--}}

            {{-- cadeira --}}
{{--            <i class="fas fa-chair"></i>--}}

            {{-- fonte --}}
{{--            <i class="fa fa-plug" aria-hidden="true"></i>--}}

            {{-- headset --}}
{{--            <i class="fas fa-headset"></i>--}}



        </div>
        <div class="estate-info flex col-sm-5">
            <div class="row">
            <div class="col-sm-12 text-center">
            <h2>Notebook Acer Nitro 5</h2>
            <i class="fa fa-tag" style="font-size: 1.2em"></i> <span style="font-size: 1.5em; padding-left: 0.2em;">Etiqueta: 75550</span><br>
            <i class="fa fa-calendar" style="font-size: 1.2em"></i> <span style="font-size: 1.5em; padding-left: 0.2em;">Concessão: 12/04/2020</span><br>
            </div>
            <div class="col-sm-6">
                <span>Categoria: Computador</span><br>
                <span>Sub-categoria: Notebook</span><br>
            </div>
            <div class="col-sm-6">
                <span>Valor estimado: 1.584,57R$</span><br>
                <span>Fornecedor: Pichau</span><br>
            </div>
            </div>
        </div>

        <div class="estate-options flex col-sm-5 row text-center">
            <div class="col-sm-4 btn-dark  estate-button-body">
                <i class="fa fa-eye estate-options-buttons" aria-hidden="true"></i>
                <p class="estate-button-text">Visualizar patrimônio</p><br>
            </div>
            <div class="col-sm-4 btn-warning  estate-button-body">
                <i class="fa fa-chevron-circle-down estate-options-buttons" aria-hidden="true"></i>
                <p class="estate-button-text">Desatribuir do colaborador</p><br>
            </div>
            <div class="col-sm-4 btn-danger estate-button-body" style="border-radius: 0px 10px 10px 0px;">
                <i class="fa fa-minus-circle estate-options-buttons" aria-hidden="true"></i>
                <p class="estate-button-text">Dar baixa do patrimônio</p><br>
            </div>
        </div>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="/css/estate/estate-card.css">
@stop

@section('js')
@stop

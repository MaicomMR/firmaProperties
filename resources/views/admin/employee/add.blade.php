@extends('adminlte::page')

@section('title', 'Adicionar colaborador')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Editar colaborador</h1>
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
        <ul>

        </ul>
    @endif

@section('content_header')
    <h1>Adicionar novo colaborador</h1>
@stop

{!! Form::open([
'route' => 'employeeStore',
'class' => 'form']) !!}



@if(session()->has('message'))

    <div class="alert alert-success" role="alert">
        {{ session()->get('message') }}
    </div>
@endif


{!! Form::token(); !!}

    <div class="container">
        <div class="row">
            <div class="col-md-7">
                {!! Form::label('name', 'Nome do Colaborador:'); !!}
                {!! Form::text('name', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Nome do colaborador',]); !!}
                </div>

            <div class="col-sm-2">
                {!! Form::label('cpf', 'CPF:'); !!}
                {!! Form::text('cpf', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Somente números',]); !!}
            </div>

            <div class="col-sm-3">
                {!! Form::label('email', 'E-mail:'); !!}
                {!! Form::text('email', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'colaborador@atlastechnol.com',]); !!}
            </div>

            <div class="col-sm-2">
                {!! Form::label('phone', 'Telefone:'); !!}
                {!! Form::text('phone', null, [
                                    'class' => 'form-control',
                                    'placeholder' => '53911223344',]); !!}
               </div>

            <div class="col-sm-5">
                {!! Form::label('adress', 'Endereço:'); !!}
                {!! Form::text('adress', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'R. Exemplerino de Formulário',]); !!}
           </div>

            <div class="col-sm-1">
                {!! Form::label('adressNumber', 'Número:'); !!}
                {!! Form::text('adressNumber', null, [
                                    'class' => 'form-control',
                                    'placeholder' => '1067 B',]); !!}
            </div>

            <div class="col-sm-4">
                {!! Form::label('adressNumberInfo', 'Complemento:'); !!}
                {!! Form::text('adressNumberInfo', null, [
                                    'class' => 'form-control',
                                    'placeholder' => 'Entrada pela lateral',]); !!}
            </div>
        </div>

        <div id="submitButton" style="padding-top: 10px;">
            {!! Form::submit('Salvar', ['class' => 'btn btn-info']); !!}
        </div>

        {!! Form::close() !!}
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

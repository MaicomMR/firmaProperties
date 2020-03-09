@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')



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

    @if (isset($estate_object))
@section('content_header')
    <h1>Editar patrimônio</h1>
@stop
{!! Form::model($estate_object, [
'route' => ['estateEdit', $estate_object->id],
'class' => 'form',
'method' => 'put',
'files' => true
]) !!}

@else
@section('content_header')
    <h1>Adicionar novo patrimônio</h1>
@stop
{!! Form::open([
'route' => 'estateAdd',
'class' => 'form']) !!}
@endif

{!! Form::token(); !!}


<div class="container">
    <div class="row">
        <div class="col-2">
            {!! Form::label('id', 'Código Interno'); !!}
            {!! Form::text('id', null, [
                                'class' => 'form-control',
                                'placeholder' => '0',
                                'disabled']); !!}
        </div>
        <div class="col-2">
            {!! Form::label('label_id', 'Código Etiqueta'); !!}
            {!! Form::text('label_id', null, [
                                'class' => 'form-control',
                                'placeholder' => '0430']); !!}
        </div>

        <div class="form-group col-6">
            {!! Form::label('name', 'Nome do patrimônio'); !!}
            {!! Form::text('name', null, [
    'class' => 'form-control',
     'placeholder' => 'Nome ou modelo do equipamento']); !!}
            <small id="emailHelp" class="form-text text-muted">Este nome será exibido na listagem de
                patrimônios.</small>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-2">
            {!! Form::label('billOfSale', 'Nota Fiscal'); !!}
            {!! Form::text('billOfSale', null, [
    'class' => 'form-control',
     'placeholder' => '4320 0261 5858 6519 9306 6500 2000 0280 6311 3041 1317']); !!}
            <small id="emailHelp" class="form-text text-muted">
                Você pode adicionar uma nova nota fiscal clicando aqui.
            </small>
        </div>

        <div class="form-group col-2">
            {!! Form::label('value', 'Valor do bem'); !!}
            {!! Form::number('value', null, [
    'class' => 'form-control',
     'placeholder' => '1278,97']); !!}
        </div>

        <div class="dropdown col-3">
            {!! Form::label('categories_id', 'Categoria'); !!}
            <div class="input-group">
                {!! Form::select('categories_id', [$categoriesPlucked], null, [
                        'placeholder' => 'Selecione uma categoria',
                        'class' => 'custom-select']); !!}
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary bg-green" type="button">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="dropdown col-3">
            {!! Form::label('sub_categories_id', 'Sub-Categoria'); !!}

            <div class="input-group">
                {!! Form::select('sub_categories_id', [$subCategoriesPlucked], null, [
                    'placeholder' => 'Selecione uma sub-categoria',
                    'class' => 'custom-select']); !!}
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary bg-green" type="button">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    {!! Form::submit('Click Me!', ['class' => 'btn btn-info']); !!}




    {!! Form::close() !!}
    @stop


    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

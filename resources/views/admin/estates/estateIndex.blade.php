@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Listagem de Categorias e Sub-Categorias</h1>
@stop

@section('content')

{{--{{dd($EstateList)}}--}}


    <div class="container">
        <div class="row">
            <div class="col-sm-12">


                <div class="topTable">
                    <i class="fa fa-tag" aria-hidden="true"></i>
                    ADICIONAR NOVA CATEGORIA
                </div>



                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th scope="col">patrimônio</th>
                        <th scope="col">nome</th>
                        <th scope="col">valor</th>
                        <th scope="col">categoria</th>
                        <th scope="col">sub-categoria</th>
                        <th scope="col">fornecedor</th>
                    <tr>
                    </thead>

                    @foreach($EstateList as $EstateList)
                        <th scope="row">{{$EstateList->label_id}}</th>
                        <th scope="row">{{$EstateList->name}}</th>
                        <th scope="row">{{$EstateList->value}}</th>
                        <th scope="row">{{$EstateList->categories_id}}</th>
                        <th scope="row">{{$EstateList->sub_categories_id}}</th>
                        <th scope="row">{{$EstateList->seller_id}}</th>

                        </tr>
                    @endforeach


                </table>
            </div>
        </div>
    </div>


@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

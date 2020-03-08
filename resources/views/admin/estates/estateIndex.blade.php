@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Listagem de Patrimônios</h1>
@stop

@section('content')

    {{--{{dd($EstateList)}}--}}

    <div class="container">


        <div class="row">
            <div class="col-sm-12">



                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th scope="col">patrimônio</th>
                        <th scope="col">nome</th>
                        <th scope="col">valor</th>
                        <th scope="col">categoria</th>
                        <th scope="col">sub-categoria</th>
                        <th scope="col">fornecedor</th>
                        <th scope="col">ações</th>
                    <tr>
                    </thead>

                    @foreach($EstateList as $EstateList)
                        <th scope="row">{{$EstateList->label_id}}</th>
                        <th scope="row">{{$EstateList->name}}</th>
                        <th scope="row">{{$EstateList->value}} R$</th>
                        <th scope="row">{{$EstateList->category[0]->name}}</th>
                        <th scope="row">{{$EstateList->subcategory[0]->name}}</th>
                        <th scope="row">{{$EstateList->seller[0]->name}}</th>
                        <th scope="row">
                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-eye"aria-hidden="true"></i>
                            </button>
                            <a href="{{ route('estateEdit', $EstateList->id)}}">
                            <button  type="button" class="btn btn-primary">
                                <i class="fas fa-pencil-alt"></i>
                            </button></a>

                            <button type="button" class="btn btn-danger" style="margin-left: 20px">
                                <i class="fas fa-trash-alt"></i>
                            </button>

                        </th>
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

@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Listagem de Patrimônios</h1>
@stop

@section('content')

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



                    @foreach($EstateList as $Estate)

{{--                        {{dd($Estate->category)}}--}}

                        <th scope="row">{{$Estate->label_id}}</th>
                        <th scope="row">{{$Estate->name}}</th>
                        <th scope="row">{{$Estate->value}} R$</th>
                        <th scope="row">{{$Estate->category->name}}</th>
                        <th scope="row">{{$Estate->subcategory->name}}</th>
                        <th scope="row">
                        @if($Estate->seller)
                            {{$Estate->seller->name}}
                        @endif
                        </th>

                        <th scope="row">

                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>

                            <a class="btn btn-primary" href="{{ route('estateEdit', $Estate->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                            @include('modal.confirmDeleteModal')
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

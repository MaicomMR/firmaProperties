@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Listagem de Categorias e Sub-Categorias</h1>
@stop

@section('content')




    <div class="container">
        <div class="row">
            <div class="col-sm-6">

                <a href="{{route('categoriesCreateForm')}}">
                <div class="topTable">
                    <i class="fa fa-tag" aria-hidden="true"></i>
                    ADICIONAR NOVA CATEGORIA
                </div>
                </a>



                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Categoria</th>
                    <tr>
                    </thead>

                    @foreach($categories as $category)
                        <th scope="row">{{$category->id}}</th>
                        <td>{{$category->name}}</td>
                        </tr>
                    @endforeach

                </table>


            </div>
            <div class="col-sm-6">
                <a href="{{route('subcategoriesCreateForm')}}">
                <div class="topTable">
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    ADICIONAR NOVA SUB-CATEGORIA
                </div>
                </a>

                <table class="table table-striped">

                    <thead>
                    <tr>
                        <th scope="col">Código</th>
                        <th scope="col">Sub-Categoria</th>
                    <tr>
                    </thead>

                    @foreach($subCategories as $sub_category)
                        <th scope="row">{{$sub_category->id}}</th>
                        <td>{{$sub_category->name}}</td>
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

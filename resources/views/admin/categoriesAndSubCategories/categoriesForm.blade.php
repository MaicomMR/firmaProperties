@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Adicionar Categorias</h1>
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
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="col-sm-auto">



        <form action="{{route('categoriesStore')}}" method="post">
            @csrf
            <div class="col-md-11" style="display: flex;">
                <div class="form-group col-md">
                    <label>Nome da categoria:</label>
                    <input type="text" class="form-control" placeholder="Mobília" name="category">
                </div>
                <div class="col-md-2" style="margin-top: 30px">
                    <button type="submit" class="btn btn-block bg-gradient-success btn-flat d-inline-block">Salvar
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> Atenção!</h5>
        Recomendamos muita cautela ao criar uma nova categoria, por favor, verifique(abaixo) primeiro se já não há nenhuma
        categoria que supra as suas necessidades, categorias NÃO devem ser removidas da base de dados.
    </div>

    <div class="tables" style="display: flex; margin-top: 20px;">
        <div class="card col-md-5 m-1">
            <div class="card-header">
                <h3 class="card-title">Categorias já cadastradas</h3>
            </div>
            {{--    Table    --}}
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">Código</th>
                        <th>Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card col-md-6 m-1">
            <div class="card-header">
                <h3 class="card-title">Sub-Categorias já cadastradas</h3>
            </div>
            {{--    Table    --}}
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 10px">Código</th>
                        <th>Categoria</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subCategories as $Subcategory)
                        <tr>
                            <td>{{$Subcategory->id}}</td>
                            <td>{{$Subcategory->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
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

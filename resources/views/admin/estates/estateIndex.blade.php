@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">

@stop



@section('content')
    <h1>Listagem de Patrimônios</h1>


    <!-- Download PDF options-->
    <div class="row">
        <div class="info-box col-sm-3" onclick="window.open('{{route('printActiveEstates')}}');"
             style="cursor: pointer;">
            <span class="info-box-icon bg-success"><i class="fas fa-file-pdf"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PDF Patrimônios Ativos</span>
                <span class="info-box-number">{{$activeEstateCount}} itens</span>
            </div>
        </div>

        <div class="info-box col-sm-3" onclick="window.open('{{route('printDeletedEstates')}}');"
             style="cursor: pointer; margin-left: 10px;">
            <span class="info-box-icon bg-danger"><i class="fas fa-file-pdf"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">PDF Patrimônios Inativos</span>
                <span class="info-box-number">{{$inactiveEstateCount}} itens</span>
            </div>
        </div>


        <div class="info-box col-sm-3" onclick="window.location=('{{route('historyIndex')}}');"
             style="cursor: pointer; margin-left: 10px;">
            <span class="info-box-icon bg-dark"><i class="fas fa-book"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Histórico</span>
            </div>
        </div>
    </div>

    @if(session()->has('message'))

        <div class="alert alert-warning" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <a href="{{route('estateAddPage')}}">
        <div class="btn-success" style="padding: 10px">
            <h4 class="text-center"><i class="fa fa-plus-circle" style="padding: 10px"></i>Adicionar patrimônio</h4>
        </div>
    </a>

    <div class="">
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


                        <th scope="row" class="text-right">
                            {{$Estate->label_id}}
                        </th>
                        <th scope="row">{{$Estate->name}}</th>
                        <th scope="row">{{number_format($Estate->value, 2, ',', ' ')}} R$</th>
                        <th scope="row">{{$Estate->category->name}}</th>
                        <th scope="row">{{$Estate->subcategory->name}}</th>
                        <th scope="row">
                            @if($Estate->seller)
                                {{$Estate->seller->name}}
                            @endif

                        </th>




                        <th scope="row">
                            {{--    See estate button   --}}
                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>

                            {{--    Edit estate button   --}}
                            <a class="btn btn-primary" href="{{ route('estateEdit', $Estate->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>

                            {{--    Delete estate button   --}}
                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#confirmDeleteModal"
                               onclick="deleteData({{$Estate}})">
                                <i class="fas fa-trash-alt"></i>
                            </a>

                            {{--    Assign to employee button   --}}
                            @if($Estate->employee_id)
                                <a href="{{route('employeeProfile', $Estate->employee_id)}}">
                                    <button type="button" class="btn btn-secondary">
                                        <i class="fas fa-user-tag"></i>
                                    </button>
                                </a>
                            @else
                                <a class="btn btn-success" href="#" data-toggle="modal"
                                   data-target="#confirmAssignModal"
                                   onclick="assignDataToEmployee({{$Estate}})">
                                    <i class="fas fa-user-plus"></i>
                                </a>
                            @endif

                            {{-- Confirm delete modal --}}
                            @include('admin.estates.estateConfirmDeleteModal')

                            {{-- Confirm assign modal --}}
                            @include('admin.estates.estateConfirmAssignModal')
                        </th>
                        </tr>
                    @endforeach

                </table>
                {{ $EstateList->links() }}

            </div>
        </div>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop




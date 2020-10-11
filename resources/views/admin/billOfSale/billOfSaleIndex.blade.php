@extends('adminlte::page')

@section('title', 'Listagem de Notas Fiscals')

@section('content_header')
    <h1>Listagem de Notas Fiscals</h1>
@stop



@section('content')


<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Número da Nota</th>
        <th scope="col">Fornecedor</th>
        <th scope="col">Cadastrada em:</th>
        <th scope="col">Valor total</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach($billOfSales as $billofSale)
            <td>{{$billofSale->billNumber}}</td>
            <td>{{$billofSale->seller->name}}</td>
            <td>{{$billofSale->created_at}}</td>
            <td>{{$billofSale->totalValue}}</td>
            <td>
{{--                <a class="btn btn-warning" href="{{ route('employeeProfile', $employee->id)}}">--}}
                    <i class="fa fa-eye"></i>
{{--                </a>--}}

{{--                <a class="btn btn-primary" href="{{ route('employeeEdit', $employee->id)}}">--}}
                    <i class="fas fa-pencil-alt"></i>
{{--                </a>--}}

{{--                <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModal"--}}
                    <i class="fas fa-trash-alt"></i>
{{--                </a>--}}
            </td>
    </tr>
    @endforeach
    </tr>
    </tbody>
</table>

@stop


@section('css')
@stop

@section('js')

@stop

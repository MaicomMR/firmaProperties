@extends('adminlte::page')

@section('title', 'Histórico de patrimônios')

@section('content_header')

@stop



@section('content')
    <h2>Histórico de atribuições/desatribuições de Patrimônios</h2>




    <table class="table">
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Código Patrimônio</th>
            <th scope="col">Nome Patrimônio</th>
            <th scope="col">Colaborador</th>
            <th scope="col">Data:</th>
            <th scope="col">Ações:</th>
        </tr>
        </thead>
        <tbody>


    @foreach($estateHistories as $EstateHistory)

{{--        ícone de atribuição / destribuição --}}
        <tr>
            <td>
                <div class="flex text-center">
                    @if($EstateHistory->assign)
                        <div class="btn-success" style="height: 100%; padding: 5px">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    @else
                        <div class="btn-danger" style="height: 100%; padding: 5px">
                            <i class="fas fa-user-minus"></i>
                        </div>
                    @endif
                </div>
            </td>


            <td>{{$EstateHistory->estate->label_id}}</td>
            <td>{{$EstateHistory->estate->name}}</td>

            @if(isset($EstateHistory->employee->name))
                <td>{{$EstateHistory->employee->name}}</td>
            @else
                <td> - </td>
            @endif

            <td>{{date('d/m/Y', strtotime($EstateHistory->updated_at))}}</td>
            <td>


{{--                TODO: LINK DIRECIONANDO PARA O COLABORADOR--}}
                <button type="button" class="btn btn-info">
                    <i class="fas fa-user-tag button"></i>
                </button>

{{--                TODO: LINK DIRECIONANDO PARA O PATRIMÔNIO--}}
                <button type="button" class="btn btn-success">
                    <i class="fas fa-archive"></i>
                </button>
            </td>
        </tr>
    @endforeach
        </tbody>
    </table>

@stop





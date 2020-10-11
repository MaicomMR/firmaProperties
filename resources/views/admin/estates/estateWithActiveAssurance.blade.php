@extends('adminlte::page')

@section('title', 'Histórico de patrimônios')

@section('content_header')

@stop

@php
    \Carbon\Carbon::setLocale('pt_BR');
@endphp

@section('content')
    <h2>Patrimônios com Garantia</h2>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Código Patrimônio</th>
            <th scope="col">Nome Patrimônio</th>
            <th scope="col">Data do cadastro:</th>
            <th scope="col">Garantia até:</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>

    @foreach($estatesWithActiveAssurance as $Estate)

        <tr>
            <td>{{$Estate->label_id}}</td>
            <td>{{$Estate->name}}</td>
            <td>{{$Estate->created_at->format('m-d-Y')}}</td>
            <td>{{\Carbon\Carbon::parse($Estate->assurance_cover_date)->format('m-d-Y') . ' (' . \Carbon\Carbon::parse($Estate->assurance_cover_date)->diffForHumans() . ')'}}</td>

            <td class="text-right">
            @if(isset($Estate->employee_id))
                <a type="button" class="btn btn-info" href="{{ route('employeeProfile', $Estate->employee_id)}}">
                    <i class="fas fa-user-tag button"></i>
                </a>
            @endif

            <a type="button" class="btn btn-success" href="{{ route('estateEdit', $Estate->id)}}">
                <i class="fas fa-archive"></i>
            </a>
            </td>

        </tr>
    @endforeach
        </tbody>
    </table>

@stop





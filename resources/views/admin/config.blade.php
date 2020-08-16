@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')



@section('css')
    <link rel="stylesheet" href="/css/superAdminStyle.css">
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



    <h3>    Olá {{Auth::user()->name}}</h3>

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Configurações:</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            Valor de alerta para baixa:
            <div class="input-group" data-toggle="tooltip" title="Se algum colaborador der baixa de um bem com valor superior ao informado no campo a baixo será disparado um alerta">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control">
                <div class="input-group-append">
                    <span class="input-group-text">,00</span>
                </div>
            </div>

            Valor de alerta para baixas diárias:
            <div class="input-group" data-toggle="tooltip" title="Se em um dia for dado baixa de bens que a soma de valor seja superior ao informado no campo a baixo será disparado um alerta">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control">
                <div class="input-group-append">
                    <span class="input-group-text">,00</span>
                </div>
            </div>

            Valor de alerta para baixas mensais:
            <div class="input-group" data-toggle="tooltip" title="Se em um mês for dado baixa de bens que a soma de valor seja superior ao informado no campo a baixo será disparado um alerta">
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                </div>
                <input type="text" class="form-control">
                <div class="input-group-append">
                    <span class="input-group-text">,00</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card card-green">
        <div class="card-header">
            <h3 class="card-title">Acessos:</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Nome</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">E-mail</th>
                    <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" aria-sort="descending">Tipo de acesso</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Cadastrado em:</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ações:</th>
                </thead>
                <tbody>
                <tr role="row" class="odd">
                    <td class="" tabindex="0">Isis Alícia Viana</td>
                    <td>isisaliciaviana@goldfinger.com.br</td>
                    <td class="sorting_1">Admin</td>
                    <td>16 de Ago de 2020</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-flat"><i class="fas fa-user-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-warning btn-flat">Tornar Super Admin</button>
                    </td>
                </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-block bg-gradient-success btn-lg col-sm-3" style="margin-top: 10px">Cadastrar novo acesso</button>
        </div>
    </div>

    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title">Lista de e-mail de Relatórios Mensais:</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Nome</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">E-mail</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Cadastrado em:</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ações:</th>
                </thead>
                <tbody>
                <tr role="row" class="odd">
                    <td class="" tabindex="0">Isis Alícia Viana</td>
                    <td>isisaliciaviana@goldfinger.com.br</td>
                    <td>16 de Ago de 2020</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-flat"><i class="fas fa-user-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-block bg-gradient-warning btn-lg col-sm-3" style="margin-top: 10px">Adicionar e-mail</button>
        </div>
    </div>

    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">Lista de e-mail de Alerta:</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
            </div>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">Nome</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">E-mail</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Cadastrado em:</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ações:</th>
                </thead>
                <tbody>
                <tr role="row" class="odd">
                    <td class="" tabindex="0">Isis Alícia Viana</td>
                    <td>isisaliciaviana@goldfinger.com.br</td>
                    <td>16 de Ago de 2020</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-flat"><i class="fas fa-user-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-flat"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
                </tbody>
            </table>
            <button type="button" class="btn btn-block bg-gradient-danger btn-lg col-sm-3" style="margin-top: 10px">Adicionar e-mail</button>
        </div>
    </div>


{{--    TODO: TRABALHAR NA RESPONSIVIDADE--}}
@stop

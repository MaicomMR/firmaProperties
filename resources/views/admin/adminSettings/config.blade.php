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

    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif

    <h3> Olá {{Auth::user()->name}}</h3>

    @if(Auth::user()->admin_level == 1)
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-cog" aria-hidden="true"></i>
                Configurações:</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body row-cols-12">

            <form action="{{route('updateAdminAlertValues')}}" method="post">
                @csrf


            <div class="col-sm-auto d-inline-block">
                Valor de alerta para baixa:
                <div class="input-group" data-toggle="tooltip"
                     title="Se algum colaborador der baixa de um bem com valor superior ao informado no campo a baixo será disparado um alerta">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control text-right" value="{{$alertValues[0]->write_off_value_alert}}" name="write_off_value_alert">
                    <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-auto d-inline-block">
                Valor de alerta para baixas diárias:
                <div class="input-group" data-toggle="tooltip"
                     title="Se em um dia for dado baixa de bens que a soma de valor seja superior ao informado no campo a baixo será disparado um alerta">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text"
                           class="form-control text-right"
                           value="{{$alertValues[0]->day_write_off_value_alert}}"
                           name="day_write_off_value_alert"
                           id="aa">
                    <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                    </div>
                </div>
            </div>

            <div class="col-sm-auto d-inline-block">
                Valor de alerta para baixas mensais:
                <div class="input-group" data-toggle="tooltip"
                     title="Se em um mês for dado baixa de bens que a soma de valor seja superior ao informado no campo a baixo será disparado um alerta">
                    <div class="input-group-prepend">
                        <span class="input-group-text">$</span>
                    </div>
                    <input type="text" class="form-control text-right" value="{{$alertValues[0]->month_write_off_value_alert}}" name="month_write_off_value_alert">
                    <div class="input-group-append">
                        <span class="input-group-text">,00</span>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-block bg-gradient-primary btn-lg col-sm-3" style="margin-top: 10px">
                Salvar alterações
            </button>
            </form>
        </div>
    </div>
    @endif

    <div class="card card-green">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-user" aria-hidden="true"></i> Acessos:</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                   aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column ascending">Nome
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending">E-mail
                    </th>
                    <th class="sorting_desc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Platform(s): activate to sort column ascending" aria-sort="descending">Tipo de
                        acesso
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending">Cadastrado em:
                    </th>
                    @if(Auth::user()->admin_level == 1)
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending">Ações:
                    </th>
                    @endif
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr role="row" class="odd">
                        <td class="" tabindex="0">{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->admin_level == 0)
                                Administrador
                            @else
                                Super Admin
                            @endif
                        </td>
                        <td>
                            @if($user->created_at != null)
                                {{($user->created_at)->diffForHumans()}}
                            @else
                                -
                        @endif
                        @if(Auth::user()->admin_level == 1)

                        <td>
                            <a type="button" class="btn btn-primary btn-flat" href="{{ route('adminAcessIndex', ['id' => $user->id])}}"><i class="fas fa-user-edit"></i>
                            </a>
                            @if($user->admin_level == 0)
                                <a type="button" class="btn btn-warning btn-flat" href="{{route('giveSuperAdminToUser', ['id' => $user->id])}}">Tornar Super Admin</a>
                            @else
                                <a type="button" class="btn btn-danger btn-flat" href="{{route('revokeSuperAdminToUser', ['id' => $user->id])}}">Remover Super Admin</a>
                            @endif

                        </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a type="button" class="btn btn-block bg-gradient-success btn-lg col-sm-4" style="margin-top: 10px" href="{{route('adminAcessIndex')}}">
                Cadastro e edição de acessos
            </a>
        </div>
    </div>


    <div class="card card-warning">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-envelope" aria-hidden="true"></i>
                Lista de e-mail (Relatórios e Alertas):</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        @if($emailsList != null)
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                   aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Rendering engine: activate to sort column ascending">Nome
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Browser: activate to sort column ascending">E-mail
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending">Cadastrado em:
                    </th>

                    @if(Auth::user()->admin_level == 1)
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"
                        aria-label="Engine version: activate to sort column ascending">Ações:
                    </th>
                    @endif
                </thead>
                <tbody>
                @foreach($emailsList as $email)
                <tr role="row" class="odd">
                    <td class="" tabindex="0">
                        @if($email->name)
                            {{$email->name}}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{$email->email}}</td>
                    <td>
                        {{($email->created_at)->diffForHumans()}}
                    </td>
                    @if(Auth::user()->admin_level == 1)
                    <td>
                        <a type="button" class="btn btn-primary btn-flat" href="{{ route('editEmailOnMailingList', ['id' => $email->id])}}"><i class="fas fa-user-edit"></i></a>
                        <a type="button" class="btn btn-danger btn-flat" onclick="openDeleteModal({{$email->id}})" data-toggle="modal" data-target="#modal-danger"><i class="fas fa-trash-alt" style="color: white;"></i></a>
                    </td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
            @endif
            <a type="button" class="btn btn-block bg-gradient-warning btn-lg col-sm-3" style="margin: 10px" href="{{ route('mailListIndex') }}">
                Adicionar e-mail
            </a>
        </div>
    </div>

    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Você tem certeza que deseja remover esse e-mail?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <i class="fas fa-trash-alt text-center" style="margin: 80px; font-size: 10vw"></i>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                    @if(isset($email))
                    <a type="button" class="btn btn-outline-light" onclick="confirmDelete({{$email->id}})">DELETAR</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script type=text/javascript>
        let itemId = "";
        function openDeleteModal(id)
        {
            itemId = id;
        }
        function confirmDelete()
        {
            let url = "{{ route('deleteEmailingFromList', ':id') }}";
            url = url.replace(':id', itemId);
            document.location.href=url;
        }
    </script>
    {{--    TODO: TRABALHAR NA RESPONSIVIDADE--}}
@stop


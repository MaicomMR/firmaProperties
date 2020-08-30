@extends('adminlte::page')

@section('title', 'Lista de e-mails')



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
    @if(session()->has('error-message'))
        <div class="alert alert-warning" role="alert">
            {{ session()->get('error-message') }}
        </div>
    @endif


    <h3> Olá {{Auth::user()->name}}</h3>



    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-user" aria-hidden="true"></i>
                Cadastrar novo acesso:</h3>
        </div>
        <div class="card-body row-cols-12">

            @if($editUser == null)
                <form action="{{route('createAcessIndex')}}" method="post">
                    @else
                        <form action="{{route('updateAcessData', ['id' => $editUser->id])}}" method="post">
                            @method('PUT')
                            @endif

                            @csrf
                            <div class="col-sm-3 d-inline-block">
                                Nome:
                                <div class="input-group" data-toggle="tooltip"
                                     title="Nome">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                                    </div>
                                    <input type="text" class="form-control"
                                           value="@if($editUser != null) {{$editUser->name}} @endif" name="name">
                                </div>
                            </div>

                            <div class="col-sm-3 d-inline-block">
                                E-mail:
                                <div class="input-group" data-toggle="tooltip"
                                     title="E-mail">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="text" class="form-control text-right"
                                           value="@if($editUser != null) {{$editUser->email}} @endif" name="email">
                                </div>
                            </div>

                            <div class="col-sm-2 d-inline-block">
                                Senha:
                                <div class="input-group" data-toggle="tooltip"
                                     title="E-mail do recebedor (opcional)">
                                    <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-unlock-alt"
                                                                  aria-hidden="true"></i></span>
                                    </div>
                                    <input type="password" class="form-control text-right" value="" name="password">
                                </div>
                            </div>

                            <div class="col-sm-2 d-inline-block">
                                Confirmar senha:
                                <div class="input-group" data-toggle="tooltip"
                                     title="">
                                    <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-unlock-alt"
                                                                  aria-hidden="true"></i></span>
                                    </div>
                                    <input type="password" class="form-control text-right" value=""
                                           name="passwordConfirmation">
                                </div>
                            </div>


                            <button type="submit" class="col-sm-1 d-inline-block btn btn-lg bg-gradient-primary">
                                @if($editUser == null)
                                    Salvar
                                @else
                                    Editar
                                @endif
                            </button>
                        </form>
        </div>
    </div>


    <div class="card card-success">
        <div class="card-header">
            <h3 class="card-title"><i class="fa fa-user" aria-hidden="true"></i>
                Lista de Acessos:</h3>
        </div>
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
                            <a type="button" class="btn btn-danger btn-flat"
                               onclick="openDeleteModal(['{{$user->id}}', '{{$user->name}}', '{{$user->email}}'])"
                               data-toggle="modal" data-target="#modal-danger"><i class="fas fa-trash-alt"
                                                                                  style="color: white;"></i></a>

                            @if($user->admin_level == 0)
                                <a type="button" class="btn btn-warning btn-flat"
                                   href="{{route('giveSuperAdminToUser', ['id' => $user->id])}}">Tornar Super Admin</a>
                            @else
                                <a type="button" class="btn btn-danger btn-flat"
                                   href="{{route('revokeSuperAdminToUser', ['id' => $user->id])}}">Remover Super
                                    Admin</a>
                            @endif

                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-danger">
                <div class="modal-header">
                    <h4 class="modal-title">Você tem certeza que deseja remover o acesso desse usuário?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <i class="fas fa-trash-alt text-center" style="margin: 80px; font-size: 5vw"></i>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cancelar</button>
                    <a type="button" class="btn btn-outline-light" onclick="confirmDelete({{$user->id}})">DELETAR</a>
                </div>
            </div>
        </div>
    </div>

    <script type=text/javascript>
        let itemId = "";

        function openDeleteModal(id) {
            console.log(id);
            itemId = id[0];
        }

        function confirmDelete() {
            let url = "{{ route('removeUserAcess', ':id') }}";
            url = url.replace(':id', itemId);
            document.location.href = url;
        }
    </script>


    {{--    TODO: TRABALHAR NA RESPONSIVIDADE--}}
@stop


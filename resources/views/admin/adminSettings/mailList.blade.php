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

    <h3> Olá {{Auth::user()->name}}</h3>

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

            @if($emailToEdit)
                <form action="{{route('updateEmailOnMailingList', ['id' => $emailToEdit->id])}}" method="post">
                @method('PUT')
            @else
                <form action="{{route('storeEmailOnMailingList')}}" method="post">
            @endif

                @csrf

                <div class="col-sm-3 d-inline-block">
                    Nome do recebedor (opcional):
                    <div class="input-group" data-toggle="tooltip"
                         title="Nome do recebedor (opcional)">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-id-card-alt"></i></span>
                        </div>
                        <input type="text" class="form-control" value="@if($emailToEdit) {{$emailToEdit->name}} @endif" name="name">
                    </div>
                </div>

                <div class="col-sm-3 d-inline-block">
                    E-mail (obrigatório):
                    <div class="input-group" data-toggle="tooltip"
                         title="E-mail do recebedor (opcional)">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                        </div>
                        <input type="text" class="form-control text-right" value="@if($emailToEdit){{$emailToEdit->email}} @endif" name="email">
                    </div>
                </div>


                <div class="col-sm-1 d-inline-block text-center">
                    Receber Alertar
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" id="alertSwitch" name="alertAboveValues"@if($emailToEdit) @if($emailToEdit->alertAboveValues == 1)checked @endif @endif>
                        <label class="custom-control-label" for="alertSwitch"></label>
                    </div>
                </div>


                <div class="col-sm-1 d-inline-block text-center">
                    Receber Relatórios
                    <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                        <input type="checkbox" class="custom-control-input" id="reportSwitch" name="monthReports" @if($emailToEdit) @if($emailToEdit->monthReports == 1)checked @endif @endif>

                        <label class="custom-control-label" for="reportSwitch"></label>
                    </div>
                </div>

                @if($emailToEdit == null)
                <button type="submit" class="col-sm-2 d-inline-block btn btn-lg bg-gradient-primary" style="margin-left: 20px">
                    Salvar
                </button>
                @else
                <button type="submit" class="col-sm-2 d-inline-block btn btn-lg bg-gradient-primary" style="margin-left: 20px">
                    Editar
                </button>
                @endif
            </form>


            <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" role="grid"
                   aria-describedby="example2_info" style="margin-top: 20px;">
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
                    <th class="sorting  text-center" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Alertas:
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Relatórios:
                    </th>
                    @if(Auth::user()->admin_level == 1)
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1">Ações:
                    </th>
                    @endif
                </thead>
                <tbody>
                @if($mailList != null)
                @foreach($mailList as $mailer)
                <tr role="row" class="odd">
                    <td class="" tabindex="0">
                        @if($mailer->name)
                            {{$mailer->name}}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{$mailer->email}}</td>
                    <td>16 de Ago de 2020</td>
                    <td class="text-center">
                        @if($mailer->alertAboveValues == 1)
                            <button type="button" class="btn btn-success btn-flat"><i class="fas fa-thumbs-up"></i></button>
                        @else
                            <button type="button" class="btn btn-danger btn-flat"><i class="fas fa-thumbs-down"></i></button>
                        @endif
                    </td>
                    <td class="text-center">
                        @if($mailer->monthReports == 1)
                            <button type="button" class="btn btn-success btn-flat"><i class="fas fa-thumbs-up"></i></button>
                        @else
                            <button type="button" class="btn btn-danger btn-flat"><i class="fas fa-thumbs-down"></i></button>
                        @endif
                    </td>

                    @if(Auth::user()->admin_level == 1)
                    <td class="text-center">
                        <a type="button" class="btn btn-primary btn-flat" href="{{ route('editEmailOnMailingList', ['id' => $mailer->id])}}"><i class="fas fa-user-edit"></i></a>
                        <a type="button" class="btn btn-danger btn-flat" onclick="openDeleteModal({{$mailer->id}})" data-toggle="modal" data-target="#modal-danger"><i class="fas fa-trash-alt" style="color: white;"></i></a>
                    </td>
                    @endif

                </tr>
                @endforeach
                @endif
                </tbody>
            </table>

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
                        @if(isset($mailer))
                        <a type="button" class="btn btn-outline-light" onclick="confirmDelete({{$mailer->id}})">DELETAR</a>
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


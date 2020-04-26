@extends('adminlte::page')

@section('title', 'Listagem de colaboradores')


@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Listar colaboradores</h1>

    @if(session()->has('message'))

        <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
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
        <ul>

        </ul>
    @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">Ações</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                @foreach($employees as $employee)
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->cpf}}</td>
                    <td>
                        <button type="button" class="btn btn-warning">
                            <i class="fa fa-eye" aria-hidden="true"></i>
                        </button>

                        <a class="btn btn-primary" href="{{ route('employeeEdit', $employee->id)}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModal"
                           onclick="deleteData({{$employee}})">
                            <i class="fas fa-trash-alt"></i>
                        </a>

                        {{--   MODAL PARA CONFIRMAR A DELEÇÃO DO ÍTEM   --}}
                        {{--              REFACTOR IS COMING            --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">


                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">
                                                <span id="itemId">

                                                </span>

                                            Você deseja remover este colaborador?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body text-center">
                                        <i class="fas fa-trash-alt bg-danger rounded-circle"
                                           style="font-size: 4em; padding: 1em;"></i>
                                        <br>Nome do colaborador:<br>
                                        <h5 id="employeeName"></h5>
                                            <br>


                                    </div>
                                    <div class="modal-footer">
                                        <a href="#" onclick="confirmDelete()" value="teste" id="confirmDelete">
                                            <button class="btn btn-danger">REMOVER</button>
                                        </a>
                                        <button type="button" class="btn btn-info" data-dismiss="modal">CANCELAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </td>
            </tr>
            @endforeach
            </tr>
            </tbody>
        </table>

@stop

@section('css')
            <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script type="text/javascript">
        let employeeId = "";

        function deleteData(employee) {
            var id = employee.id;
            var employeeName = employee.name;

            employeeId = id;

            var employeeNameField = document.getElementById("employeeName");

            employeeNameField.innerHTML = employeeName;
        }

        function confirmDelete() {
            let url = "{{ route('employeeDelete', ':id') }}";
            url = url.replace(':id', employeeId);
            document.location.href = url;
        }

    </script>
@stop

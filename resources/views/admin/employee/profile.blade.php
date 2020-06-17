@extends('adminlte::page')

@section('title', 'Perfil do colaborador')

@section('content_header')
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

    @if($employee->deleted_at)
        <div class="container btn-danger" style="padding: 10px">
            <h4 class="text-center"><i class="fa fa-ban" style="padding: 10px"></i>Colaborador removido da base de dados</h4>
        </div>
    @else
    <div class="container btn-success" style="padding: 10px">
        <h4 class="text-center"><i class="fa fa-plus-circle" style="padding: 10px"></i>Adicionar patrimônio ao colaborador</h4>
    </div>
    @endif
    <div class="container card text-center" style="padding: 20px">
        <h2>{{$employee->name}}</h2>

        <div class="row align-content-center" style="display: flex; align-items: center; justify-content: center;">


            <div class="employeeData">
                <i class="fa fa-id-card" style=""></i>CPF: {{$employee->cpf}} <br>
            </div>
            @if($employee->phone)
            <div class="employeeData">
                <i class="fa fa-phone-square"></i>{{$employee->phone}} <br>
            </div>
            @endif

            @if($employee->email)
            <div class="employeeData">
                <i class="fa fa-envelope"></i>{{$employee->email}} <br>
            </div>
            @endif

        </div>

        @if($employee->adress)
        <div class="row">
            <div class="col-sm">
                <i class="fa fa-map-signs"></i>{{$employee->adress}}, nº {{$employee->adressNumber}}@if($employee->adressNumberInfo), {{$employee->adressNumberInfo}}@endif <br>
            </div>
        </div>
        @endif
    </div>

    @foreach($EmployeeAssignedEstates as $EmployeeEstate)


        @include('admin.estates.estateConfirmUnassignFromEmployeeModal')
        @include('admin.estates.estateConfirmDeleteModal')

        <div class="container card-estate">
        <div class="estate-icon flex col-sm-2 text-center btn-secondary">

        {{-- icon switch blade--}}
        @include('admin.employee.estate-switch-icon')

        </div>
        <div class="estate-info flex col-sm-5">
            <div class="row">
            <div class="col-sm-12 text-center">
            <h2>{{$EmployeeEstate->name}}</h2>
            <i class="fa fa-tag" style="font-size: 1.2em"></i> <span style="font-size: 1.5em; padding-left: 0.2em;">Etiqueta: {{$EmployeeEstate->label_id}}</span><br>
            <i class="fa fa-calendar" style="font-size: 1.2em"></i> <span style="font-size: 1.5em; padding-left: 0.2em;">Concessão: {{date('d/m/Y', strtotime($EmployeeEstate->last_assign_date))}}</span><br>
            </div>
            <div class="col-sm-6">
                <span>Categoria: {{$EmployeeEstate->category->name}}</span><br>
                <span>Sub-categoria: {{$EmployeeEstate->subcategory->name}}</span><br>
            </div>
            <div class="col-sm-6">

                <span>Valor estimado: {{number_format($EmployeeEstate->value, 2, ',', ' ')}}R$</span><br>


                @isset($EmployeeEstate->seller->name)
                <span>Fornecedor: {{$EmployeeEstate->seller->name}}</span><br>
                @endisset
            </div>
            </div>
        </div>

        <div class="estate-options flex col-sm-5 row text-center">

            {{--    See estate data button    --}}
            <a  href="{{route('estateEdit', $EmployeeEstate->id)}}"
                class="col-sm-4 btn-dark estate-button-body">
                <i class="fa fa-eye estate-options-buttons" aria-hidden="true"></i>
                <p class="estate-button-text">Visualizar patrimônio</p><br>
            </a>

            {{--    Unregister estate from employee button    --}}
            <a href="" onclick="unassignEstate({{$EmployeeEstate}}, {{$employee}})" data-toggle="modal" data-target="#confirmUnassignModal"
               class="col-sm-4 btn-warning estate-button-body">
                <i class="fa fa-chevron-circle-down estate-options-buttons" aria-hidden="true"></i>
                <p class="estate-button-text">Desatribuir do colaborador</p><br>
            </a>

            {{--    Unregister estate button    --}}
            <a href="" onclick="writeOffEstate({{$EmployeeEstate}})" data-toggle="modal" data-target="#confirmDeleteModal"
               class="col-sm-4 btn-danger estate-button-body" style="border-radius: 0px 10px 10px 0px;">
                <i class="fa fa-minus-circle estate-options-buttons" aria-hidden="true"></i>
                <p class="estate-button-text">Dar baixa do patrimônio</p><br>
            </a>
        </div>
    </div>
    @endforeach

    <div class="container btn-warning" style="margin-top: 10px">
        <h4 class="text-center"><i class="fa fa-book" style="padding: 10px"></i>Histórico</h4>
    </div>
        <div class="row" style="display: flex; margin-left: 5px;">
            <div class="col-sm-12 text-center">
                <span> Ações recentes estarão posicionadas em cima</span><br>
            </div>
        </div>
    </div>


    @foreach($EmployeeAssignHistory as $EstateHistory)
        {{--TODO: REFATORAR FRONT END--}}

        <div class="container bg-gray-light" style="display: flex; align-items: flex-start;">
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

            <div class="row" style="display: flex; margin-left: 5px;">
                <div class="col-sm-12 text-center">
                    <span>{{$EstateHistory->estate->label_id}} - {{$EstateHistory->estate->name}} - </span>
                    <span style="">Data: {{date('d/m/Y', strtotime($EstateHistory->updated_at))}}</span><br>
                </div>
            </div>
        </div>
    @endforeach




@stop

@section('css')
    <link rel="stylesheet" href="/css/estate/estate-card.css">
@stop

@push('js')
    <script type="text/javascript">
        let itemId = "";
        function writeOffEstate(EstateObject)
        {
            var id = EstateObject.id;
            var itemName = EstateObject.name;
            var labelId = EstateObject.label_id;
            itemId = id;
            var codigoDoItem =  document.getElementById("itemId");
            var nomeDoItemElement =  document.getElementById("nomeDoItem");
            var numeroDaEtiquetaElement =  document.getElementById("label_id");
            nomeDoItemElement.innerHTML = itemName;
            numeroDaEtiquetaElement.innerHTML = labelId;
            codigoDoItem.innerHTML = id;

            console.log(id);
        }
        function confirmDelete() {
            let url = "{{ route('estateDelete', ':id') }}";
            url = url.replace(':id', itemId);
            document.location.href=url;
        }
    </script>
@endpush

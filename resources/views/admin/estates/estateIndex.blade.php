@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')

@section('content_header')

    <link rel="stylesheet" type="text/css" href="css/adminStyle.css">
    <h1>Listagem de Patrimônios</h1>
@stop



@section('content')


    @if(session()->has('message'))

        <div class="alert alert-warning" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif



    <div class="container">
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

                        <th scope="row">{{$Estate->label_id}}</th>
                        <th scope="row">{{$Estate->name}}</th>
                        <th scope="row">{{$Estate->value}} R$</th>
                        <th scope="row">{{$Estate->category->name}}</th>
                        <th scope="row">{{$Estate->subcategory->name}}</th>
                        <th scope="row">
                            @if($Estate->seller)
                                {{$Estate->seller->name}}
                            @endif

                        </th>




                        <th scope="row">
                            <button type="button" class="btn btn-warning">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>

                            <a class="btn btn-primary" href="{{ route('estateEdit', $Estate->id)}}">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger" href="#" data-toggle="modal" data-target="#exampleModal"

                               onclick="deleteData({{$Estate}})">

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

                                                - Você deseja remover esse ítem?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <i class="fas fa-trash-alt bg-danger rounded-circle"
                                               style="font-size: 4em; padding: 1em;"></i>
                                            <br>Número do patrimônio:<br>
                                            <h5 id="label_id"></h5>
                                            Você irá remover o patrimônio:<br>
                                            <h5 class="text-uppercase" id="nomeDoItem">
                                                <br></h5>


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

                        </th>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
    <script type="text/javascript">
        let itemId = "";

        function deleteData(EstateObject) {
            var id = EstateObject.id;
            var itemName = EstateObject.name;
            var labelId = EstateObject.label_id;

            itemId = id;


            var codigoDoItem = document.getElementById("itemId");
            var nomeDoItemElement = document.getElementById("nomeDoItem");
            var numeroDaEtiquetaElement = document.getElementById("label_id");
            nomeDoItemElement.innerHTML = itemName;
            numeroDaEtiquetaElement.innerHTML = labelId;
            codigoDoItem.innerHTML = id;
        }

        function confirmDelete() {
            let url = "{{ route('estateDelete', ':id') }}";
            url = url.replace(':id', itemId);
            document.location.href = url;
        }

    </script>
@stop

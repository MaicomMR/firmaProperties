{{--   MODAL PARA CONFIRMAR A DELEÇÃO DO ÍTEM   --}}
{{--              REFACTOR IS COMING            --}}
<div class="modal fade" id="confirmAssignModal" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">


    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Atribuir patrimônio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <select class="custom-select">
                    <option selected>Colaborador que você deseja atribuir</option>
                    @foreach($EmployeeList as $Employee)
                        <option value="{{$Employee->id}}">{{$Employee->name}}</option>
                    @endforeach
                </select>


            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


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

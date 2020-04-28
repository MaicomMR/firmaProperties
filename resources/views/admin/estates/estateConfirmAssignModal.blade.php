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
                <select id="employeeNameSelector" class="custom-select">
                    <option  selected value="null">Selecione o colaborador que você deseja atribuir</option>
                    @foreach($EmployeeList as $Employee)
                        <option value="{{$Employee->id}}">{{$Employee->name}}</option>
                    @endforeach
                </select>


            </div>
            <div class="modal-footer">

                <a href="#" onclick="confirmAssignDataToEmployee()" id="confirmAssign">
                    <button class="btn btn-success btn-lg btn-block">ATRIBUIR</button>
                </a>
            </div>
        </div>
    </div>
</div>

@push('js')
    <script type="text/javascript">
        var EstateId;
        var employeeId;
        function assignDataToEmployee(object) {
            EstateId = object.id;
            console.log(object.id);
        }


        function confirmAssignDataToEmployee() {

            var e = document.getElementById("employeeNameSelector");
            var strUser = e.options[e.selectedIndex].value;

            employeeId = e.options[e.selectedIndex].value;
            console.log(strUser);

            let url = "{{ route('assignEstateToEmployee', [':estate_id', ':employee_id']) }}";
            url = url.replace(':estate_id', EstateId);
            url = url.replace(':employee_id', employeeId);
            document.location.href = url;
        }

    </script>
@endpush

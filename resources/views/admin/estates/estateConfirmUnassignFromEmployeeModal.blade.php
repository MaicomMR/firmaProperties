<div class="modal fade" id="confirmUnassignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmUnassignModal">
                    Você deseja remover esse ítem deste colaborador?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="font-size: 1.5em; padding-left: 0.2em;">
                <div class="text-center" style="font-size: 5em">
                    {{-- icon switch blade--}}
                    <i class="fas fa-eraser"></i>
                </div>
                <h2 id="estateName"></h2>
                <span id="labelId"></span><br>
                <span id="employeeName"></span><br><br>
                <span id="lastAssignDate">
                </span>




            </div>
            <div class="modal-footer">
                <a href="#" onclick="confirmUnassign()" id="confirmUnassignButton">
                    <button class="btn btn-primary">DESATRIBUIR PATRIMÔNIO</button>
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>


@section('js')
    <script type="text/javascript">
        let estate_Id = "";
        let employee_Id = "";

        function unassignEstate(EstateObject, Employee)
        {
            estate_Id = EstateObject.id;
            employee_Id = Employee.id;

            let estateName = EstateObject.name;
            let estateLabelId = EstateObject.label_id;
            let employeeName = Employee.name;

            var estateNameHtml =  document.getElementById("estateName");
            var labelIdHtml =  document.getElementById("labelId");
            var employeeNameHtml =  document.getElementById("employeeName");
            var lastAssignDateHtml =  document.getElementById("lastAssignDate");
            estateNameHtml.innerHTML = estateName;
            labelIdHtml.innerHTML = 'Patrimônio: ' + estateLabelId;
            employeeNameHtml.innerHTML = 'Colaborador: ' + employeeName;
        }
        function confirmUnassign() {
            let url = "{{ route('unassignEstateToEmployee', [':estate_id', ':employee_id']) }}";
            url = url.replace(':estate_id', estate_Id);
            url = url.replace(':employee_id', employee_Id);
            document.location.href=url;
        }

    </script>
@stop

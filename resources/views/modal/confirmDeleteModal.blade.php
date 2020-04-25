<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Você deseja remover esse ítem?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <i class="fas fa-trash-alt bg-danger rounded-circle"
                   style="font-size: 4em; padding: 1em;"></i>
                <br>
                Você irá remover o patrimônio:<br>
                <h5 class="text-uppercase">
                    {{$Estate->name}}<br></h5>

                Número do patrimônio:<br>
                <h5>{{$Estate->label_id}}</h5>
                {{$Estate->id}}


            </div>
            <div class="modal-footer">
                <a href="{{action('Estate@destroy', $Estate->id)}}">
                    <button type="button" class="btn btn-danger">REMOVER</button></a>
                <button type="button" class="btn btn-info" data-dismiss="modal">CANCELAR</button>
            </div>
        </div>
    </div>
</div>

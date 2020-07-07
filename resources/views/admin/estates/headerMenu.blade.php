<div class="row">
    <div class="info-box col-sm m-1" onclick="window.location=('{{route('estateAvailable')}}');"
         style="cursor: pointer;">
        <span class="info-box-icon bg-success"><i class="fas fa-box"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Bens disponíveis</span>
        </div>
    </div>

    <div class="info-box col-sm m-1" onclick="window.location=('{{route('estateIndex')}}');"
         style="cursor: pointer;">
        <span class="info-box-icon bg-secondary"><i class="fas fa-user-tag"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Todos os patrimônios</span>
        </div>
    </div>

    <div class="info-box col-sm m-1" onclick="window.open('{{route('printActiveEstates')}}');"
         style="cursor: pointer">
        <span class="info-box-icon bg-success"><i class="fas fa-file-pdf"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">PDF Patrimônios Ativos</span>
            <span class="info-box-number">{{$activeEstateCount}} itens</span>
        </div>
    </div>

    <div class="info-box col-sm m-1" onclick="window.open('{{route('printDeletedEstates')}}');"
         style="cursor: pointer;">
        <span class="info-box-icon bg-danger"><i class="fas fa-file-pdf"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">PDF Patrimônios Inativos</span>
            <span class="info-box-number">{{$inactiveEstateCount}} itens</span>
        </div>
    </div>

    <div class="info-box col-sm m-1" onclick="window.location=('{{route('historyIndex')}}');"
         style="cursor: pointer">
        <span class="info-box-icon bg-dark"><i class="fas fa-book"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Histórico</span>
        </div>
    </div>

    <div class="info-box col-sm m-1" onclick=""
         style="cursor: pointer">
        <span class="info-box-icon bg-blue"><i class="fas fa-globe-americas"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Bens fora de Pelotas</span>
        </div>
    </div>

    <div class="info-box col-sm m-1" onclick="window.location=('{{route('estateHighValue')}}');"
         style="cursor: pointer">
        <span class="info-box-icon bg-blue"><i class="fas fa-money-check-alt"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Bens > 3.000R$</span>
        </div>
    </div>

    <div class="info-box col-sm m-1" onclick=""
         style="cursor: pointer">
        <span class="info-box-icon bg-danger"><i class="fas fa-minus-circle"></i></span>
        <div class="info-box-content">
            <span class="info-box-text">Bens Baixados</span>
        </div>
    </div>


</div>

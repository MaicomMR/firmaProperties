@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Home</h1>
    <div class="row ">
        <div class="info-box col-sm m-1">
            <span class="info-box-icon bg-success"><i class="fas fa-boxes"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Total de bens na base de dados</span>
                <span class="info-box-number">{{$totalEstatesCount}}</span>
            </div>
        </div>

        <div class="info-box col-sm m-1">
            <span class="info-box-icon bg-danger"><i class="fas fa-caret-down"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Bens desativados</span>
                <span class="info-box-number">{{$totalDisabledEstatesCount}}</span>
            </div>
        </div>

        <div class="info-box col-sm m-1">
            <span class="info-box-icon bg-info"><i class="fas fa-user-tag"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Patrimônios Atribuídos</span>
                <span class="info-box-number">{{$totalAssignedEstatesCount}}</span>
            </div>
        </div>

        <div class="info-box col-sm m-1">
            <span class="info-box-icon bg-green"><i class="fas fa-box-open"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Patrimônios Disponíveis</span>
                <span class="info-box-number">{{$totalUnassignedEstatesCount}}</span>
            </div>
        </div>

        <div class="info-box col-sm m-1"
             style="cursor: pointer">
            <span class="info-box-icon bg-success"><i class="fas fa-money-bill-wave"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Valor total de patrimônios(aprox.)</span>
                <span class="info-box-number">{{number_format($totalEstatesValue, 2, ',', ' ')}} R$</span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 row">
        <div class="info-box col-md m-1">
            <canvas id="myChart"></canvas>
        </div>

        <div class="info-box col-md m-1">
            <canvas id="myChart2"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>





    <script>
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($categoryLabel),
                datasets: [{
                    label: '# of Votes',
                    data: @json($categoryNumber),
                    backgroundColor:
                        @json($categoryColor),
                    borderColor: [
                    ],
                    borderWidth: 1
                }]
            },

        });

        var ctx = document.getElementById('myChart2');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: @json($subCategoryLabel),
                datasets: [{
                    label: '# of Votes',
                    data:  @json($subCategoryNumber),
                    backgroundColor: @json($subCategoryColor),
                    borderColor: [
                    ],
                    borderWidth: 1
                }]
            },

        });


    </script>

@stop

@section('content')
@stop



@section('js')

@stop

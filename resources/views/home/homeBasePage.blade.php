@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')

    <style>
        .graphNumberInfo {
            margin: 0;
            background: #cfe9d6;
        }

        .headerEstateNumbers {
            display: flex;
        }

        .itemCard {
            min-width: 60px;
            padding: 0;
            margin: 2px;
            flex: 1;
            box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
            background: #fff;
        }

        .itemCard-used {
            background: #f4f4f4;
        }
        .itemCard-available {

        }
    </style>

    @if(isset($esatatesByCategory) && isset($esatatesAssignedByCategory))
    <div class="headerEstateNumbers">
        <div class="btn itemCard"> {{--Outros--}}
            <i class="fa fa-info-circle p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">usados</div>
            <div class="graphNumberInfo">disponíveis</div>
        </div>

        <div class="btn itemCard"> {{--Outros--}}
            <i class="fas fa-question-circle p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[0]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[0] - $esatatesAssignedByCategory[0]}}</div>
        </div>

        <div class="btn itemCard"> {{--Monitores--}}
            <i class="fas fa-tv p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[1]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[1] - $esatatesAssignedByCategory[1]}}</div>
        </div>

        <div class="btn itemCard"> {{--Notebook--}}
            <i class="fas fa-laptop p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[3]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[3] - $esatatesAssignedByCategory[3]}}</div>
        </div>

        <div class="btn itemCard"> {{--Mouse--}}
            <i class="fas fa-mouse p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[4]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[4] - $esatatesAssignedByCategory[4]}}</div>
        </div>

        <div class="btn itemCard">{{--Teclado--}}
            <i class="fas fa-keyboard p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[7]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[7] - $esatatesAssignedByCategory[7]}}</div>
        </div>

        <div class="btn itemCard">{{--Headset--}}
            <i class="fas fa-headset p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[8]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[8] - $esatatesAssignedByCategory[8]}}</div>
        </div>

        <div class="btn itemCard">{{--Desktop--}}
            <i class="fas fa-digital-tachograph p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[2]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[2] - $esatatesAssignedByCategory[2]}}</div>
        </div>

        <div class="btn itemCard">{{--Celular--}}
            <i class="fas fa-mobile-alt p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[10]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[10] - $esatatesAssignedByCategory[10]}}</div>
        </div>

        <div class="btn itemCard">{{--Fonte de Energia--}}
            <i class="fa fa-plug p-3"></i>
            <br/>
            <div class="m-0 itemCard-used">{{$esatatesAssignedByCategory[9]}}</div>
            <div class="graphNumberInfo">{{$esatatesByCategory[9] - $esatatesAssignedByCategory[9]}}</div>
        </div>
    </div>
    @endif

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
                    borderColor: [],
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
                    borderColor: [],
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

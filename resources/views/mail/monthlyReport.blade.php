<body style="font-family: Open Sans;">

<ul class="page page-portrait" style="
    user-select: none;
    box-sizing: border-box;
    width: var(--A4-height);
    height: var(--A4-width);
    position: relative;
    list-style: none;
    padding: 3px;
    font-size: 16px;
    font-family: sans-serif;
    overflow: hidden;
    background-color: #eee;
    background-position: 0 0;
    background-size: 100% 100%;
    background-clip: content-box;
    background-image: linear-gradient(to left, rgba(0, 0, 0, 0.2) 0, transparent 1px), linear-gradient(to top, rgba(0, 0, 0, 0.2) 0, transparent 1px);
    counter-reset: tag;">

    <div class="header" style="color: white;
    background-color: #262626;
    padding: 20px;">
       <h2>Estate Care</h2>
        <div class="sub-title" style="display:  inline-block">Relatório mensal de patrimônio <br>
        Relatório referente ao mês de {{$lastMonth}}</div>
    </div>
    <div>
        <div class="date" style="background-color: #cecece;">
            Relatório gerado em
            {{$reportProcessDate}}
        </div>
    </div>

    <div class="card bg-light mb-12">
        <div class="card-body">
            <h5 class="card-title">Este e-mail foi enviado para:</h5>
            <p class="card-text mail-list" style="font-size: 0.7em;">
            @if(isset($emails))
                @foreach($emails as $email)
                {{$email->email . ', '}}
                @endforeach
            @endif
        </div>
    </div>

    <div class="data-container">
        <div class="info-card">
            <h5 class="card-title">Valor aproximado em bens</h5>
            <h4 class="card-text"><strong> {{number_format($totalEstatesValue, 2) . ' R$'}}</strong></h4>
        </div>

        <div class="info-card">
            <h5 class="card-title">Valor aproximado em bens</h5>
            <h4 class="card-text"><strong> {{$totalEstatesCount . '(+' . $newEstatesOnLast30Days . ')'}}</strong></h4>
        </div>


        <div class="row">
            <div class="card">
                <div class="card-body">
                    @if(isset($topValueEstatesAddedOnLastMonth))
                    <h5 class="card-title">Bens de maior valor adicionados no mês</h5>


                        <table id="customers">
                            <tr>
                                <th>Código</th>
                                <th>Patrimônio</th>
                                <th>Valor</th>
                            </tr>
                            @foreach($topValueEstatesAddedOnLastMonth as $estate)
                                <tr>
                                    <td>{{$estate->label_id}}</td>
                                    <td>{{$estate->name}}</td>
                                    <td>{{number_format($estate->value, 2) . ' R$'}}</td>
                                </tr>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</ul>
</body>


<style>
    .info-card {
        margin: 10px;
        background-color: white;
        padding: 8px
    }

    .data-container {
        display: flex;
        flex-wrap: wrap;
    }

    #customers {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    #customers tr:hover {
        background-color: #ddd;
    }

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #09421f;
        color: white;
    }
</style>

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
        <div class="row">
            <div class="card">
            </div>
        </div>
    </div>
</ul>


    <div id="cardContainer" class="card-container">
        <div class="card-grid">
            <div class="card-header">
                <span class="emoji-icon">💰</span>
            </div>
            <div class="moji-code">
                {{number_format($totalEstatesValue, 2) . ' R$'}}
            </div>
            <div class="moji-description">
                Valor aproximado de bens registrados na base de dados
            </div>
        </div>

        <div class="card-grid">
            <div class="card-header">
                <span class="emoji-icon">📦</span>
            </div>
            <div class="moji-code">
                {{$totalEstatesCount . '(+' . $newEstatesOnLast30Days . ')'}}
            </div>
            <div class="moji-description">
                Valor aproximado de bens registrados na base de dados
            </div>
        </div>

        <div class="card-grid">
            <div class="card-header">
                <span class="emoji-icon">📋</span>
            </div>
            <div class="moji-code">
                {{$totalUnassignedEstatesCount}}
            </div>
            <div class="moji-description">
                Patrimônios não utilizados
            </div>
        </div>

        <div class="card-grid">
            <div class="card-header">
                <span class="emoji-icon">🗑️</span>
            </div>
            <div class="moji-code">
                {{$lastMonthWriteOffEstates}}
            </div>
            <div class="moji-description">
                Patrimônios desativados nos últimos 30 dias
            </div>
        </div>
    </div>


</body>


<style>
    .emoji-icon {
        font-size: 75px;
        transition: 0.3s;
    }

    .moji-code {
        font-family: 'Open Sans', sans-serif;
        font-weight: 700;
        padding-top: 10px;
        font-size: 15px;
        background-color: rgb(240, 240, 240);
        height: 15%;
        transition: 0.5s;
    }

    .moji-description {
        font-family: 'Open Sans', sans-serif;
        padding: 10px;
        background-color: rgb(228, 228, 228);
        height: 35%;
        border-radius: 0px 0px 10px 10px;
    }

    .card-grid {
        float: left;
        text-align: center;
        margin: 10px;
        margin-top: 30px;
        width: 220px;
        height: 290px;
        border-radius: 10px;
        transition: 0.5s;
    }

    .card-header {
        padding-top: 10px;
        background-color: rgb(149, 206, 95);

        height: 50%;
        border-radius: 10px 10px 0px 0px;
        background-color: rgb(255, 191, 174);
    }

    .cards-plane {
        padding: 1vw;
        margin: 0 auto;
        background-color: rgb(255, 255, 255);
        width: 60vw;

        -webkit-box-shadow: 0px 0px 66px -10px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: 0px 0px 66px -10px rgba(0, 0, 0, 0.75);
        box-shadow: 0px 0px 66px -10px rgba(0, 0, 0, 0.75);
    }

    .card-container {
        /*float: left;*/
        justify-items: center;
    }

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

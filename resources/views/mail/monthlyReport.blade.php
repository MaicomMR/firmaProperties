<head>
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"--}}
{{--          integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" type="text/css" href="css/mail/monthlyMailStyle.css">--}}
</head>

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

    <div class="data-container" style="    display: flex;
    flex-wrap: wrap;">
        <div class="row">
            <div class="card m-1 col">
                <div class="card-body">
                    <h5 class="card-title">Valor aproximado em bens</h5>
                    <h4 class="card-text"><strong> {{$totalEstatesValue}} R$</strong></h4>
                </div>
            </div>

            <div class="card m-1 col">
                <div class="card-body">
                    <h5 class="card-title">Total de bens cadastrados na base de dados</h5>
                    <h4 class="card-text"><strong> {{$totalEstatesCount}} {{'(+' . $newEstatesOnLast30Days . ')'}}</strong></h4>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Bens de maior valor adicionados no mês</h5>

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Cód.</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Valor</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</ul>
</body>

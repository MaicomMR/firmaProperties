<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>


<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Lista de patrimônios que foram baixados do sistema</h4>
    <p>Segue a baixo a relação dos patrimônios registrados na plataforma, assim como seu número de cadastro, nome, nome do último colaborador a qual pertenceu o patrimônio.</p>
    <hr>
    <p class="mb-0">Data da consulta: {{$dateQuery}} (GMT-0)</p>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Etiqueta</th>
        <th scope="col">Nome do Patrimônio</th>
        <th scope="col">Colaborador a responsável</th>
    </tr>
    </thead>
    <tbody>



    @foreach($estateList as $estate)

        <tr>
        <th scope="row" class="text-right" >
            {{$estate->label_id}}
        </th>
        <th scope="row" class="text-right" >
            {{$estate->name}}
        </th>
        <th scope="row" class="text-right" >
            @isset($estate->employee->name)
            {{$estate->employee->name}}
            @endisset
        </th>
        </tr>


    @endforeach
    </tbody>
</table>

</body>
</html>

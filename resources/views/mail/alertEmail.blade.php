<head>
    <style>
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
            background-color: #af3229;
            color: white;
        }
    </style>
</head>


<h1>Alerta</h1>

<p>
    Alerta, um bem foi removido da base de dados
</p>

@if(isset($estates))
    <table id="customers">
        <tr>
            <th>Código</th>
            <th>Patrimônio</th>
            <th>Valor</th>
        </tr>
        @foreach($estates as $estate)
            <tr>
                <td>{{$estate->label_id}}</td>
                <td>{{$estate->name}}</td>
                <td>{{number_format($estate->value, 2) . ' R$'}}</td>
            </tr>
        @endforeach
@endif
    </table>


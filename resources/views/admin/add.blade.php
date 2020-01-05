@extends('adminlte::page')

@section('title', 'Adicionar novo patrimônio')

@section('content_header')
    <h1>Adicionar novo patrimônio</h1>
@stop

@section('content')
    <form>
        <div class="container">
            <div class="row">
                <div class="col-2">
                    <label for="exampleInputEmail1">Código Interno</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="00001" disabled>
                </div>
                <div class="col-2">
                    <label for="exampleInputEmail1">Código Etiqueta</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="00001">
                </div>
                <div class="form-group col-6">
                    <label for="exampleInputEmail1">Nome do patrimônio</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Digite o nome do patrimônio">
                    <small id="emailHelp" class="form-text text-muted">Este nome será exibido na listagem de
                        patrimônios.</small>
                </div>


            </div>
            <div class="row">
                <div class="form-group col-2">
                    <label for="exampleInputEmail1">Nota Fiscal</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="Número da nota">
                    <small id="emailHelp" class="form-text text-muted">Você pode adicionar uma nova nota fiscal clicando
                        aqui.</small>
                </div>
                <div class="form-group col-2">
                    <label for="exampleInputEmail1">Valor do bem</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                           placeholder="000,00R$">
                </div>

                <div class="dropdown col-3">
                    <label for="exampleInputEmail1">Categoria</label><br/>
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04">
                            <option selected>Selecione uma...</option>
                            <option value="1">Equipamentos de TI</option>
                            <option value="2">Infraestrutura</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary bg-green" type="button">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="dropdown col-3">
                    <label for="exampleInputEmail1">Sub Categoria</label><br/>
                    <div class="input-group">
                        <select class="custom-select" id="inputGroupSelect04">
                            <option selected>Selecione uma...</option>
                            <option value="1">Notebook</option>
                            <option value="2">Teclado</option>
                            <option value="3">Mouse</option>
                            <option value="3">Monitor</option>
                            <option value="3">Gabinete</option>
                            <option value="3">Outros</option>
                        </select>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary bg-green" type="button">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

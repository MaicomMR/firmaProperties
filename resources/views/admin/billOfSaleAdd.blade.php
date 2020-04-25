@extends('adminlte::page')

@section('title', 'Lista de patrimônios')

@section('content_header')
    <h1>Adicionar Nota Fiscal</h1>
@stop



@section('content')

<form method="POST" action="bill-of-sale/save">
    @csrf

    <div class="container">
        <div class="row">
            <div class="col-2">
                <label for="billNumber">Número da Nota:</label>
                <input type="text" class="form-control" id="billNumber" name="billNumber"
                       placeholder="001956790">
            </div>
            <div class="col-5">
                <label for="exampleInputEmail1">Chave de acesso:</label>
                <input type="text" class="form-control" id="billAcessKey" name="billAcessKey"
                       placeholder="3513 0305 5707 1400 0159 5500 1001 9567 9010 2577 0000">
            </div>
            <div class="dropdown col-3">
                <label for="exampleInputEmail1">Fornecedor:</label><br/>
                <div class="input-group">
                    <select class="custom-select" id="inputGroupSelect04" name="productProvider">
                            <option value="">Não informado</option>
                            <option value="Kabum"> Kabum</option>
                            <option value="Pichau"> Pichau</option>
                            <option value="Mercado Livre"> Mercado Livre</option>
                            <option value="outros"> Outro...</option>
                    </select>
                </div>
            </div>
            <div class="col-2">
                <label for="billValue">Valor Total da nota:</label>
                <input type="text" class="form-control" id="billValue" name="billValue"
                       placeholder="1504,00 R$">
            </div>

        </div>
        <div class="row">
            <div class="col-5">
                <label for="">Anexar Nota Fiscal em .pdf</label>
                <input type="file" class="" id="billPdfFile" name="billPdfFile" accept=".pdf" style="width: 100%">
            </div>
            <div class="col-5">
                <label for="">Anexar foto da Nota Fiscal:</label>
                <input type="file" class="" id="billImageFile" name="billImageFile" accept=".jpg,.jpeg,.png,.bmp" style="width: 100%">
            </div>

            <div class="col-2">
                <button type="submit" class="btn btn-success">CADASTRAR</button>
            </div>
        </div>

        <div class="row">
            <div class="col-6 attach-preview pdf-preview">

                <label for="">Arquivo .pdf anexado</label><br/>
                <i class="fas fa-file-pdf attach-icon"></i>
            </div>
            <div class="col-6  attach-preview image-preview">
                <label for="">Foto anexada</label><br/>
                <i class="fas fa-file-image attach-icon"></i>

            </div>
        </div>

    </div>
</form>


@stop


@section('css')
    <link rel="stylesheet" href="/css/adminStyle.css">
@stop

@section('js')

@stop

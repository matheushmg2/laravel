@extends('layout.app')
@section('title', 'Editar de Produtos')

@section('content')
    <h1>Editar um Produto - {{ $produto->titulo }}</h1>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>

        </div>
    @endif

    <form action="{{ action('ProdutosController@update', $id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group mb-3">
            <label for="sku">Código</label>
            <input type="text" id="sku" name="sku" class="form-control" placeholder="Informe o Código.."
                value="{{ $produto->sku }}">
        </div>
        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Informe o Título"
                value="{{ $produto->titulo }}">
        </div>
        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" rows="3" class="form-control"
                placeholder="Breve descrição sobre o Produto">{{ $produto->descricao }}</textarea>
        </div>
        <label for="descricao">Preço</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">R$</span>
            </div>
            <input type="number" step=".01" class="form-control" name="preco" id="preco" placeholder="Infome o Valor"
                value="{{ $produto->preco }}">
        </div>
        <div class="input-group mb-3">
            <label for="imgProduto">Imagem do Produto</label>
            @if (file_exists('./img/produtos/' . md5($produto->id) . '.jpg'))
                <div class="col-md-6">
                    <img style="max-width: 200px;" src="{{ url('img/produtos/' . md5($produto->id) . '.jpg') }}" alt="Imagem Produto" class="img-fluid img-thumbnail" id="preview">
                </div>
            @else
                <img style="max-width: 200px;" alt="Imagem Produto" class="img-fluid img-thumbnail" id="preview">
            @endif
            <input type="file" name="imgProduto" id="imgProduto" class="form-control-file" onchange="previewImage();">
        </div>
        <input type="submit" value="Editar Produtos" class="btn btn-success">
    </form>

@endsection

@extends('layout.app')
@section('title', 'ADD de Produtos')

@section('content')
    <h1>Adicionar um Produto</h1>

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

    <form action="{{ url('produtos') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="sku">Código</label>
            <input type="text" id="sku" name="sku" class="form-control" placeholder="Informe o Código..">
        </div>
        <div class="form-group mb-3">
            <label for="titulo">Título</label>
            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Informe o Título">
        </div>
        <div class="form-group mb-3">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" id="descricao" rows="3" class="form-control"
                placeholder="Breve descrição sobre o Produto"></textarea>
        </div>
        <label for="descricao">Preço</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">R$</span>
            </div>
            <input type="number" step=".01" class="form-control" name="preco" id="preco" placeholder="Infome o Valor">
        </div>
        <input type="submit" value="Cadastrar Produtos" class="btn btn-success">
    </form>

@endsection

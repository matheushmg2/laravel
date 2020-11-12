@extends('layout.app')
@section('title', 'Lista de Produtos')

@section('content')

    <div class="row p-5">
        <h1>Produtos</h1>
        <div class="p-2">
            <a href="{{ URL::to('produtos/create') }}" class="btn btn-success btn-sm rounded-pill">Criar Produtos</a>
        </div>

    </div>


    @if ($msg = Session::get('success'))
        <div class="alert alert-success">
            {{ $msg }}
        </div>
    @endif

    <div class="row">
        @foreach ($produtos as $produto)
            <div class="col-md-3">
                <h4 class="text-center">
                    <a href="{{ URL::to('produtos') }}/{{ $produto->id }}">{{ $produto->titulo }}</a>
                </h4>
                @if (file_exists('./img/produtos/' . md5($produto->id) . '.jpg'))
                    <img src="{{ url('img/produtos/' . md5($produto->id) . '.jpg') }}" alt="Imagem Produto"
                        class="img-fluid img-thumbnail">
                @endif
                <div class="text-center py-1">

                    <form action="{{ action('ProdutosController@destroy', $produto->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ URL::to('produtos/'.$produto->id.'/edit') }}" class="btn btn-info">Editar</a>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection

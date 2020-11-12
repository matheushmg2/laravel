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
                <h4 class="text-center">
                    <button type="button" class="btn btn-outline-primary btn-sm visualizarProduto" id="{{ $produto->id }}">
                        VerProdutos
                    </button>
                    <button type="button" class="btn btn-outline-info btn-sm edit" id="{{ $produto->id }}">
                        Editar Produtos
                    </button>
                </h4>
                <div class="text-center py-1">

                    <form action="{{ action('ProdutosController@destroy', $produto->id) }}" method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <a href="{{ URL::to('produtos/' . $produto->id . '/edit') }}" class="btn btn-info">Editar</a>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </div>
        @endforeach
        <span id="conteudo"></span>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="VisualModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="verUsuarioModal"></div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="EditarModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg " role="document">
            <div class="editarUsuarioModal"></div>
        </div>
    </div>


    <script>
        /* ------------------------------------------------------------------------------- */
        /* ------------------------ Modal Visualizar o Usuário --------------------------- */
        $(document).ready(function() { // Quando carregar a Página faça
            $(document).on('click', '.visualizarProduto', function() {
                var usuarioID = $(this).attr('id');

                if (usuarioID !== '') {

                    $.get('{{ URL::to('produtos') }}/' + usuarioID, function(retorna) {
                        $('.verUsuarioModal').html(retorna); // Envia para a janela modal
                        $('#VisualModal').modal('show'); // Carregar a janela modal
                    });
                }
            });
        });

        /* ------------------------------------------------------------------------------- */
        /* ------------------------ Modal Editar o Usuário --------------------------- */
        $(document).ready(function() { // Quando carregar a Página faça
            $(document).on('click', '.edit', function() {
                var usuarioID = $(this).attr('id');

                if (usuarioID !== '') {

                    $.get('{{ URL::to('produtos') }}/' + usuarioID + '/edit', function(retorna) {
                        $('.editarUsuarioModal').html(retorna); // Envia para a janela modal
                        $('#EditarModal').modal('show'); // Carregar a janela modal
                    });
                }
            });
        });

    </script>

@endsection

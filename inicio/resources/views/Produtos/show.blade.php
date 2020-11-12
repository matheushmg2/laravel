<div class="modal-content" style="background-color: #456; color: #fff;">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produtos - {{ $produto->titulo }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            @if (file_exists('./img/produtos/' . md5($produto->id) . '.jpg'))
                <div class="col-md-6">
                    <img src="{{ url('img/produtos/' . md5($produto->id) . '.jpg') }}" alt="Imagem Produto"
                        class="img-fluid img-thumbnail">
                </div>
            @endif

            <div class="col-md-6">
                <ul>
                    <li><strong>Código: </strong>{{ $produto->sku }}</li>
                    <li><strong>Preço: R$ </strong>{{ number_format($produto->preco, 2, ',', '.') }}</li>
                    <li>
                        @if ($produto->updated_at)
                            <strong>Data da Modificação: </strong>{{ date('d/m/Y H:i', strtotime($produto->updated_at)) }}
                        @else
                            <strong>Data da criação: </strong>{{ date('d/m/Y H:i', strtotime($produto->created_at)) }}
                        @endif

                    </li>
                </ul>
            </div>
        </div>
        <p><strong>Descrição Sobre o Produto: </strong><br>{{ $produto->descricao }}</p>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
    </div>
</div>

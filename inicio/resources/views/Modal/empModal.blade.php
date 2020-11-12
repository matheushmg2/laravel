<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    {{-- datatables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">


</head>

<body>

    {{-- Inicio Add Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- Inicio do Formulário --}}
                <form action="{{ action('EmployeeController@store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Primeiro Nome</label>
                            <input type="text" name="pNome" class="form-control" placeholder="Primeiro Nome">
                        </div>
                        <div class="form-group">
                            <label>SobreNome</label>
                            <input type="text" name="sNome" class="form-control" placeholder="Sobrenome">
                        </div>
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" name="endereco" class="form-control" placeholder="Primeiro Nome">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" name="tel" class="form-control" placeholder="Primeiro Nome">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-info">Save changes</button>
                    </div>
                </form>
                {{-- Final do Formulário --}}
            </div>
        </div>
    </div>
    {{-- FInal Add Modal --}}

    {{-- Inicio Ediar Modal --}}
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- Inicio do Formulário --}}
                <form action="/employee" method="POST" id="editForm">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Primeiro Nome</label>
                            <input type="text" name="pNome" id="pNome" class="form-control" placeholder="Primeiro Nome">
                        </div>
                        <div class="form-group">
                            <label>SobreNome</label>
                            <input type="text" name="sNome" id="sNome" class="form-control" placeholder="Sobrenome">
                        </div>
                        <div class="form-group">
                            <label>Endereço</label>
                            <input type="text" name="endereco" id="endereco" class="form-control"
                                placeholder="Primeiro Nome">
                        </div>
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" name="tel" id="tel" class="form-control" placeholder="Primeiro Nome">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-info">Editar changes</button>
                    </div>
                </form>
                {{-- Final do Formulário --}}
            </div>
        </div>
    </div>
    {{-- FInal Ediar Modal --}}
    {{-- Inicio Ver Modal --}}

    <div class="modal fade" id="verModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close btn btn-outline-danger" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="visulModal">
                    <dl class="row">
                        <dt class="col-sm-4">ID</dt>
                        <dd class="col-sm-8" id="idVer"></dd>

                        <dt class="col-sm-4">Nome</dt>
                        <dd class="col-sm-8"><label id="pNomeVer"></label></dd>

                        <dt class="col-sm-4">Sobrenome</dt>
                        <dd class="col-sm-8"><label id="sNomeVer"></label></dd>

                        <dt class="col-sm-4">Endereço</dt>
                        <dd class="col-sm-8"><label id="enderecoVer"></label></dd>

                        <dt class="col-sm-4">Telefone</dt>
                        <dd class="col-sm-8"><label id="telVer"></label></dd>

                    </dl>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- FInal Ver Modal --}}

    <div class="container">
        <h1>Laravel CRUD: com bootstrap modal [ ACIMA Modal]</h1>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Cadastro
        </button>

        <hr><br>
        <table id="dadosTabela" class="table table-bordered table-striped table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Ações</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($itens as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->pNome }}</td>
                        <td>{{ $item->sNome }}</td>
                        <td>{{ $item->endereco }}</td>
                        <td>{{ $item->tel }}</td>
                        <td>
                            <a href="#" class="btn btn-outline-info ver view_data" id="{{ $item->id }}">Ver</a>
                            <a href="#" class="btn btn-outline-success edit">Editar</a>
                            <a href="#" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>



    <script>
        $(document).ready(function() {
            var table = $('#dadosTabela').DataTable();

            // Inicio a editar o registro
            table.on('click', '.edit', function() {
                $tr = $(this).closest('tr');
                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                //console.log(data);

                $('#pNome').val(data[1]);
                $('#sNome').val(data[2]);
                $('#endereco').val(data[3]);
                $('#tel').val(data[4]);

                $('#editForm').attr('action', '/employee/' + data[0]);
                $('#editModal').modal('show');
            });
            // Final a editar o registro
        });

        //$(document).ready(function() {
            $('#dadosTabela').DataTable({
                paging: false,
                ordering: false,
                info: false,
                retrieve: false,
                searching: true,
                destroy: false
            });
        //});

        $(document).ready(function() {
            var table = $('#dadosTabela').DataTable();


            // Inicio a editar o registro
            table.on('click', '.ver', function() {
                $tr = $(this).closest('tr');

                if ($($tr).hasClass('child')) {
                    $tr = $tr.prev('.parent');
                }

                var data = table.row($tr).data();
                //console.log(data);
                document.getElementById('idVer').innerHTML = data[0];
                document.getElementById('pNomeVer').innerHTML = data[1];
                document.getElementById('sNomeVer').innerHTML = data[2];
                document.getElementById('enderecoVer').innerHTML = data[3];
                document.getElementById('telVer').innerHTML = data[4];

                $('#verModal').modal('show');
            });
            // Final a editar o registro
        });

    </script>
</body>

</html>

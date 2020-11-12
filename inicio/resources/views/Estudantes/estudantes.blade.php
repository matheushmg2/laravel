<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

    <!-- Modal Cadastrar -->
    <div class="modal fade" id="cadastroModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="cadastroForm">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" class="form-control" name="pNome" id="" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="">Sobrenome</label>
                            <input type="text" class="form-control" name="sNome" id="" placeholder="Sobrenome">
                        </div>
                        <div class="form-group">
                            <label for="">Cursos</label>
                            <input type="text" class="form-control" name="cursos" id="" placeholder="Cursos">
                        </div>
                        <div class="form-group">
                            <label for="">Seção</label>
                            <input type="text" class="form-control" name="secao" id="" placeholder="Seção">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Editar -->
    <div class="modal fade" id="editarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="editarForm">
                    <div class="modal-body">
                        @csrf
                        @method('PUT')

                        <label for="">id</label>
                        <label id="id"></label>
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input type="text" class="form-control" name="pNome" id="pNome" placeholder="Nome">
                        </div>
                        <div class="form-group">
                            <label for="">Sobrenome</label>
                            <input type="text" class="form-control" name="sNome" id="sNome" placeholder="Sobrenome">
                        </div>
                        <div class="form-group">
                            <label for="">Cursos</label>
                            <input type="text" class="form-control" name="cursos" id="cursos" placeholder="Cursos">
                        </div>
                        <div class="form-group">
                            <label for="">Seção</label>
                            <input type="text" class="form-control" name="secao" id="secao" placeholder="Seção">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-dark">Save Editar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Delelte -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="" method="POST" id="deleteForm">
                    <div class="modal-body">
                        @csrf
                        @method('delete')

                        <input type="hidden" name="id" id="delete_id">
                        <p>Deseja Realmente Deletar?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-danger">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <h1>Laravel - Ajax jQuery e BootStrap</h1>
        </div>
        <!-- Button trigger modal -->
        <div class="text-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cadastroModal">
                Cadastrar
            </button>
        </div>

        @if ($msg = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $msg }}</p>
            </div>
        @endif

        <hr>

        <table id="dadosTabela" class="table table-bordered table-striped table-dark text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Sobrenome</th>
                    <th scope="col">Cursos</th>
                    <th scope="col">Seção</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($estudantes as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->pNome }}</td>
                        <td>{{ $item->sNome }}</td>
                        <td>{{ $item->cursos }}</td>
                        <td>{{ $item->secao }}</td>
                        <td>
                            <a href="#" class="btn btn-outline-success edit">Editar</a>
                            <a href="#" class="btn btn-outline-danger delete">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script>
        $('.delete').on('click', function() {
            $('#deleteModal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children('td').map(function() {
                return $(this).text();
            }).get();
            console.log(data);

            $('#delete_id').val(data[0]);
        });
        $('#deleteForm').on('submit', function(e) {
            e.preventDefault();

            var id = $("#delete_id").val();

            $.ajax({
                type: "DELETE",
                url: "/estudantesDelete/" + id,
                data: $('#deleteForm').serialize(),
                success: function(retorna) {
                    console.log(retorna)
                    $('#deleteModal').modal('hide')
                    alert("Dados Deletado Salvo!");
                    location.reload();
                },
                error: function(error) {
                    console.log(error)
                    //$('#cadastroModal').modal('hide')
                    alert("Dados editado error?");
                }
            });
        });


    </script>

    <script>
        $(document).ready(function() {
            $('.edit').on('click', function() {
                $('#editarModal').modal('show');

                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();
                console.log(data);

                $('#id').val(data[0]);
                document.getElementById('id').innerHTML = data[0];
                $('#pNome').val(data[1]);
                $('#sNome').val(data[2]);
                $('#cursos').val(data[3]);
                $('#secao').val(data[4]);
            });
        });
        $('#editarForm').on('submit', function(e) {
            e.preventDefault();

            var id = $("#id").val();

            $.ajax({
                type: "POST",
                url: "/estudantesUpdate/" + id,
                data: $('#editarForm').serialize(),
                success: function(retorna) {
                    console.log(retorna)
                    $('#editarModal').modal('hide')
                    alert("Dados editado Salvo!");
                    location.reload();
                },
                error: function(error) {
                    console.log(error)
                    //$('#cadastroModal').modal('hide')
                    alert("Dados editado error?");
                }
            });
        });

    </script>

    <script>
        $(document).ready(function() {
            $('#cadastroForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "/estudantesCadastro",
                    data: $('#cadastroForm').serialize(),
                    success: function(retorna) {
                        console.log(retorna)
                        $('#cadastroModal').modal('hide')
                        alert("Dados Salvo!");
                    },
                    error: function(error) {
                        console.log(error)
                        //$('#cadastroModal').modal('hide')
                        alert("Dados error?");
                    }
                });
            });
        });

    </script>
</body>

</html>

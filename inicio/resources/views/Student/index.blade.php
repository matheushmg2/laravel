@extends('Student.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Dados Estudantes</h3>
            <div class="text-right">
                <a href="{{ route('student.create') }}" class="btn btn-outline-success">Cadastrar</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
                    Cadastrar
                </button>
            </div>

            <hr>
            @if ($msg = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $msg }}</p>
                </div>
            @endif
        </div>

        <div class="col-md-12">

            <table class="table table-bordered table-striped text-center">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>Ação</th>
                </tr>
                @foreach ($student as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <th>{{ $item->pNome }}</th>
                        <th>{{ $item->sNome }}</th>
                        <th>

                            <form action="{{ action('StudentController@destroy', $item->id) }}" method="post"
                                class="delete_form">
                                @csrf
                                <a href="{{ action('StudentController@edit', $item->id) }}"
                                    class="btn btn-outline-info">Editar</a>
                                <a href="#" class="btn btn-outline-success edit">Editar Modal</a>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-outline-danger">Deletar</button>
                            </form>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.delete_form').on('submit', function() {
                if (confirm("Tem certeza que deseja deletar?")) {
                    return true;
                }
            });
        });

        //$(document).ready(function() {
            //var table = $('#dadosTabela').DataTable();

            // Inicio a editar o registro
            $(document).on('click', '.edit', function() {
                event.preventDefault();

                //$('#pNome').val(data[1]);
                //$('#sNome').val(data[2]);

                //$('#editForm').attr('action', '/employee/' + data[0]);
                $('#editModal').modal('show');
            });
            // Final a editar o registro
        //});

    </script>
    {{-- Inicio Add Modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastrar Estudante Modal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- Inicio do Formulário --}}
                <form action="{{ action('StudentController@store') }}" method="POST">
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
                <form action="" method="POST" id="editForm">
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
@endsection

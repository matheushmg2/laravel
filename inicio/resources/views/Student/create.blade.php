@extends('Student.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center">Add Dados</h3>

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

            <form action="{{ url('student') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Nome</label>
                    <input class="form-control" type="text" name="pNome">
                </div>
                <div class="form-group">
                    <label>Sobrenome</label>
                    <input class="form-control" type="text" name="sNome">
                </div>
                <div class="form-group">
                    <input type="submit" value="Salvar" class="btn btn-outline-primary">
                </div>
            </form>
        </div>

    </div>

@endsection

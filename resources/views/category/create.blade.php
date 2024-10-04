@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <h4 class="card-title">Cadastro de Categoria</h4>

                @if ($errors->any())
                    <div>
                        <h6>Algo deu errado!</h6>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('categoria.store') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Coffee Break">
                        <label for="name">Nome</label>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('categoria.index') }}" class="btn btn-secondary" role="button">Voltar</a>
                        <button type="submit" class="btn btn-info float-end">Adicionar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

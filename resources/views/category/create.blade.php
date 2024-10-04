@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <h4 class="card-title">Cadastro de Categoria</h4>

                <x-alert-success />
                <x-alert-warning />
                <x-alert-errors />

                <form action="{{ route('categoria.store') }}" method="POST">
                    @csrf

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Coffee Break">
                        <label for="name">Nome</label>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary" role="button">Voltar</a>
                        <button type="submit" class="btn btn-info">Adicionar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

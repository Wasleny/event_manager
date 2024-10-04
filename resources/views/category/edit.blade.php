@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <h4 class="card-title">Edição de Categoria</h4>

                <x-alert-success />
                <x-alert-warning />
                <x-alert-errors />

                <form action="{{ route('categoria.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" id="id" name="id" value="{{ $category->id }}">
                    <input type="hidden" id="old_name" name="old_name" value="{{ $category->name }}">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $category->name }}">
                        <label for="name">Nome</label>
                    </div>

                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ url()->previous() }}" class="btn btn-secondary" role="button">Voltar</a>
                        <button type="submit" class="btn btn-info">Editar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <div class="row">
                    <h3 class="card-title col-10">Categorias</h3>
                    <div class="col-2 d-flex flex-row-reverse">
                        <a class="btn btn-create" href="{{ route('categoria.create') }}" role="button">Criar Categoria</a>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <ul class="list-group mt-5">
                    @foreach ($categories as $category)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    <span class="category-name">{{ $category->name }}</span>
                                    <span class="badge rounded-pill">Qtde eventos na categoria</span>
                                </div>
                            </div>

                            <a class="btn btn-edit me-3" href="{{ route('categoria.edit', $category->id) }}" role="button">
                                <span class="fs-5"><i class="bi bi-pencil-square"></i></span>
                            </a>
                            <a class="btn btn-delete me-3" href="#" role="button"
                                onclick="event.preventDefault();
                                if (confirm('Você tem certeza que deseja excluir essa categoria?')) {
                                    document.getElementById('delete-category-{{ $category->id }}').submit();
                                }">
                                <span class="fs-5"><i class="bi bi-trash3-fill"></i></span>
                            </a>

                            <form id="delete-category-{{ $category->id }}"
                                action="{{ route('categoria.destroy', $category->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>

                        </li>
                    @endforeach
                </ul>
                <div class="mt-5">
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

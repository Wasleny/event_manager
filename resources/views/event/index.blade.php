@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <div class="row">
                    @if ($user_events)
                        <h3 class="card-title col-10">Meus Eventos</h3>
                    @else
                        <h3 class="card-title col-10">Eventos</h3>
                    @endif

                    @auth
                        <div class="col-2 d-flex flex-row-reverse">
                            <a class="btn btn-create" href="{{ route('evento.create') }}" role="button">Criar Evento</a>
                        </div>
                    @endauth
                </div>

                <div class="mt-5">
                    <div>
                        <button class="btn btn-filter mb-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#filterEvents" aria-expanded="false" aria-controls="filterEvents">
                            Filtros
                        </button>
                        <button class="btn btn-clear-filter mb-2" type="button"
                            onclick="event.preventDefault();document.getElementById('filterForm').submit();">
                            Limpar filtro
                        </button>
                    </div>

                    <div class="collapse p-3 border rounded" id="filterEvents">
                        <form action="{{ route('evento.index') }}" method="GET" id="filterForm">
                            @csrf

                            <div class="row">
                                <div class="col">
                                    <select class="form-select" name="category_id" id="category_id">
                                        <option value="" selected>Escolha uma categoria</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col">
                                    <input type="date" class="form-control" name="date" id="date"
                                        aria-label="Data do Evento">
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-filter">Filtrar</button>
                            </div>

                        </form>
                    </div>
                </div>

                <x-alert-success />
                <x-alert-warning />
                <x-alert-errors />

                <ul class="list-group mt-5">
                    @if (!$events->isEmpty())
                        @foreach ($events as $event)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div class="ms-2 me-auto">
                                    <div class="fw-bold">
                                        <span class="category-name">{{ $event->name }}</span>

                                        <span class="badge {{ $event->color_badge }} rounded-pill">
                                            Vagas disponíveis: {{ $event->remaining_spots }}
                                        </span>

                                        <x-event-status :event='$event' />

                                    </div>
                                    Categoria: {{ $event->category->name }}
                                </div>

                                <a class="btn btn-show me-3" href="{{ route('evento.show', $event->id) }}" role="button">
                                    <span class="fs-5"><i class="bi bi-search"></i></span>
                                </a>
                                @if ($user_events)
                                    <a class="btn btn-edit me-3" href="{{ route('evento.edit', $event->id) }}"
                                        role="button">
                                        <span class="fs-5"><i class="bi bi-pencil-square"></i></span>
                                    </a>
                                    <a class="btn btn-delete me-3" href="#" role="button"
                                        onclick="event.preventDefault();
                                    if (confirm('Você tem certeza que deseja excluir essa evento?')) {
                                        document.getElementById('delete-event-{{ $event->id }}').submit();
                                    }">
                                        <span class="fs-5"><i class="bi bi-trash3-fill"></i></span>
                                    </a>

                                    <form id="delete-event-{{ $event->id }}"
                                        action="{{ route('evento.destroy', $event->id) }}" method="POST" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endif

                            </li>
                        @endforeach
                    @else
                        <p>Não há eventos cadastrados no sistema...</p>
                    @endif
                </ul>
                <div class="mt-5">
                    {{ $events->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

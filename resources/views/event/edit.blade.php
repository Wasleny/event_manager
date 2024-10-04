@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <h4 class="card-title">Edição de Evento</h4>

                <x-alert-success />
                <x-alert-warning />
                <x-alert-errors />

                <form action="{{ route('evento.update', $event->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="old_name" id="old_name" value="{{ $event->name }}">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Bienal do Livro de São Paulo" value={{ $event->name }}>
                        <label for="name">Nome</label>
                    </div>

                    <select class="form-select mb-3" id='category_id' name='category_id'>
                        <option>Escolha uma categoria</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == $event->category_id)>{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <select class="form-select mb-3" id='status' name='status'>
                        <option>Escolha um status</option>
                        @foreach (App\Models\Event::ARRAY_STATUS as $status)
                            <option value="{{ $status }}" @selected($status == $event->status)>{{ $status }}</option>
                        @endforeach
                    </select>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="location" name="location"
                            placeholder="Central Shopping" value={{ $event->location }}>
                        <label for="location">Local do Evento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control" id="start_datetime" name="start_datetime"
                            value={{ \Carbon\Carbon::parse($event->start_datetime)->format('Y-m-d\TH:i') }}>
                        <label for="start_datetime">Data e Horário de Início do Evento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control" id="end_datetime" name="end_datetime"
                            value={{ \Carbon\Carbon::parse($event->end_datetime)->format('Y-m-d\TH:i') }}>
                        <label for="end_datetime">Data e Horário de Término do Evento</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="numer" min='1' step="1" class="form-control" id="maximum_capacity"
                            name="maximum_capacity" placeholder="100" value={{ $event->maximum_capacity }}>
                        <label for="maximum_capacity">Capacidade Máxima de Participantes</label>
                    </div>

                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Faça a descrição do evento aqui" id="description" style="height: 100px">{{ $event->description }}</textarea>
                        <label for="description">Descrição do Evento</label>
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="card-body">
                <h1 class="card-title">{{ $event->name }}</h1>

                <x-alert-success />
                <x-alert-warning />
                <x-alert-errors />

                <h4 class="mt-5">Vagas preenchidas</h4>
                <p>{{ $event->registrations->count() }} de {{ $event->maximum_capacity }} vagas</p>
                <div class="row align-items-center h-100 mb-5">
                    <div class="col-lg-10 col-12">
                        <div class="progress col-12" role="progressbar" aria-label="Success striped example"
                            aria-valuenow="{{ 100 - $event->availability }}" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-success" style="width: {{ 100 - $event->availability }}%;">
                                {{ 100 - $event->availability }}%
                            </div>
                        </div>
                    </div>

                    @if (App\Helpers\VerifyRegistration::checkRegistration($event->id))
                        <div class="col-12 col-lg-2 d-flex flex-row-reverse">
                            <a class="btn btn-cancel col-12 mt-lg-0 mt-3"
                                href="{{ route('evento.cancelar-inscricao', $event->id) }}" role="button"
                                onclick="event.preventDefault();
                            if (confirm('Você tem certeza que deseja cancelar a inscrição para este evento?')) {
                                document.getElementById('cancel_registration_form').submit();
                            }">Cancelar
                                inscrição</a>
                        </div>

                        <form id="cancel_registration_form" action="{{ route('evento.cancelar-inscricao', $event->id) }}"
                            method="POST" class="d-none">
                            @csrf
                            @method('DELETE')
                        </form>
                    @else
                        @if ($event->availability != 0 && $event->status == App\Models\Event::ATIVO)
                            <div class="col-12 col-lg-2 d-flex flex-row-reverse">
                                <a class="btn btn-create col-12 mt-lg-0 mt-3"
                                    href="{{ route('evento.inscricao', $event->id) }}" role="button"
                                    onclick="event.preventDefault();
                            if (confirm('Você tem certeza que deseja se inscrever este evento?')) {
                                document.getElementById('register_event_form').submit();
                            }">Inscrever-me</a>
                            </div>

                            <form id="register_event_form" action="{{ route('evento.inscricao', $event->id) }}"
                                method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <div class="col-2 d-flex flex-row-reverse">
                                <a class="btn btn-create disabled" href="{{ route('evento.inscricao', $event->id) }}"
                                    role="button" disabled>Inscrever-me</a>
                            </div>
                        @endif
                    @endif
                </div>

                <div>
                    <h6>Descrição do Evento</h6>
                    <p>{{ $event->description }}</p>
                </div>

                <div class="row">
                    <div class="col-12 col-md">
                        <h6>Local do Evento</h6>
                        <p>{{ $event->location }}</p>
                    </div>

                    <div class="col-12 col-md">
                        <h6>Capacidade Máxima de Participantes</h6>
                        <p>{{ $event->maximum_capacity }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md">
                        <h6>Horário de Início</h6>
                        <p>{{ \Carbon\Carbon::parse($event->start_datetime)->format('d/m/Y \à\s H:i') }}</p>
                    </div>

                    <div class="col-12 col-md">
                        <h6>Horário de Término</h6>
                        <p>{{ \Carbon\Carbon::parse($event->end_datetime)->format('d/m/Y \à\s H:i') }}</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md">
                        <h6>Categoria do Evento</h6>
                        <p>{{ $event->category->name }}</p>
                    </div>

                    <div class="col-12 col-md">
                        <h6>Status do Evento</h6>
                        <x-event-status :event='$event' />
                    </div>
                </div>

                <div class="d-flex flex-row-reverse mt-3">
                    <a href="{{ route('evento.index') }}" class="btn btn-secondary" role="button">Voltar</a>
                </div>
            </div>

        </div>
    </div>
@endsection

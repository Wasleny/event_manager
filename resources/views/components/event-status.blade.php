@if ($event->status == App\Models\Event::ATIVO)
    <span class="badge text-bg-primary rounded-pill">Ativo</span>
@elseif($event->status == App\Models\Event::EM_ANDAMENTO)
    <span class="badge text-bg-warning rounded-pill">Em andamento</span>
@else
    <span class="badge text-bg-secondary rounded-pill">Encerrado</span>
@endif

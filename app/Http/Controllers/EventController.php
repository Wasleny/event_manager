<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Models\EventRegistration;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categoryId = $request->get('category_id');
        $date = $request->get('date');

        $query = Event::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($date) {
            $date = Carbon::parse($date);
            $query->whereDate('start_datetime', $date);
        }


        $data = [
            'events' => $query->paginate(12),
            'categories' => Category::whereHas('events')->get(),
            'user_events' => false
        ];

        return view('event.index', $data);
    }

    /**
     * Display a list of user-created events
     */
    public function getMyEvents()
    {
        $data = [
            'events' => Event::where('user_id', Auth::id())->paginate(12),
            'categories' => Category::whereHas('events')->get(),
            'user_events' => true
        ];

        return view('event.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();

        Event::create($input);

        session()->flash('success', 'Evento cadastrado com sucesso.');
        return redirect()->route('evento.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        return view('event.show', ['event' => Event::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $event = Event::findOrFail($id);

        if (!$this->checkOwnership($event)) {
            return redirect()->route('evento.index');
        }

        $data = [
            'categories' => Category::all(),
            'event' => $event,
        ];

        return view('event.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, int $id)
    {
        $input = $request->all();

        $event = Event::findOrFail($id);

        if (!$this->checkOwnership($event)) {
            return redirect()->route('evento.index');
        }

        $event->update($input);

        session()->flash('success', 'Evento editado com sucesso.');
        return redirect()->route('evento.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $event = Event::findOrFail($id);

        if (!$this->checkOwnership($event)) {
            return redirect()->route('evento.index');
        }

        $event->delete();

        session()->flash('success', 'Evento excluído com sucesso.');
        return redirect()->route('evento.index');
    }

    public function registerToEvent(int $event_id)
    {
        $event = Event::where('id', $event_id)->where('status', Event::ATIVO)->first();

        if (!$event) {
            session()->flash('warning', 'Não foi possível realizar a inscrição, pois o evento não está ativo ou não existe.');
            return back();
        }

        if (!Auth::user()) {
            session()->flash('warning', 'É necessário estar autenticado para acessar esta página.');
            return back();
        }

        $userRegistered = EventRegistration::where('participant_email', Auth::user()->email)->where('event_id', $event->id)->exists();

        if ($userRegistered) {
            session()->flash('warning', 'Você já está inscrito neste evento.');
            return back();
        }

        if ($event->remaining_spots == 0) {
            session()->flash('warning', 'Não foi possível realizar a inscrição, pois o evento não possui vagas disponíveis.');
            return back();
        }

        EventRegistration::create([
            'participant_name' => Auth::user()->name,
            'participant_email' => Auth::user()->email,
            'event_id' => $event->id
        ]);

        session()->flash('success', 'Inscrição realizada com sucesso.');
        return back();
    }

    public function destroyEventRegistration(int $event_id)
    {
        $event = Event::where('id', $event_id)->where('status', Event::ATIVO)->first();

        if (!$event) {
            session()->flash('warning', 'Não foi realizar a ação, pois o evento não está ativo ou não existe.');
            return back();
        }

        $userRegistered = EventRegistration::where('participant_email', Auth::user()->email)->where('event_id', $event->id)->exists();

        if (!$userRegistered) {
            session()->flash('warning', 'Você não está inscrito neste evento.');
            return back();
        }

        if ($event->start_datetime < today()->startOfDay()) {
            session()->flash('warning', 'Somente é possível cancelar a inscrição para o evento em datas anteriores ao início do mesmo.');
            return back();
        }

        EventRegistration::where('event_id', $event->id)->where('participant_email', Auth::user()->email)->delete();

        session()->flash('success', 'Inscrição cancelada com sucesso.');
        return back();
    }

    private static function checkOwnership(Event $event)
    {
        if ($event->user_id != Auth::id()) {
            session()->flash('warning', 'Você não é o criador do evento, portanto não pode executar essa ação.');
            return false;
        }

        return true;
    }
}

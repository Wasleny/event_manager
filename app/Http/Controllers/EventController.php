<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'events' => Event::paginate(12),
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

    private static function checkOwnership(Event $event)
    {
        if ($event->user_id != Auth::id()) {
            session()->flash('warning', 'Você não é o criador do evento, portanto não pode executar essa ação.');
            return false;
        }

        return true;
    }
}

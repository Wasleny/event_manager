<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\EventRegistration;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            EventRegistration::factory()->create([
                'participant_name' => $user->name,
                'participant_email' => $user->email,
            ]);
        }

        $events = Event::whereDoesntHave('registrations')->where('maximum_capacity', '>', 200)->take(2)->get();

        foreach ($users as $user) {
            EventRegistration::factory()->create([
                'participant_name' => $user->name,
                'participant_email' => $user->email,
                'event_id' => $events[0]->id,
            ]);
        }

        foreach ($users as $user) {
            EventRegistration::factory()->create([
                'participant_name' => $user->name,
                'participant_email' => $user->email,
                'event_id' => $events[1]->id,
            ]);
        }
    }
}

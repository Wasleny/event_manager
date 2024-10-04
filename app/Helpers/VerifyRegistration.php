<?php

namespace App\Helpers;

use App\Models\EventRegistration;
use Illuminate\Support\Facades\Auth;

/**
 * Class responsible for formatting CPF
 */
class VerifyRegistration
{
    /**
     * Method responsible for checking whether the user is registered for the event
     */
    public static function checkRegistration(int $event_id)
    {
        if (Auth::user()) {
            return EventRegistration::where('event_id', $event_id)->where('participant_email', Auth::user()->email)->exists();
        }

        return false;
    }
}

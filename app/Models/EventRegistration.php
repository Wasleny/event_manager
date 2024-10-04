<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_name',
        'participant_email',
        'event_id'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}

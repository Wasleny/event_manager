<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    const ATIVO = 'Ativo';
    const EM_ANDAMENTO = 'Em Andamento';
    const ENCERRADO = 'Encerrado';
    const ARRAY_STATUS = [self::ATIVO, self::EM_ANDAMENTO, self::ENCERRADO];

    protected $fillable = [
        'name',
        'description',
        'location',
        'start_datetime',
        'end_datetime',
        'maximum_capacity',
        'user_id',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function registrations()
    {
        return $this->hasMany(EventRegistration::class);
    }

    public function getAvailabilityAttribute()
    {
        $availability = $this->remaining_spots / $this->maximum_capacity;

        return round($availability * 100, 2);
    }

    public function getRemainingSpotsAttribute()
    {
        return $this->maximum_capacity - $this->registrations->count();
    }

    public function getColorBadgeAttribute()
    {
        if ($this->availability > 50) {
            return 'text-bg-success';
        }

        if ($this->availability > 0) {
            return 'text-bg-warning';
        }

        return 'text-bg-danger';
    }
}

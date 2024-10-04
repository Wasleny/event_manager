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

    public function creator()
    {
        return $this->hasOne(User::class);
    }

    public function getAvailabilityAttribute() {
        return $this->maximum_capacity;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoctorSlot extends Model
{
    use SoftDeletes; // se vuoi usare cancellazione logica

    protected $fillable = [
        'doctor_id',
        'date',
        'start_time',
        'end_time',
        'is_available',
    ];

    protected $dates = ['date', 'start_time', 'end_time'];
}

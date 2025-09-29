<?php

namespace Modules\MiniCrociere\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\MiniCrociere\Database\Factories\PrenotazioniFactory;

class Prenotazioni extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // protected static function newFactory(): PrenotazioniFactory
    // {
    //     // return PrenotazioniFactory::new();
    // }
}

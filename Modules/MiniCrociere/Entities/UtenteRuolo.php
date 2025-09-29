<?php

namespace Modules\MiniCrociere\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\MiniCrociere\Database\Factories\UtentiRuoliFactory;

class UtenteRuolo extends Model
  {
      use HasFactory;
    protected $table = 'mini_crociere_utenti_ruoli';

    public function crociera()
    {
        return $this->belongsTo(MiniCrociera::class);
    }

    public function ruolo()
    {
        return $this->belongsTo(Ruolo::class, 'ruolo_id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

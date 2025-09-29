<?php

namespace Modules\MiniCrociere\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
 

class MiniCrociera extends Model
{
        use HasFactory;
    protected $table = 'mini_crociere';

    public function cabine()
    {
        return $this->belongsToMany(Cabina::class, 'crocere_cabine', 'mini_crociera_id', 'cabina_id');
    }

    public function itinerari()
    {
        return $this->hasMany(Itinerario::class);
    }


    public function utentiRuoli()
    {
        return $this->hasMany(UtenteRuolo::class);
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'entita_id')->where('entita', 'crociera');
    }
}


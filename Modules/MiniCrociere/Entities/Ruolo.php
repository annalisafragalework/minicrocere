<?php

namespace Modules\MiniCrociere\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\MiniCrociere\Database\Factories\RuoliFactory;

class Ruolo extends Model
{
    use HasFactory;

 protected $table = 'mini_crociere_ruoli';

    public function assegnazioni()
    {
        return $this->hasMany(Ruolo::class, 'ruolo_id');
    }
}

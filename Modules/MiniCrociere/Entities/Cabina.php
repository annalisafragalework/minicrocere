<?php

namespace Modules\MiniCrociere\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\MiniCrociere\Database\Factories\CabineFactory;

class Cabina extends Model
{
    protected $table = 'cabine';

    public function crociere()
    {
        return $this->belongsToMany(MiniCrociera::class, 'crocere_cabine', 'cabina_id', 'mini_crociera_id');
    }

    public function media()
    {
        return $this->hasMany(Media::class, 'entita_id')->where('entita', 'cabina');
    }
}
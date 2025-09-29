<?php

namespace Modules\MiniCrociere\Entities;

use Illuminate\Database\Eloquent\Model;

class Itinerario extends Model
{
    protected $table = 'itinerari';

    public function crociera()
    {
        return $this->belongsTo(MiniCrociera::class);
    }

 
    public function media()
    {
        return $this->hasMany(Media::class, 'entita_id')->where('entita', 'itinerario');
    }
}

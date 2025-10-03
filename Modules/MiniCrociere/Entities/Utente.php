<?php

 namespace Modules\MiniCrociere\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utente extends Model
{
    protected $table = 'mini_crociere_utenti';

    protected $fillable = [
        'nome',
        'cognome',
        'email',
        'telefono',
        'data_nascita',
        'documento_identita',
        'user_id',
        'mini_crociera_id',
    ];

    public function crociera()
    {
        return $this->belongsTo(MiniCrociera::class, 'mini_crociera_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

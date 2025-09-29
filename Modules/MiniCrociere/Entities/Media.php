<?php
namespace Modules\MiniCrociere\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Modules\MiniCrociere\Database\Factories\MediaFactory;

class Media extends Model
{
        use HasFactory;
    protected $table = 'mini_crociere_media';

    protected $fillable = ['entita', 'entita_id', 'path', 'titolo', 'descrizione'];
}

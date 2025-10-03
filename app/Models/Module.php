<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{  protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_modules')
                    ->withPivot('role')
                    ->withTimestamps();
    }
}

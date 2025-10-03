<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;
/**
 *  @mixin \Spatie\Permission\Traits\HasRoles 
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $guard_name = 'web'; // fondamentale per Spatie

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relazione con MiniCrociere
    public function crociereMini()
    {
        return $this->hasMany(\Modules\MiniCrociere\Entities\Utente::class, 'user_id');
    }

    // Relazione con moduli (multi-modularità)
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'user_modules')
                    ->withPivot('role')
                    ->withTimestamps();
    }

    // Accessor per ruolo principale
    public function getPrimaryRoleAttribute(): string
    {
        return $this->getRoleNames()->first() ?? 'nessun ruolo';
    }

    // Verifica ruolo in un modulo specifico
    public function hasModuleRole(string $moduleName, string $role): bool
    {
        return $this->modules()
            ->where('name', $moduleName)
            ->wherePivot('role', $role)
            ->exists();
    }

    // Scope per filtrare utenti in un modulo
    public function scopeInModulo($query, $modulo)
    {
        return $query->whereHas('modules', function ($q) use ($modulo) {
            $q->where('name', $modulo);
        });
    }

public function getRoleCode(): int
{
    // L'ordine è cruciale per la priorità:
    
    // 1. Priorità massima: Administrator (Codice 1)
    if ($this->hasRole('administrator')) {
        return 1;
    }

    // 2. Seconda priorità: Proprietario (Codice 2)
    else if ($this->hasRole('proprietario')) {
        return 2;
    }

    // 3. Valore di default: Utente (Codice 3)
    // Se non ha i ruoli superiori, viene trattato come utente standard.
    return 3;
}
public function getHighestRoleName(): string
{
    // 1. Array di priorità (letto dalla configurazione/DB)
    // Usiamo il fallback hard-coded solo per evitare l'errore se la configurazione fallisce.
    $prioritizedRoles = Role::pluck('name')->toArray();


 
    // 2. Ruoli assegnati all'utente (lettura dinamica dal DB tramite Spatie)
    $assignedRoles = $this->getRoleNames()->toArray();
    
    // --- IL RUOLO ASSEGNATO VIENE RESTITUITO QUI ---
    foreach ($prioritizedRoles as $priorityRole) {
        if (in_array($priorityRole, $assignedRoles)) {
            // Se l'utente è 'administrator', restituisce 'administrator'.
            // Se l'utente è 'proprietario', restituisce 'proprietario'.
            return $priorityRole; 
        }
    }
   
    // --- RETE DI SICUREZZA 1: Ruoli assegnati ma non nella lista di priorità ---
    // Se il ciclo finisce, l'utente ha ruoli (es. 'guest') che non sono in $prioritizedRoles.
    if (!empty($assignedRoles)) {
        // Restituisce il primo ruolo trovato nel DB (che è il suo ruolo assegnato)
        return $assignedRoles[0]; 
    }

    // --- RETE DI SICUREZZA 2: Utente senza alcun ruolo (errore di sistema) ---
    // Questo è il solo caso in cui è accettabile restituire un fallback generico.
    return 'default_role_error'; 
}




}

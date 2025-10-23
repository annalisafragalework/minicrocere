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
        'lastname',
        'fiscal_code',
        'vat_number',
        'phone',
        'email',
        'password',
          'is_trial',
        'subscription_id', 
        'subscription_type',
        'trial_activated_at',

    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

protected $casts = [
    'email_verified_at' => 'datetime',
    'password' => 'hashed',
];

public function isTrial(): bool
{
    return $this->is_trial === 1;
}

public function isMonthly(): bool
{
    return $this->is_trial === 2;
}

public function isAnnual(): bool
{
    return $this->is_trial === 3;
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

    // Scope per filtrare dottori in un modulo
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

    // 2. Seconda priorità: dottore (Codice 2)
    else if ($this->hasRole('dottore')) {
        return 2;
    }
  else if ($this->hasRole('paziente')) {
        return 3;
    }
    // 3. Valore di default: Utente (Codice 3)
    // Se non ha i ruoli superiori, viene trattato come utente standard.
    return 0;
}
public function getHighestRoleName(): string
{
    // 1. Array di priorità (letto dalla configurazione/DB)
    // Usiamo il fallback hard-coded solo per evitare l'errore se la configurazione fallisce.
    $prioritizedRoles = Role::pluck('name')->toArray();


 
    // 2. Ruoli assegnati all'utente (lettura dinamica dal DB tramite Spatie)
    $assignedRoles = $this->getRoleNames()->toArray();
    
    // 3. Trova il ruolo con la priorità più alta
    if (!empty($assignedRoles)) {
        // Restituisce il primo ruolo trovato nel DB (che è il suo ruolo assegnato)
        return $assignedRoles[0]; 
    }

    // --- RETE DI SICUREZZA 2: Utente senza alcun ruolo (errore di sistema) ---
    // Questo è il solo caso in cui è accettabile restituire un fallback generico.
    return 'default_role_error'; 
}

// Se l'utente è un dottore
public function patients()
{
    return $this->belongsToMany(User::class, 'doctor_patient', 'doctor_id', 'patient_id')
                ->withPivot('is_primary', 'location')
                ->withTimestamps();
}

// Se l'utente è un paziente
public function doctors()
{
    return $this->belongsToMany(User::class, 'doctor_patient', 'patient_id', 'doctor_id')
                ->withPivot('is_primary', 'location')
                ->withTimestamps();
}



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpactFemininReservation extends Model
{
    use HasFactory;

    protected $table = 'impact_feminin_reservations';

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'telephone',
        'societe',
        'poste',
        'type_reservation',
        'statut',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope pour les réservations nouvelles
    public function scopeNouveau($query)
    {
        return $query->where('statut', 'nouveau');
    }

    // Scope pour les réservations confirmées
    public function scopeConfirme($query)
    {
        return $query->where('statut', 'confirme');
    }

    // Accessor pour le nom complet
    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    // Accessor pour le libellé du type de réservation
    public function getTypeReservationLibelleAttribute()
    {
        $types = [
            'participant' => 'Participant',
            'sponsor' => 'Sponsor',
            'exposant' => 'Exposant'
        ];

        return $types[$this->type_reservation] ?? $this->type_reservation;
    }
}
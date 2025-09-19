<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImpactFemininCandidature extends Model
{
    use HasFactory;

    protected $table = 'impact_feminin_candidatures';

    protected $fillable = [
        'prenom',
        'nom',
        'email',
        'telephone',
        'societe',
        'poste',
        'prix_choisi',
        'statut',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope pour les candidatures nouvelles
    public function scopeNouveau($query)
    {
        return $query->where('statut', 'nouveau');
    }

    // Scope pour les candidatures traitées
    public function scopeTraite($query)
    {
        return $query->where('statut', 'traite');
    }

    // Accessor pour le nom complet
    public function getNomCompletAttribute()
    {
        return $this->prenom . ' ' . $this->nom;
    }

    // Accessor pour le libellé du prix
    public function getPrixLibelleAttribute()
    {
        $prix = [
            'eclosion' => 'Prix Éclosion - Jeunes Entrepreneures',
            'resilience' => 'Prix Résilience - Parcours Inspirants',
            'visionnaire' => 'Prix Visionnaire - Leadership & Innovation'
        ];

        return $prix[$this->prix_choisi] ?? $this->prix_choisi;
    }
}
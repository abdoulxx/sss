<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencontreInscription2026 extends Model
{
    use HasFactory;

    protected $table = 'rencontre_inscription_2026';

    protected $fillable = [
        'nom_prenom',
        'entreprise',
        'fonction',
        'email',
        'telephone',
        'whatsapp',
        'pack_choisi',
        'destinations',
        'statut',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'destinations' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Scope pour les inscriptions nouvelles
    public function scopeNouveau($query)
    {
        return $query->where('statut', 'nouveau');
    }

    // Scope pour les inscriptions traitées
    public function scopeTraite($query)
    {
        return $query->where('statut', 'traite');
    }

    // Accessor pour le libellé du pack
    public function getPackLibelleAttribute()
    {
        $packs = [
            'standard' => 'Pack Voyage',
            'premium' => 'Pack Premium'
        ];

        return $packs[$this->pack_choisi] ?? $this->pack_choisi;
    }

    // Accessor pour les destinations formatées
    public function getDestinationsFormateesAttribute()
    {
        if (is_array($this->destinations)) {
            return implode(', ', $this->destinations);
        }
        return $this->destinations;
    }
}
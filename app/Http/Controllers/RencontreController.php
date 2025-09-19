<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RencontreInscription2026;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRencontreMail;
use App\Mail\AdminRencontreMail;
use Illuminate\Support\Facades\Log;

class RencontreController extends Controller
{
    public function index()
    {
        return view('rencontre-2026.event');
    }

    public function inscription()
    {
        return view('rencontre-2026.inscription');
    }

    public function storeInscription(Request $request)
    {
        $validatedData = $request->validate([
            'nom_prenom' => 'required|string|max:255',
            'entreprise' => 'nullable|string|max:255',
            'fonction' => 'nullable|string|max:255',
            'pack_choisi' => 'required|string|in:standard,premium',
            'destinations' => 'required|array|min:1',
            'destinations.*' => 'string',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
        ], [
            'nom_prenom.required' => 'Le nom et prénom sont obligatoires.',
            'email.required' => 'L\'adresse email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'telephone.required' => 'Le numéro de téléphone est obligatoire.',
            'pack_choisi.required' => 'Veuillez choisir une formule.',
            'pack_choisi.in' => 'La formule sélectionnée n\'est pas valide.',
            'destinations.required' => 'Veuillez sélectionner au moins une destination.',
            'destinations.min' => 'Veuillez sélectionner au moins une destination.',
        ]);

        try {
            // Enregistrer l'inscription dans la table dédiée
            $inscription = RencontreInscription2026::create([
                'nom_prenom' => $validatedData['nom_prenom'],
                'entreprise' => $validatedData['entreprise'],
                'fonction' => $validatedData['fonction'],
                'email' => $validatedData['email'],
                'telephone' => $validatedData['telephone'],
                'pack_choisi' => $validatedData['pack_choisi'],
                'destinations' => $validatedData['destinations'],
                'statut' => 'nouveau',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Envoyer l'email de confirmation à l'utilisateur
            Mail::to($inscription->email)->send(new UserRencontreMail($inscription));

            // Envoyer la notification à l'admin
            $adminEmails = explode(',', env('RENCONTRE_2026_ADMIN_EMAILS', env('ADMIN_EMAILS', config('mail.from.address'))));
            foreach ($adminEmails as $adminEmail) {
                Mail::to(trim($adminEmail))->send(new AdminRencontreMail($inscription));
            }

            return redirect()->route('rencontre-2026.inscription')->with('success', 'Votre demande d\'inscription a été envoyée avec succès ! Vous recevrez un email de confirmation sous peu.');

        } catch (\Exception $e) {
            Log::error('Erreur inscription Rencontres 2026: ' . $e->getMessage());
            return redirect()->route('rencontre-2026.inscription')->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
}
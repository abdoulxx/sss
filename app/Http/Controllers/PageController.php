<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\ImpactFemininCandidatureMail;
use App\Mail\AdminImpactFemininNotification;
use App\Mail\UserReservationMail;
use App\Mail\AdminReservationMail;
use App\Models\Contact; // Importer le modèle Contact
use App\Models\ImpactFemininCandidature;
use App\Models\ImpactFemininReservation;
use Illuminate\Support\Facades\Log; // Importer le logger

class PageController extends Controller
{
    public function contact()
    {
        return view('pages.contact');
    }

    public function sendContactForm(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        try {
            // 1. Enregistrer dans la base de données
            Contact::create([
                'nom' => $validatedData['name'],
                'email' => $validatedData['email'],
                'objet' => $validatedData['subject'],
                'message' => $validatedData['message'],
                'statut' => 'nouveau', // Statut par défaut
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // 2. Envoyer l'e-mail
            Mail::to(config('mail.from.address'))->send(new ContactFormMail($validatedData));

            return redirect()->route('pages.contact')->with('success', 'Votre message a été envoyé et enregistré avec succès !');

        } catch (\Exception $e) {
            Log::error('Erreur du formulaire de contact: ' . $e->getMessage());
            return redirect()->route('pages.contact')->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    public function storeImpactFemininCandidature(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'societe' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'prix_choisi' => 'required|in:eclosion,resilience,visionnaire',
        ]);

        try {
            // Enregistrer la candidature dans la table dédiée
            $candidature = ImpactFemininCandidature::create([
                'prenom' => $validatedData['prenom'],
                'nom' => $validatedData['nom'],
                'email' => $validatedData['email'],
                'telephone' => $validatedData['telephone'],
                'societe' => $validatedData['societe'],
                'poste' => $validatedData['poste'],
                'prix_choisi' => $validatedData['prix_choisi'],
                'statut' => 'nouveau',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Envoyer l'email de confirmation à l'utilisateur
            Mail::to($candidature->email)->send(new ImpactFemininCandidatureMail($candidature));

            // Envoyer la notification à l'admin
            $adminEmails = explode(',', env('IMPACT_FEMININ_ADMIN_EMAILS', env('ADMIN_EMAILS', config('mail.from.address'))));
            foreach ($adminEmails as $adminEmail) {
                Mail::to(trim($adminEmail))->send(new AdminImpactFemininNotification($candidature));
            }

            return redirect()->route('impact-feminin.candidature')->with('success', 'Votre candidature a été envoyée avec succès ! Vous recevrez un email de confirmation sous peu.');

        } catch (\Exception $e) {
            Log::error('Erreur candidature Impact Féminin: ' . $e->getMessage());
            return redirect()->route('impact-feminin.candidature')->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }

    public function storeImpactFemininReservation(Request $request)
    {
        $validatedData = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'societe' => 'required|string|max:255',
            'poste' => 'required|string|max:255',
            'type_reservation' => 'required|in:participant,sponsor,exposant',
        ]);

        try {
            // Enregistrer la réservation dans la table dédiée
            $reservation = ImpactFemininReservation::create([
                'prenom' => $validatedData['prenom'],
                'nom' => $validatedData['nom'],
                'email' => $validatedData['email'],
                'telephone' => $validatedData['telephone'],
                'societe' => $validatedData['societe'],
                'poste' => $validatedData['poste'],
                'type_reservation' => $validatedData['type_reservation'],
                'statut' => 'nouveau',
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent(),
            ]);

            // Envoyer l'email de confirmation à l'utilisateur
            Mail::to($reservation->email)->send(new UserReservationMail($reservation));

            // Envoyer la notification à l'admin
            $adminEmails = explode(',', env('IMPACT_FEMININ_ADMIN_EMAILS', env('ADMIN_EMAILS', config('mail.from.address'))));
            foreach ($adminEmails as $adminEmail) {
                Mail::to(trim($adminEmail))->send(new AdminReservationMail($reservation));
            }

            return redirect()->route('impact-feminin.reservation')->with('success', 'Votre réservation a été confirmée avec succès ! Vous recevrez un email de confirmation sous peu.');

        } catch (\Exception $e) {
            Log::error('Erreur réservation Impact Féminin: ' . $e->getMessage());
            return redirect()->route('impact-feminin.reservation')->with('error', 'Une erreur est survenue. Veuillez réessayer.');
        }
    }
}

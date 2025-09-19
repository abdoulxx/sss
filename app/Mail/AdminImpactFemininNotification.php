<?php

namespace App\Mail;

use App\Models\ImpactFemininCandidature;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminImpactFemininNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $candidature;

    /**
     * Create a new message instance.
     */
    public function __construct(ImpactFemininCandidature $candidature)
    {
        $this->candidature = $candidature;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nouvelle Candidature Reçue - Impact Féminin',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.admin_impact_feminin_notification',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
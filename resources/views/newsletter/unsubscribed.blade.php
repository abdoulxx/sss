@extends('layouts.app')

@section('title', 'Désabonnement Newsletter - Excellence Afrik')

@push('styles')
<style>
:root {
    --ea-gold: #F2CB05;
    --ea-dark: #1a1a1a;
    --ea-light: #f8f9fa;
}

.unsubscribe-section {
    background: linear-gradient(135deg, var(--ea-dark) 0%, var(--ea-gold) 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem 0;
}

.unsubscribe-card {
    background: white;
    border-radius: 20px;
    box-shadow: 0 20px 60px rgba(0,0,0,0.1);
    padding: 3rem;
    max-width: 600px;
    width: 100%;
    margin: 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.unsubscribe-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 5px;
    background: linear-gradient(90deg, var(--ea-gold), #c1933e);
}

.unsubscribe-icon {
    width: 100px;
    height: 100px;
    background: linear-gradient(135deg, var(--ea-gold), #c1933e);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem auto;
    font-size: 2.5rem;
    color: var(--ea-dark);
    animation: pulseGlow 2s infinite;
}

@keyframes pulseGlow {
    0%, 100% {
        transform: scale(1);
        box-shadow: 0 0 20px rgba(242, 203, 5, 0.3);
    }
    50% {
        transform: scale(1.05);
        box-shadow: 0 0 30px rgba(242, 203, 5, 0.5);
    }
}

.unsubscribe-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--ea-dark);
    margin-bottom: 1rem;
}

.unsubscribe-message {
    font-size: 1.1rem;
    color: #6c757d;
    margin-bottom: 2rem;
    line-height: 1.6;
}

.subscriber-info {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    border-radius: 15px;
    padding: 1.5rem;
    margin: 2rem 0;
    border-left: 5px solid var(--ea-gold);
}

.subscriber-info h5 {
    color: var(--ea-dark);
    margin-bottom: 1rem;
    font-weight: 600;
}

.subscriber-email {
    background: var(--ea-dark);
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 25px;
    font-weight: 600;
    display: inline-block;
    margin: 0.5rem 0;
}

.feedback-section {
    background: linear-gradient(135deg, #f8f9fa, #e9ecef);
    border-radius: 15px;
    padding: 2rem;
    margin: 2rem 0;
}

.feedback-title {
    color: var(--ea-dark);
    font-weight: 600;
    margin-bottom: 1rem;
}

.feedback-text {
    color: #6c757d;
    font-size: 0.95rem;
    line-height: 1.5;
}

.actions-section {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
    margin-top: 2rem;
}

.btn-home {
    background: linear-gradient(135deg, var(--ea-gold), #c1933e);
    border: none;
    color: var(--ea-dark);
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-home:hover {
    transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(242, 203, 5, 0.3);
    color: var(--ea-dark);
    text-decoration: none;
}

.btn-resubscribe {
    background: #6c757d;
    border: none;
    color: white;
    padding: 1rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-decoration: none;
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-resubscribe:hover {
    background: #5a6268;
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

@media (max-width: 768px) {
    .unsubscribe-card {
        padding: 2rem;
        margin: 1rem;
    }

    .unsubscribe-title {
        font-size: 2rem;
    }

    .actions-section {
        flex-direction: column;
        align-items: center;
    }

    .btn-home, .btn-resubscribe {
        width: 100%;
        max-width: 250px;
        justify-content: center;
    }
}
</style>
@endpush

@section('content')
<div class="unsubscribe-section">
    <div class="unsubscribe-card">
        <div class="unsubscribe-icon">
            <i class="fas fa-envelope-open"></i>
        </div>

        <h1 class="unsubscribe-title">Désabonnement effectué</h1>

        <p class="unsubscribe-message">{{ $message }}</p>

        @if($subscriber && !$subscriber->is_active)
            <div class="subscriber-info">
                <h5>
                    <i class="fas fa-info-circle text-primary me-2"></i>
                    Confirmation de désabonnement
                </h5>
                <p class="mb-2">Vous ne recevrez plus nos newsletters à l'adresse :</p>
                <div class="subscriber-email">{{ $subscriber->email }}</div>
                <p class="mt-3 mb-0 text-muted small">
                    <strong>Date de désabonnement :</strong> {{ $subscriber->unsubscribed_at->format('d/m/Y à H:i') }}
                </p>
            </div>

            <div class="feedback-section">
                <h5 class="feedback-title">
                    <i class="fas fa-heart me-2" style="color: var(--ea-gold);"></i>
                    Nous espérons vous revoir bientôt !
                </h5>
                <p class="feedback-text">
                    Vous changez d'avis ? Vous pouvez vous réabonner à tout moment sur notre site web.
                    Nous continuerons à produire du contenu de qualité sur l'économie africaine et les entrepreneurs qui façonnent l'avenir du continent.
                </p>
            </div>
        @else
            <div class="subscriber-info">
                <h5>
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    Information
                </h5>
                <p class="mb-0">{{ $message }}</p>
            </div>
        @endif

        <div class="actions-section">
            <a href="{{ url('/') }}" class="btn-home">
                <i class="fas fa-home"></i>
                Retour à l'accueil
            </a>

            @if($subscriber && !$subscriber->is_active)
                <button onclick="resubscribe('{{ $subscriber->unsubscribe_token }}')" class="btn-resubscribe" id="resubscribeBtn">
                    <span class="btn-text">
                        <i class="fas fa-envelope"></i>
                        Se réabonner
                    </span>
                    <span class="btn-loading" style="display: none;">
                        <i class="fas fa-spinner fa-spin"></i>
                        Traitement...
                    </span>
                </button>
            @endif
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function resubscribe(token) {
    const btn = document.getElementById('resubscribeBtn');
    const btnText = btn.querySelector('.btn-text');
    const btnLoading = btn.querySelector('.btn-loading');

    // Show loading state
    btnText.style.display = 'none';
    btnLoading.style.display = 'inline-flex';
    btn.disabled = true;

    fetch(`/newsletter/resubscribe/${token}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Accept': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        // Reset loading state
        btnText.style.display = 'inline-flex';
        btnLoading.style.display = 'none';
        btn.disabled = false;

        if (data.success) {
            let icon = 'success';
            let title = 'Réabonnement réussi !';

            if (data.type === 'already_active') {
                icon = 'info';
                title = 'Déjà abonné(e)';
            }

            Swal.fire({
                icon: icon,
                title: title,
                text: data.message,
                confirmButtonText: 'Parfait !',
                confirmButtonColor: '#F2CB05',
                timer: 5000,
                timerProgressBar: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            }).then(() => {
                // Recharger la page pour mettre à jour l'affichage
                window.location.reload();
            });

            // Cacher le bouton de réabonnement
            if (data.type !== 'already_active') {
                btn.style.display = 'none';
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: data.message,
                confirmButtonText: 'Compris',
                confirmButtonColor: '#dc3545'
            });
        }
    })
    .catch(error => {
        console.error('Error:', error);

        // Reset loading state
        btnText.style.display = 'inline-flex';
        btnLoading.style.display = 'none';
        btn.disabled = false;

        Swal.fire({
            icon: 'error',
            title: 'Erreur de connexion',
            text: 'Une erreur est survenue. Vérifiez votre connexion internet et réessayez.',
            confirmButtonText: 'Réessayer',
            confirmButtonColor: '#dc3545'
        });
    });
}
</script>
@endsection
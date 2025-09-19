@extends('layouts.app')

@section('title', 'Inscription - Rencontres Internationales 2026')
@section('meta_description', 'Inscrivez-vous aux Rencontres Internationales B2B 2026. Développez votre réseau international dans 6 destinations stratégiques.')

@push('styles')
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    .form-hero-section {
        background-color: #181818;
        padding: 60px 0;
    }
    .form-hero-title {
        font-size: 2.8rem;
        font-weight: 700;
        color: #fff;
    }
    .form-container {
        background-color: #ffffff !important;
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .form-label {
        font-weight: 700;
        margin-bottom: 8px;
    }
    .form-control,
    .form-select {
        border-radius: 8px;
        padding: 12px 15px;
    }
    .btn-submit-custom {
        background-color: #EA4D28;
        color: #fff;
        border-radius: 50px;
        padding: 15px 40px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
        border: none;
        width: 100%;
        max-width: 400px;
    }
    .btn-submit-custom:hover {
        background-color: #181818;
        color: #fff;
        filter: brightness(90%);
    }

    /* Responsive styles pour le bouton */
    @media (max-width: 768px) {
        .btn-submit-custom {
            padding: 12px 30px;
            font-size: 1rem;
            width: 100%;
            max-width: none;
        }
    }

    @media (max-width: 576px) {
        .btn-submit-custom {
            padding: 10px 25px;
            font-size: 0.9rem;
        }
    }
    .form-check-label {
        font-weight: 500;
    }
    body {
        background-color: #ffffff !important;
    }
    .container.my-5 {
        background-color: #ffffff !important;
        margin: 0 !important;
        max-width: 100% !important;
        padding: 60px 15px !important;
    }
    .pack-info {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-bottom: 20px;
        border-left: 4px solid #EA4D28;
    }
</style>
@endpush

@section('content')

<!-- Section Hero -->
<section class="form-hero-section text-center">
    <div class="container">
        <h1 class="form-hero-title" data-aos="fade-up">Formulaire d'inscription</h1>
        <p class="text-white-50 fs-5 mt-3" data-aos="fade-up" data-aos-delay="200">Rencontres Internationales B2B 2026</p>
    </div>
</section>

<!-- Section Formulaire -->
<div class="container my-5" style="background-color: #ffffff; padding: 60px 0;">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="form-container" data-aos="fade-up" data-aos-duration="800">

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('rencontre-2026.inscription.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nom_prenom" class="form-label">Nom & Prénom *</label>
                            <input type="text" class="form-control @error('nom_prenom') is-invalid @enderror"
                                   id="nom_prenom" name="nom_prenom" value="{{ old('nom_prenom') }}" required>
                            @error('nom_prenom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="fonction" class="form-label">Poste/Fonction</label>
                            <input type="text" class="form-control" id="fonction" name="fonction" value="{{ old('fonction') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="entreprise" class="form-label">Entreprise/Organisation</label>
                        <input type="text" class="form-control" id="entreprise" name="entreprise" value="{{ old('entreprise') }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required>
                             @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="telephone" class="form-label">Téléphone *</label>
                            <input type="tel" class="form-control @error('telephone') is-invalid @enderror"
                                   id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                             @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Choix de la formule *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pack_choisi" id="pack_standard"
                                   value="standard" {{ old('pack_choisi', 'standard') == 'standard' ? 'checked' : '' }}>
                            <label class="form-check-label" for="pack_standard">
                                <strong>Pack Standard</strong> - 2 550 000 FCFA/voyage
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pack_choisi" id="pack_premium"
                                   value="premium" {{ old('pack_choisi') == 'premium' ? 'checked' : '' }}>
                            <label class="form-check-label" for="pack_premium">
                                <strong>Pack Premium</strong> - 3 500 000 FCFA/voyage
                            </label>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Destinations souhaitées * (Sélectionnez au moins une destination)</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="destinations[]" type="checkbox"
                                           value="dubai" id="dest-dubai"
                                           {{ in_array('dubai', old('destinations', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dest-dubai">Dubaï (Février)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="destinations[]" type="checkbox"
                                           value="espagne" id="dest-espagne"
                                           {{ in_array('espagne', old('destinations', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dest-espagne">Espagne (Mars)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="destinations[]" type="checkbox"
                                           value="chine" id="dest-chine"
                                           {{ in_array('chine', old('destinations', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dest-chine">Chine (Mai)</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" name="destinations[]" type="checkbox"
                                           value="singapour" id="dest-singapour"
                                           {{ in_array('singapour', old('destinations', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dest-singapour">Singapour (Juillet)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="destinations[]" type="checkbox"
                                           value="canada" id="dest-canada"
                                           {{ in_array('canada', old('destinations', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dest-canada">Canada (Septembre)</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="destinations[]" type="checkbox"
                                           value="inde" id="dest-inde"
                                           {{ in_array('inde', old('destinations', [])) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="dest-inde">Inde (Décembre)</label>
                                </div>
                            </div>
                        </div>
                        @error('destinations')
                            <div class="text-danger mt-1"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-submit-custom">Envoyer ma demande d'inscription</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    AOS.init();

    const form = document.querySelector('form');
    if (form) {
        form.addEventListener('submit', function() {
            const submitButton = form.querySelector('.btn-submit-custom');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = `
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                    Envoi en cours...
                `;
            }
        });
    }
});
</script>
@endpush
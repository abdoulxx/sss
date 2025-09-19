@extends('layouts.app')

@section('title', 'Candidature Impact Féminin - Excellence Afrik')
@section('meta_description', 'Postulez pour les Prix Impact Féminin 2025 et célébrez l\'excellence entrepreneuriale féminine.')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/impactfeminin.css') }}">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<style>
    .form-section {
        background-color: #f8f9fa;
        padding: 40px;
        border-radius: 15px;
        margin-bottom: 30px;
    }
    .form-title {
        color: var(--impact-primary, #814cb0);
        font-weight: 700;
        margin-bottom: 25px;
    }
    .form-label {
        font-weight: 600;
        margin-bottom: 8px;
    }
    .form-control,
    .form-select {
        border-radius: 8px;
        padding: 12px 15px;
    }
    .submit-btn {
        background-color: #B75FBE;
        border: none;
        color: white;
        padding: 15px 40px;
        border-radius: 50px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.3s ease;
    }
    .submit-btn:hover {
        filter: brightness(90%);
    }
    .display-4 {
        color: #B75FBE !important;
    }
</style>
@endpush

@section('content')

<!-- ===== SECTION 1 - HERO SECTION CANDIDATURE ===== -->
<section class="impact-hero">
    <!-- Décorations géométriques -->
    <div class="impact-decoration impact-decoration-1"></div>
    <div class="impact-decoration impact-decoration-2"></div>

    <!-- Titre principal centré -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="impact-main-title" data-aos="fade-up" data-aos-duration="1000">
                    Candidature Impact Féminin 2025
                </h1>
            </div>
        </div>
    </div>
</section>

<section class="padding-top-bottom3" style="background-color: white;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="form-section shadow-sm">

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('impact-feminin.candidature.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="prenom" class="form-label">Prénom *</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" required value="{{ old('prenom') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom *</label>
                                <input type="text" class="form-control" id="nom" name="nom" required value="{{ old('nom') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input type="email" class="form-control" id="email" name="email" required value="{{ old('email') }}">
                        </div>

                        <div class="mb-3">
                            <label for="telephone" class="form-label">Téléphone *</label>
                            <input type="tel" class="form-control" id="telephone" name="telephone" required value="{{ old('telephone') }}">
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="societe" class="form-label">Société *</label>
                                <input type="text" class="form-control" id="societe" name="societe" required value="{{ old('societe') }}">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="poste" class="form-label">Poste *</label>
                                <input type="text" class="form-control" id="poste" name="poste" required value="{{ old('poste') }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="prix_choisi" class="form-label">Prix choisi *</label>
                            <select class="form-select" id="prix_choisi" name="prix_choisi" required>
                                <option value="" disabled selected>Choisissez un prix</option>
                                <option value="eclosion" {{ old('prix_choisi') == 'eclosion' ? 'selected' : '' }}>Prix Éclosion - Jeunes Entrepreneures</option>
                                <option value="resilience" {{ old('prix_choisi') == 'resilience' ? 'selected' : '' }}>Prix Résilience - Parcours Inspirants</option>
                                <option value="visionnaire" {{ old('prix_choisi') == 'visionnaire' ? 'selected' : '' }}>Prix Visionnaire - Leadership & Innovation</option>
                            </select>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit" class="submit-btn">Envoyer ma candidature</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();

    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('form');
        if (form) {
            form.addEventListener('submit', function() {
                const submitButton = form.querySelector('.submit-btn');
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
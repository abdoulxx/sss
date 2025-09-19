@extends('layouts.app')

@section('title', 'Rencontres Internationales 2026 - Excellence Afrik')
@section('meta_description', 'Participez aux Rencontres Internationales B2B 2026. Un programme de rencontres d\'affaires dans 6 pays pour développer votre réseau international.')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css">
<link href="{{ asset('assets/css/rencontre-2026.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@section('content')

<main>
    <!-- Section d'intro immersive -->
    <section class="acd-hero-section d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <h1 class="acd-hero-title mb-4">
                <span class="animate-mask">
                    <span class="animate-slide-up" data-aos="fade-up" data-aos-duration="800">Rencontre Professionnelle</span>
                </span>
                <br>
                <span class="animate-mask">
                    <span class="animate-slide-up acd-red" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">2026</span>
                </span>
            </h1>
            <p class="acd-hero-desc mx-auto mb-4" data-aos="fade-up" data-aos-duration="800" data-aos-delay="400">
                Participez à une série exclusive de rencontres internationales réunissant <span style="color: #EA4D28;">investisseurs, chefs d'entreprises, porteurs de projets</span>, institutions publiques et partenaires étrangers autour d'<span style="color: #EA4D28;">opportunités stratégiques multisectorielles</span>.
            </p>
            <div data-aos="fade-up" data-aos-duration="800" data-aos-delay="600">
                <a href="{{ route('rencontre-2026.inscription') }}" class="btn btn-reserver acd-btn-hero">S'inscrire</a>
            </div>
        </div>
    </section>

    <!-- Section Programme annuel  -->
    <section id="programme" class="acd-section py-5 bg-white" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="acd-section-header mb-5 text-center">
                <h2 class="acd-section-title">Programme Annuel 2026</h2>
                <div class="acd-section-bar mx-auto"></div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-dest-card-visual flex-fill text-center"
                         style="background-image: url('{{ asset('assets/images-pro/dubai.jpg') }}');"
                         data-aos="zoom-in" data-aos-delay="100">
                        <div class="acd-dest-card-overlay">
                            <div class="acd-dest-month">Février</div>
                            <div class="acd-dest-country">Dubaï</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-dest-card-visual flex-fill text-center"
                         style="background-image: url('{{ asset('assets/images-pro/spain.jpg') }}');"
                         data-aos="zoom-in" data-aos-delay="200">
                        <div class="acd-dest-card-overlay">
                            <div class="acd-dest-month">Mars</div>
                            <div class="acd-dest-country">Espagne</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-dest-card-visual flex-fill text-center"
                         style="background-image: url('{{ asset('assets/images-pro/china.jpg') }}');"
                         data-aos="zoom-in" data-aos-delay="300">
                        <div class="acd-dest-card-overlay">
                            <div class="acd-dest-month">Mai</div>
                            <div class="acd-dest-country">Chine</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-dest-card-visual flex-fill text-center"
                         style="background-image: url('{{ asset('assets/images-pro/singapore.jpg') }}');"
                         data-aos="zoom-in" data-aos-delay="400">
                        <div class="acd-dest-card-overlay">
                            <div class="acd-dest-month">Juillet</div>
                            <div class="acd-dest-country">Singapour</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-dest-card-visual flex-fill text-center"
                         style="background-image: url('{{ asset('assets/images-pro/canada.jpg') }}');"
                         data-aos="zoom-in" data-aos-delay="500">
                        <div class="acd-dest-card-overlay">
                            <div class="acd-dest-month">Septembre</div>
                            <div class="acd-dest-country">Canada</div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-dest-card-visual flex-fill text-center"
                         style="background-image: url('{{ asset('assets/images-pro/india.jpg') }}');"
                         data-aos="zoom-in" data-aos-delay="600">
                        <div class="acd-dest-card-overlay">
                            <div class="acd-dest-month">Décembre</div>
                            <div class="acd-dest-country">Inde</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Objectifs -->
    <section id="objectifs" class="acd-section acd-section-dark py-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="acd-section-header mb-5 text-center">
                <h2 class="acd-section-title">Objectifs des événements</h2>
                <div class="acd-section-bar mx-auto"></div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-obj-card flex-fill text-center" data-aos="fade-up" data-aos-delay="100">
                        <div class="acd-obj-icon mb-3"><i class="bi bi-people-fill"></i></div>
                        <div class="acd-obj-title mb-2">Rencontres des investisseurs internationaux</div>
                        <div class="acd-obj-desc">Faciliter des rendez-vous ciblés entre porteurs de projets et investisseurs de premier plan.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-obj-card flex-fill text-center" data-aos="fade-up" data-aos-delay="200">
                        <div class="acd-obj-icon mb-3"><i class="bi bi-briefcase"></i></div>
                        <div class="acd-obj-title mb-2">Trouver des partenaires commerciaux</div>
                        <div class="acd-obj-desc">Identifier et connecter les entreprises avec des partenaires stratégiques pour accélérer leur développement.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-obj-card flex-fill text-center" data-aos="fade-up" data-aos-delay="300">
                        <div class="acd-obj-icon mb-3"><i class="bi bi-currency-exchange"></i></div>
                        <div class="acd-obj-title mb-2">Financements transfrontalier</div>
                        <div class="acd-obj-desc">Explorer les financements au-delà des frontières pour soutenir la croissance des entreprises.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-obj-card flex-fill text-center" data-aos="fade-up" data-aos-delay="400">
                        <div class="acd-obj-icon mb-3"><i class="bi bi-puzzle"></i></div>
                        <div class="acd-obj-title mb-2">Créer des synergies</div>
                        <div class="acd-obj-desc">Établir des liens solides et durables entre les acteurs économiques internationaux et africains.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-obj-card flex-fill text-center" data-aos="fade-up" data-aos-delay="500">
                        <div class="acd-obj-icon mb-3"><i class="bi bi-globe"></i></div>
                        <div class="acd-obj-title mb-2">Ouverture de marchés</div>
                        <div class="acd-obj-desc">Accompagner l'implantation et l'expansion des entreprises africaines à l'international.</div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4 d-flex">
                    <div class="acd-obj-card flex-fill text-center" data-aos="fade-up" data-aos-delay="600">
                        <div class="acd-obj-icon mb-3"><i class="bi bi-chat-dots"></i></div>
                        <div class="acd-obj-title mb-2">Plateforme d'échanges</div>
                        <div class="acd-obj-desc">Offrir un espace privilégié pour les échanges et les opportunités de co-investissement.</div>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-4 d-flex">
                        <div class="acd-obj-card flex-fill text-center" data-aos="fade-up" data-aos-delay="700">
                            <div class="acd-obj-icon mb-3"><i class="bi bi-book"></i></div>
                            <div class="acd-obj-title mb-2">Transfert de savoir-faire</div>
                            <div class="acd-obj-desc">Encourager le partage de compétences, de technologies et de bonnes pratiques.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Tarifs  -->
    <section id="reservation" class="acd-section bg-white py-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="acd-section-header mb-5 text-center">
                <h2 class="acd-section-title">Informations tarifaires</h2>
                <div class="acd-section-bar mx-auto"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-10">
                    <div class="acd-tarif-card" data-aos="zoom-in" data-aos-delay="200">
                        <div class="row align-items-center">
                            <div class="col-lg-6 tarif-details">
                                <h3 class="pack-title">Pack Standard</h3>
                                <div class="pack-price">2 550 000 <span class="pack-currency">FCFA/voyage</span></div>
                                <h3 class="pack-title mt-4">Pack Premium</h3>
                                <div class="pack-price">3 500 000 <span class="pack-currency">FCFA/voyage</span></div>
                                <p class="reservation-fee mt-3 mb-4">Réservation et frais de visa : <strong>450 000 FCFA</strong></p>
                                <a href="{{ route('rencontre-2026.inscription') }}" class="btn btn-reserver fw-bold">Réserver maintenant</a>
                            </div>
                            <div class="col-lg-6 tarif-includes mt-4 mt-lg-0">
                                <h4 class="includes-title mb-3">Inclus dans le package :</h4>
                                <ul class="includes-list mb-4">
                                    <li><i class="bi bi-airplane-fill"></i> Billet aller-retour</li>
                                    <li><i class="bi bi-building-fill"></i> Hôtel</li>
                                    <li><i class="bi bi-people-fill"></i> Rencontre Investisseurs</li>
                                    <li><i class="bi bi-wifi"></i> Networking et B2B</li>
                                    <li><i class="bi bi-award-fill"></i> Certificat de participation</li>
                                    <li><i class="bi bi-trophy-fill"></i> <del>Prix d'excellence international</del> <small class="text-muted"><em>(Inclus dans le Pack Premium)</em></small></li>
                                    <li><i class="bi bi-mic-fill"></i> <del>Pitch devant investisseurs</del> <small class="text-muted"><em>(Inclus dans le Pack Premium)</em></small></li>
                                    <li><i class="bi bi-book-fill"></i> Formation sur des Thématiques</li>
                                    <li><i class="bi bi-cup-hot-fill"></i> Petits Déjeuners</li>
                                    <li><i class="bi bi-cutlery"></i> Dîner</li>
                                    <li><i class="bi bi-cup-fill"></i> Dîner d'affaire</li>
                                    <li><i class="bi bi-geo-alt-fill"></i> Un pays de votre choix</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Galerie -->
    <section id="galerie" class="acd-section acd-section-dark py-5" data-aos="fade-up" data-aos-duration="1000">
        <div class="container">
            <div class="acd-section-header mb-5 text-center">
                <h2 class="acd-section-title">Nos Éditions en Images (1 à 9)</h2>
                <div class="acd-section-bar mx-auto"></div>
            </div>
            <div class="row g-4">
                @for($i = 1; $i <= 12; $i++)
                <div class="col-lg-3 col-md-6">
                    <a href="{{ asset('assets/images-pro/galerie/image' . $i . '.png') }}" class="glightbox" data-gallery="gallery1">
                        <div class="acd-gallery-item" data-aos="fade-up" data-aos-delay="{{ $i * 100 }}">
                            <img src="{{ asset('assets/images-pro/galerie/image' . $i . '.png') }}" class="acd-gallery-img" alt="Galerie Image {{ $i }}">
                        </div>
                    </a>
                </div>
                @endfor
            </div>
            <div class="text-center mt-5">
                <a href="https://bibliotheque.acdcorporateservices.com/phototheque.php" target="_blank" class="btn acd-btn-outline">Voir plus de photos</a>
            </div>
        </div>
    </section>
</main>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    AOS.init({ once: true });

    const lightbox = GLightbox({
        selector: '.glightbox'
    });
});
</script>
@endpush
@extends('layouts.app')

@section('title', 'Impact Féminin 2025 - Excellence Afrik')
@section('meta_description', 'Découvrez Impact Féminin 2025, l\'événement qui célèbre l\'excellence entrepreneuriale féminine en Afrique.')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/impactfeminin.css') }}">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@section('content')

<!-- ===== SECTION 1 - HERO SECTION IMPACT FÉMININ ===== -->
<section class="impact-hero">
    <!-- Décorations géométriques -->
    <div class="impact-decoration impact-decoration-1"></div>
    <div class="impact-decoration impact-decoration-2"></div>

    <!-- Titre principal centré -->
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="impact-main-title" data-aos="fade-up" data-aos-duration="1000">
                    IMPACT FÉMININ 2025
                </h1>
                <div style="color: white; margin-top: 20px;">
                    <p style="font-size: 1.5rem; font-weight: 600; margin-bottom: 5px;">
                        19 Novembre 2025 | 19h30 - 22h30
                    </p>
                    <p style="font-size: 1.2rem;">
                        NOVOTEL PLATEAU
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section contenu avec image et texte -->
<section class="impact-content-section">
    <div class="container">
        <div class="row align-items-center">
            <!-- Image à gauche -->
            <div class="col-lg-6 col-md-6 mb-4">
                <div class="impact-image-container" data-aos="fade-right" data-aos-duration="1000">
                    <img src="{{ asset('assets/images/impact-feminin/image1.jpg') }}"
                        alt="Femmes entrepreneures Impact Féminin" class="impact-main-image">
                </div>
            </div>

            <!-- Contenu texte à droite -->
            <div class="col-lg-6 col-md-6">
                <div class="impact-text-content">
                    <h2 class="impact-section-title" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
                        Célébrons l'Excellence Féminine
                    </h2>

                    <p class="impact-description" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="400">
                        Impact Féminin est un événement prestigieux qui met à l'honneur les femmes entrepreneures qui transforment l'économie africaine. Rejoignez-nous pour une soirée de célébration, de networking et d'inspiration.
                    </p>

                    <div class="mt-4">
                        <a href="{{ route('impact-feminin.candidature') }}" class="impact-candidate-btn">
                            Je candidate
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECTION 2 - POURQUOI IMPACT FÉMININ ===== -->
<section class="impact-why-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto text-center">
                <h2 class="impact-why-title" data-aos="fade-up" data-aos-duration="1000">
                    Pourquoi Impact Féminin ?
                </h2>
                <p class="impact-why-description" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    Les femmes représentent une force entrepreneuriale majeure en Afrique. Impact Féminin reconnaît et célèbre leur contribution exceptionnelle au développement économique du continent.
                </p>

                <!-- Bouton Je candidate repositionné -->
                <div class="mt-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="{{ route('impact-feminin.candidature') }}" class="impact-cta-btn">
                        Je candidate
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECTION 3 - PRIX D'IMPACT FÉMININ ===== -->
<section class="impact-awards-section">
    <div class="container">
        <!-- Titre et description -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <h2 class="impact-awards-title" data-aos="fade-up" data-aos-duration="1000">
                    Les Prix Impact Féminin
                </h2>
                <p class="impact-awards-description" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    Mettre en lumière l'audace, la résilience et la vision des femmes qui non seulement bâtissent l'économie, mais génèrent également un impact ESG significatif sur la communauté après la création de leur entreprise, dont la durée d'existence est comprise entre 3 et 10 ans et plus.
                </p>
            </div>
        </div>

        <!-- Grille des trois prix -->
        <div class="row g-4 mb-5 awards-cards-grid">
            <!-- Prix Éclosion -->
            <div class="col-lg-4 col-md-6">
                <div class="impact-award-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-seedling"></i>
                        </div>
                        <h3 class="award-title">Prix Éclosion Féminin</h3>
                        <p class="award-subtitle"></p>
                    </div>
                    <div class="award-description">
                        <p>Ce prix met en lumière les femmes entrepreneures qui ont lancé une entreprise jeune et prometteuse</p>

                        <div style="margin: 15px 0;">
                            <h4 style="color: #8B5CF6; font-size: 14px; font-weight: 600; margin-bottom: 5px;">●Conditions</h4>
                            <ul style="margin: 0; padding-left: 15px; font-size: 13px;">
                                <li>Durée d'existence : 3 à 5 ans</li>
                                <li>Nombre minimum d'employées : 2</li>
                            </ul>
                        </div>

                        <div style="margin: 15px 0;">
                            <h4 style="color: #8B5CF6; font-size: 14px; font-weight: 600; margin-bottom: 5px;">●Critères valorisés</h4>
                            <ul style="margin: 0; padding-left: 15px; font-size: 13px;">
                                <li>Une croissance régulière depuis la création</li>
                                <li>La première structuration réussie de l'équipe</li>
                                <li>L'établissement de partenariats ou de clients significatifs</li>
                                <li>La capacité à innover ou à se différencier sur le marché</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prix Résilience -->
            <div class="col-lg-4 col-md-6">
                <div class="impact-award-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="award-title">Prix Résilience Féminin</h3>
                        <p class="award-subtitle"></p>
                    </div>
                    <div class="award-description">
                        <p>Ce prix honore les femmes dirigeantes qui ont traversé des étapes critiques du développement et de la consolidation. Il célèbre leur persévérance, leur stabilité et leur adaptabilité dans la construction d'une base solide pour une croissance durable.</p>

                        <div style="margin: 15px 0;">
                            <h4 style="color: #8B5CF6; font-size: 14px; font-weight: 600; margin-bottom: 5px;">●Conditions</h4>
                            <ul style="margin: 0; padding-left: 15px; font-size: 13px;">
                                <li>Durée d'existence : 6 à 9 ans</li>
                                <li>Nombre minimum d'employées : 4</li>
                            </ul>
                        </div>

                        <div style="margin: 15px 0;">
                            <h4 style="color: #8B5CF6; font-size: 14px; font-weight: 600; margin-bottom: 5px;">●Critères valorisés</h4>
                            <ul style="margin: 0; padding-left: 15px; font-size: 13px;">
                                <li>Une gestion financière et opérationnelle saine</li>
                                <li>Le développement de l'équipe et la structuration interne</li>
                                <li>La capacité à surmonter les crises ou à pivoter avec succès</li>
                                <li>Des impacts positifs mesurables sur le marché ou la communauté</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Prix Visionnaire -->
            <div class="col-lg-4 col-md-6">
                <div class="impact-award-card" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500">
                    <div class="award-header">
                        <div class="award-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="award-title">Prix Visionnaire Féminin</h3>
                        <p class="award-subtitle"></p>
                    </div>
                    <div class="award-description">
                        <p>Ce prix récompense les femmes entrepreneures qui ont bâti une entreprise pérenne, influente et résonnent parmi vers l'avenir avec une vision stratégique, l'impact sociétal et l'héritage entrepreneurial des dirigeantes les plus expérimentées.</p>

                        <div style="margin: 15px 0;">
                            <h4 style="color: #8B5CF6; font-size: 14px; font-weight: 600; margin-bottom: 5px;">●Conditions</h4>
                            <ul style="margin: 0; padding-left: 15px; font-size: 13px;">
                                <li>Durée d'existence : 10 ans et plus</li>
                                <li>Nombre minimum d'employées : 6 et plus</li>
                            </ul>
                        </div>

                        <div style="margin: 15px 0;">
                            <h4 style="color: #8B5CF6; font-size: 14px; font-weight: 600; margin-bottom: 5px;">●Critères valorisés</h4>
                            <ul style="margin: 0; padding-left: 15px; font-size: 13px;">
                                <li>La pérennité de l'entreprise sur plus d'une décennie</li>
                                <li>Un leadership reconnu dans le secteur</li>
                                <li>La création d'emplois et une contribution significative à l'économie</li>
                                <li>L'engagement avéré dans l'innovation, le développement durable ou le mentorat
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bouton candidature -->
        <div class="row">
            <div class="col-12 text-center">
                <a href="{{ route('impact-feminin.candidature') }}" class="impact-awards-btn">
                    Je candidate
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECTION 4.5 - NOMINEES IMPACT FÉMININ ===== -->
<section class="impact-nominees-section py-5">
    <div class="container">
        <!-- Titre de la section -->
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="nominees-main-title" data-aos="fade-up" data-aos-duration="1000">
                        Nominées Impact Féminin 2025
                    </h2>
                    <p class="nominees-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="300">
                        Découvrez les femmes entrepreneures exceptionnelles nominées cette année
                    </p>
                </div>
            </div>
        </div>

 <!-- Cartes des nominees -->
            <div class="row g-3 justify-content-center mb-5 nominees-grid nominees-cards-grid">
                <!-- LIGNE 1 -->
                <!-- Nominee 1 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MAITRE KACOU ANGELINA ANDRESS" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Maitre KACOU ANGELINA ANDRESS</h4>
                            <p class="nominee-title">Notaire</p>
                            <p class="nominee-company">Cabinet de Notariat</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 2 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MAITRE YAPO NINA ROSELINE" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Maitre YAPO NINA ROSELINE</h4>
                            <p class="nominee-title">Notaire</p>
                            <p class="nominee-company">Cabinet de Notariat</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 3 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MAITRE AMOIKON BEUGRE GLADYS" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Maitre AMOIKON BEUGRE GLADYS</h4>
                            <p class="nominee-title">Notaire</p>
                            <p class="nominee-company">Cabinet de Notariat</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 4 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MAITRE TOURE HAWA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Maitre TOURE HAWA</h4>
                            <p class="nominee-title">Notaire</p>
                            <p class="nominee-company">Cabinet de Notariat</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 5 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MAITRE KONE EPSE CAMARA HABIBATA" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Maitre KONE Epse CAMARA HABIBATA</h4>
                            <p class="nominee-title">Notaire</p>
                            <p class="nominee-company">Cabinet de Notariat</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 6 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MAITRE COULIBALY AWA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Maitre COULIBALY AWA</h4>
                            <p class="nominee-title">Notaire</p>
                            <p class="nominee-company">Cabinet de Notariat</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 2 -->
                <!-- Nominee 7 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MME OUATTARA MAMAN"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme OUATTARA MAMAN</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">ETD (BTP)</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 8 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="PEHE EPSE TAHOU"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">PEHE Epse TAHOU</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">EL SHADDAI CONSTRUCTION</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 9 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MADAME N'DOUFFOU MARIE-SYLVIE" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme N'DOUFFOU MARIE-SYLVIE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">LYS DE MARIE</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 10 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MADAME PATRICIA GUERRIER" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme PATRICIA GUERRIER</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">ISIS AGENCE DE GESTION</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 11 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MADAME VICTORINE KOUADIO" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme VICTORINE KOUADIO</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">KOVIBAT</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 12 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MME BAYO BINTOU"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme BAYO BINTOU</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">INTERLUXE FINANCE</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 3 - MASQUÉE INITIALEMENT -->
                <!-- Nominee 13 -->
                <div class="col-lg-2 col-md-4 col-6" data-line="3">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MME KANE STEPHANIE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme KANE STEPHANIE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">ANTILIA IMMOBILIER</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 14 -->
                <div class="col-lg-2 col-md-4 col-6" data-line="3">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MADAME YEO ELISABETH"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme YEO ELISABETH</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">CISLO</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 15 -->
                <div class="col-lg-2 col-md-4 col-6" data-line="3">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MADAME NINTIN YABA SYNTHIA" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme NINTIN YABA SYNTHIA</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">NYCE GROUP</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 16 -->
                <div class="col-lg-2 col-md-4 col-6" data-line="3">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MADAME ASSY EPSE POLA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme ASSY Epse POLA</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">POLA ASSY ARCHITECTE</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 17 -->
                <div class="col-lg-2 col-md-4 col-6" data-line="3">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MADAME HONORINE VEHI"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme HONORINE VEHI</h4>
                            <p class="nominee-title">PCA</p>
                            <p class="nominee-company">ONG GFM3</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 18 -->
                <div class="col-lg-2 col-md-4 col-6" data-line="3">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MADAME FLEAN ELODIE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme FLEAN ELODIE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">DIVANA</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 4 - MASQUE INITIALEMENT -->
                <!-- Nominee 19 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="MADAME TAGRO HONKPA JEANNE" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme TAGRO HONKPA JEANNE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">NADRE INSTITUT</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 20 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MADAME FATIM KOUYATE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme FATIM KOUYATE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">ONYX AGENCE DE VOYAGE</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 21 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MADAME SYLVIE FADIKA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme SYLVIE FADIKA</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">SMA BTP</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 22 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MADAME MARINA NEBOUT"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme MARINA NEBOUT</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">OHEL INTERNATIONAL</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 23 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="JEANNE SISSOKO ZEZE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">JEANNE SISSOKO ZEZE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">REFLET CONSULTING</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 24 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="DANIELLE LIDEGOUE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">DANIELLE LIDEGOUE</h4>
                            <p class="nominee-title">Fondatrice</p>
                            <p class="nominee-company">ONG BLOOM</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 5 - MASQUE INITIALEMENT -->
                <!-- Nominee 25 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Aissatou DIOP"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme KEITA KADY</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">VFC</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 26 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Mariame CISSE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme KONNIE TOURE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">KONNIEVENCE PRODUCTIONS</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 27 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Ramata SIDIBE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">AMINATA DOSSO Epse DIOMANDE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">CORAIL IMMOBILIER</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 28 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Fatouma SANGARE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme OLLO CAROLE Pouse AGNERO</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">KRENO CONSULTING</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 29 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Habibatou BARRY"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme DJOMAN ROSALIE DJETOU</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">ROSEBATE (BTP)</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 30 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Zeynab CONDE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Mme FATOUMATA KONE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">AGENCE FATY SERVICES</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 6 - MASQUE INITIALEMENT -->
                <!-- Nominee 31 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Aicha BALDE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">PATRICIA ZOUNDI YAO</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">QUICKCASH</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 32 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Adama KONE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">EDITH YAH BROU</h4>
                            <p class="nominee-title">Cofondatrice</p>
                            <p class="nominee-company">AYANA WEBZINE</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 33 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Aminata SOW"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">MARIE-ANGELE TOURE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">AGENCE MAT</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 34 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Salimata TRAORE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">FLORENCE DOUZOUA NANGA</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">CENTRE FLORENCE SANTE</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 35 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Coumba GUEYE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">CAROLYNE DASILVA</h4>
                            <p class="nominee-title">Promotrice</p>
                            <p class="nominee-company">DROLES DE FEMMES</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 36 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Maimouna NDIAYE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">MARIE PAULE ADJE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">MPA COSMETICS</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 7 - MASQUE INITIALEMENT -->
                <!-- Nominee 37 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Djénaba KABA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">ASSATA KONE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">QUEEN HOME CLINIC SPA</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 38 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="Maryam OUEDRAOGO"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">AKOUBA ANGOLA</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">DABALI XPRESS</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 39 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MARIAM SYLLA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">MARIAM SYLLA</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">LA PERGOLA SECTEUR RESTAURATION</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 40 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="PASCALE ELVIRE TANH"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">PASCALE ELVIRE TANH</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">TEP EVENTS SECTEUR COMMUNICATION</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 41 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="ANNICK KOFFI"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">ANNICK KOFFI</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">OPTIC BEL VUE</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 42 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="JOCELYNE AGNERO EPSE SILUE" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">JOCELYNE AGNERO EPSE SILUE</h4>
                            <p class="nominee-title">PCA</p>
                            <p class="nominee-company">FONDATION JOCELYNE SILUE</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 8 - MASQUE INITIALEMENT -->
                <!-- Nominee 43 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="YAO CHANTALE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">YAO CHANTALE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">YRISSA IMMOBILIER</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 44 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="KOUAME FLEUR YENI EPSE ABDOU" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">KOUAME FLEUR YENI EPSE ABDOU</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">A'FY IMMOBILIER</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 45 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="JULIE ESSE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">JULIE ESSE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">ROSCHESLI CRÉATION</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 46 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="N'GOM EHOUMAN INGRID RAISSA OULY" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">N'GOM EHOUMAN INGRID RAISSA OULY</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">CARRE PREMIUM SARL</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 47 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="TIMINI BINKO AMINATA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">TIMINI BINKO AMINATA</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">BINKO ET ASSOCIES</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 48 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="HAWA SAKHO"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">HAWA SAKHO</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">OKHAMARE</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 9 - MASQUE INITIALEMENT -->
                <!-- Nominee 49 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="DOUMBIA FANTA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">DOUMBIA FANTA</h4>
                            <p class="nominee-title">PRESIDENTE</p>
                            <p class="nominee-company">ONG OFACI</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 50 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MAIMOUNA SISSOKO"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">MAIMOUNA SISSOKO</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">TULIPE FOOD</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 51 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="LUCIE GBAKAYORO"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">LUCIE GBAKAYORO</h4>
                            <p class="nominee-title">PRESIDENTE</p>
                            <p class="nominee-company">PLATEFORME FEMMES SECTEUR VIVRIER</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 52 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="OUHONOHI JEANETTE EPSE KIPRE" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">OUHONOHI JEANETTE EPSE KIPRE</h4>
                            <p class="nominee-title">PCA</p>
                            <p class="nominee-company">COOPERATIVE DJOLO</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 53 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="ARAMATOU COULIBALY"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">ARAMATOU COULIBALY</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">RAMA CEREAL</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 54 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="KOUADIO B CLAUDINE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">KOUADIO B CLAUDINE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">NEDJE COUTURE</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 10 - MASQUE INITIALEMENT -->
                <!-- Nominee 55 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="AIZAN FLORENCE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">AIZAN FLORENCE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">AGF ENTREPRISES</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 56 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="EDWIGE G HAMMOND"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">EDWIGE G HAMMOND</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">FARM INVEST</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 57 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="OLLIBO ALICE YAGBA"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">OLLIBO ALICE YAGBA</h4>
                            <p class="nominee-title">PCA</p>
                            <p class="nominee-company">SOCOMAP</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 58 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="ADEBISI ESSIKAN FATOUMATA" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">ADEBISI ESSIKAN FATOUMATA</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">MAISON DU DECORATEUR</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 59 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="MOULARE CELINE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">MOULARE CELINE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">CALINE KARITESTHETIC</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 60 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="OUATTARA EDMONDE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">OUATTARA EDMONDE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">SCOOPS OWEDJO</p>
                        </div>
                    </div>
                </div>

                <!-- LIGNE 11 - MASQUE INITIALEMENT -->
                <!-- Nominee 61 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="LAWSON KOHOUE HUGUETTE"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">LAWSON KOHOUE HUGUETTE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">SAGES-CI</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 62 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}"
                                alt="BLA PAULINE EPOUSE MINHOUE" class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">BLA PAULINE EPOUSE MINHOUE</h4>
                            <p class="nominee-title">DG</p>
                            <p class="nominee-company">IRIMONTO</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 63 -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/nominee.png') }}" alt="DAGRY YACE MANDY"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">DAGRY YACE MANDY</h4>
                            <p class="nominee-title">PDG</p>
                            <p class="nominee-company">GROUPE BATIDECOR</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 64: Véronique Vonan -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/vero.png') }}" alt="Véronique Vonan"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Véronique Vonan</h4>
                            <p class="nominee-title">Fondatrice du Placali abouré</p>
                            <p class="nominee-company">&nbsp;</p>
                        </div>
                    </div>
                </div>

                <!-- Nominee 65: Fatim Cissé -->
                <div class="col-lg-2 col-md-4 col-6">
                    <div class="nominee-card">
                        <div class="nominee-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/fatim.png') }}" alt="Fatim Cissé"
                                class="nominee-image">
                        </div>
                        <div class="nominee-info">
                            <h4 class="nominee-name">Fatim Cissé</h4>
                            <p class="nominee-title">DG DUX Côte d’Ivoire et d’IHS Towers CI</p>
                            <p class="nominee-company">&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>

<!-- ===== SECTION - PRIVILÈGES RÉSERVÉS AUX LAURÉATES ===== -->
<section class="impact-privileges-section py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2 class="impact-section-title" data-aos="fade-up" data-aos-duration="1000">Les privilèges réservés aux lauréates</h2>
            </div>
        </div>
        <div class="row g-4 justify-content-center privileges-cards-grid">
            <!-- Privilege 1 -->
            <div class="col-lg-4 col-md-6">
                <div class="impact-award-card h-100">
                    <div class="award-header">
                        <h3 class="award-title"><i class="fas fa-trophy"></i> Trophée Impact Féminin – Partenaires de Dubaï</h3>
                    </div>
                    <div class="award-content">
                        <p class="award-description">Un trophée de prestige, symbole d'innovation, de résilience et de leadership, offert en collaboration avec nos partenaires stratégiques basés à Dubaï.</p>
                    </div>
                </div>
            </div>
            <!-- Privilege 2 -->
            <div class="col-lg-4 col-md-6">
                <div class="impact-award-card h-100">
                    <div class="award-header">
                        <h3 class="award-title"><i class="fas fa-newspaper"></i> Article exclusif dans le magazine Excellence AFRIK</h3>
                    </div>
                    <div class="award-content">
                        <p class="award-description">Un portrait détaillé retraçant le parcours, les réussites et la vision de la lauréate, publié dans le magazine numérique Excellence AFRIK, distribué sur l'ensemble du continent et auprès de la diaspora.</p>
                    </div>
                </div>
            </div>
            <!-- Privilege 3 -->
            <div class="col-lg-4 col-md-6">
                <div class="impact-award-card h-100">
                    <div class="award-header">
                        <h3 class="award-title"><i class="fas fa-video"></i> Interview premium sur la Web TV Excellence AFRIK</h3>
                    </div>
                    <div class="award-content">
                        <p class="award-description">Une interview dédiée diffusée sur notre plateforme Web TV, offrant une visibilité régionale et internationale auprès d'un public d'influence et d'investisseurs.</p>
                    </div>
                </div>
            </div>
            <!-- Privilege 4 -->
            <div class="col-lg-4 col-md-6">
                <div class="impact-award-card h-100">
                    <div class="award-header">
                        <h3 class="award-title"><i class="fas fa-film"></i> Film institutionnel de l'entreprise</h3>
                    </div>
                    <div class="award-content">
                        <p class="award-description">La production professionnelle d'un film institutionnel pour valoriser la marque, les produits ou les projets de la lauréate, facilitant le storytelling auprès de futurs partenaires et investisseurs.</p>
                    </div>
                </div>
            </div>
            <!-- Privilege 5 -->
            <div class="col-lg-4 col-md-6">
                <div class="impact-award-card h-100">
                    <div class="award-header">
                        <h3 class="award-title"><i class="fas fa-bullhorn"></i> Plan de communication offert sur l'année 2026</h3>
                    </div>
                    <div class="award-content">
                        <p class="award-description">Une campagne de communication sur mesure dans le magazine Excellence AFRIK, incluant :</p>
                        <ul class="criteria-list">
                            <li>Des insertions publicitaires ciblées,</li>
                            <li>Des articles sponsorisés,</li>
                            <li>Une promotion digitale multi-plateformes pour maximiser la notoriété et l'impact.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECTION TÉLÉCHARGER LE PROGRAMME ===== -->
<section class="impact-download-section py-5" style="background: white;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 text-center text-lg-start">
                <img src="{{ asset('assets/images/impact-feminin/image2.jpg') }}" alt="Programme Impact Féminin"
                    class="img-fluid"
                    style="max-width: 300px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
            </div>
            <div class="col-lg-6">
                <div class="download-content text-center text-lg-start">
                    <h2 class="download-title"
                        style="color: var(--impact-primary); font-weight: 700; font-size: 2.5rem;">
                        Téléchargez le Programme</h2>
                    <p class="download-subtitle" style="color: #666; font-size: 1.2rem; margin-bottom: 30px;">
                        Découvrez le programme complet de la soirée Impact Féminin 2025</p>
                    <a href="{{ asset('assets/pdf/Impact_Feminin_2025_Programme.pdf') }}" class="btn-download"
                        style="background: var(--impact-button); color: white; padding: 15px 35px; border-radius: 50px; font-weight: 600; text-decoration: none; display: inline-flex; align-items: center; transition: all 0.3s ease;">
                        <i class="fas fa-download me-2"></i>
                        Télécharger le Programme
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

 <!-- ===== SECTION 7 - INTERVENANTS & PANÉLISTES ===== -->
    <section class="impact-speakers-section py-5">
        <div class="container">
            <!-- Titre de la section -->
            <div class="row">
                <div class="col-12">
                    <div class="text-center mb-5">
                        <h2 class="speakers-main-title" data-aos="fade-up" data-aos-duration="1000">
                            Intervenants & Panélistes
                        </h2>
                    </div>
                </div>
            </div>

            <!-- Cartes des intervenants -->
            <div class="row g-4 justify-content-center mb-5" style="row-gap: 3rem !important;">



                <!-- Modérateur : ALI Diarassouba -->
                <div class="col-lg-3 col-md-6">
                    <div class="speaker-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="speaker-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/ali.png') }}" alt="ALI Diarassouba"
                                class="speaker-image">
                        </div>
                        <div class="speaker-info">
                            <h4 class="speaker-name">ALI Diarassouba</h4>
                            <p class="speaker-title">Modérateur</p>
                            <p class="speaker-company">Journaliste / Directeur de l’information NCI</p>
                        </div>
                    </div>
                </div>

                <!-- Modératrice : Marième TOURÉ -->
                <div class="col-lg-3 col-md-6">
                    <div class="speaker-card" data-aos="fade-up" data-aos-delay="150">
                        <div class="speaker-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/marieme.png') }}" alt="Marième TOURÉ"
                                class="speaker-image">
                        </div>
                        <div class="speaker-info">
                            <h4 class="speaker-name">Marième TOURÉ</h4>
                            <p class="speaker-title">Modératrice</p>
                            <p class="speaker-company">Journaliste / Animatrice RTI</p>
                        </div>
                    </div>
                </div>

                <!-- Panéliste : Dr. Anuraag Guglaani -->
                <div class="col-lg-3 col-md-6">
                    <div class="speaker-card" data-aos="fade-up" data-aos-delay="250">
                        <div class="speaker-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/anuraag.png') }}"
                                alt="Dr. Anuraag Guglaani" class="speaker-image">
                        </div>
                        <div class="speaker-info">
                            <h4 class="speaker-name">Dr. Anuraag Guglaani</h4>
                            <p class="speaker-title">Board Member</p>
                            <p class="speaker-company">Family business groups investisseur</p>
                        </div>
                    </div>
                </div>

                <!-- Panéliste : Augustin Dago SERIKPA -->
                <div class="col-lg-3 col-md-6">
                    <div class="speaker-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="speaker-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/augustin.png') }}" alt="Augustin Dago SERIKPA"
                                class="speaker-image">
                        </div>
                        <div class="speaker-info">
                            <h4 class="speaker-name">Augustin Dago SERIKPA</h4>
                            <p class="speaker-title">Vice President FIPME</p>
                            <p class="speaker-company">&nbsp;</p>
                        </div>
                    </div>
                </div>

                <!-- Panéliste : Agnès KRAIDY -->
                <div class="col-lg-3 col-md-6">
                    <div class="speaker-card" data-aos="fade-up" data-aos-delay="350">
                        <div class="speaker-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/krady.png') }}" alt="Agnès KRAIDY"
                                class="speaker-image">
                        </div>
                        <div class="speaker-info">
                            <h4 class="speaker-name">Agnès KRAIDY</h4>
                            <p class="speaker-title">Presidente AIP et REFJPCI</p>
                            <p class="speaker-company">Ex rédactrice en chef du magazine Femme d'Afrique et Frat Mat</p>
                        </div>
                    </div>
                </div>

                <!-- Panéliste : Euphrasie Kouassi Yao -->
                <div class="col-lg-3 col-md-6">
                    <div class="speaker-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="speaker-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/kouassi.png') }}" alt="Euphrasie Kouassi Yao"
                                class="speaker-image">
                        </div>
                        <div class="speaker-info">
                            <h4 class="speaker-name">Euphrasie Kouassi Yao</h4>
                            <p class="speaker-title">Conseillère spéciale du président et du premier ministre chargée du
                                genre</p>
                            <p class="speaker-company">&nbsp;</p>
                        </div>
                    </div>
                </div>

                <!-- Panéliste : Patricia Zoundi Yao -->
                <div class="col-lg-3 col-md-6">
                    <div class="speaker-card" data-aos="fade-up" data-aos-delay="450">
                        <div class="speaker-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/patricia.png') }}" alt="Patricia Zoundi Yao"
                                class="speaker-image">
                        </div>
                        <div class="speaker-info">
                            <h4 class="speaker-name">Patricia Zoundi Yao</h4>
                            <p class="speaker-title">fondatrice de Quickcash (fintech) et Canaan Land (agribusiness)</p>
                            <p class="speaker-company">&nbsp;</p>
                        </div>
                    </div>
                </div>

                <!-- Panéliste : Bénédicte Janine Kacou Diagou -->
                <div class="col-lg-3 col-md-6">
                    <div class="speaker-card" data-aos="fade-up" data-aos-delay="500">
                        <div class="speaker-image-container">
                            <img src="{{ asset('assets/images/impact-feminin/benedicte.png') }}"
                                alt="Bénédicte Janine Kacou Diagou" class="speaker-image">
                        </div>
                        <div class="speaker-info">
                            <h4 class="speaker-name">Bénédicte Janine Kacou Diagou</h4>
                            <p class="speaker-title">PCA NSA GROUP</p>
                            <p class="speaker-company">&nbsp;</p>
                        </div>
                    </div>
                </div>


                
            </div>
        <!-- Bouton de réservation -->
        <div class="row">
            <div class="col-12">
                <div class="text-center">
                    <a href="{{ route('impact-feminin.reservation') }}" class="impact-speakers-btn" data-aos="fade-up"
                        data-aos-delay="500">
                        Réserver ma place
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ===== SECTION 8 - ENTREPRISES NOMINEES ===== -->
<section class="impact-partners-section py-5">
    <div class="container">
        <!-- Titre de la section -->
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-5">
                    <h2 class="partners-main-title" data-aos="fade-up" data-aos-duration="1000">
                        Entreprises Nominées
                    </h2>
                </div>
            </div>
        </div>

        <!-- Logos des entreprises nominees -->
         <div class="companies-logos-grid row justify-content-center">
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/afy.png') }}"
                                alt="A'FY Immobilier" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">A'FY Immobilier</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/agf.png') }}"
                                alt="AGF Entreprises" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">AGF Entreprises</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/antilia.png') }}"
                                alt="Antilia Immobilier" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Antilia Immobilier</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/ayana.png') }}"
                                alt="Ayana Webzine" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Ayana Webzine</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/batidecor.png') }}"
                                alt="Groupe Batidecor" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Groupe Batidecor</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/binko.png') }}"
                                alt="Binko et Associés" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Binko et Associés</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/caline.png') }}"
                                alt="Caaaline Karitesthetic" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Caaaline Karitesthetic</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/carre.png') }}"
                                alt="Carré Premium SARL" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Carré Premium SARL</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/cislo.png') }}" alt="CISLO"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">CISLO</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/corail.png') }}"
                                alt="Corail Immobilier" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Corail Immobilier</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/dbalixpress.png') }}"
                                alt="Dabali Xpress" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Dabali Xpress</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/divina.png') }}" alt="Divana"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Divana</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/djolo.png') }}"
                                alt="Coopérative Djolo" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Coopérative Djolo</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/etd.png') }}" alt="ETD"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">ETD</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/farm.png') }}"
                                alt="Farm Invest" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Farm Invest</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/faty.png') }}"
                                alt="Agence Faty Services" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Agence Faty Services</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/florence.png') }}"
                                alt="Centre Florence" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Centre Florence</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/gfm3.png') }}" alt="ONG GFM3"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">ONG GFM3</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/isis.png') }}"
                                alt="ISIS Agence" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">ISIS Agence</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/konnievenence.png') }}"
                                alt="Konnievence Productions" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Konnievence Productions</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/kovibat.png') }}" alt="Kovibat"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Kovibat</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/kreno.png') }}"
                                alt="Kreno Consulting" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Kreno Consulting</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/lys.png') }}"
                                alt="Lys de Marie" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Lys de Marie</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/maisondeco.png') }}"
                                alt="Maison du Décorateur" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Maison du Décorateur</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/mat.png') }}" alt="Agence MAT"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Agence MAT</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/mpa.png') }}"
                                alt="MPA Cosmetics" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">MPA Cosmetics</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/nadre.png') }}"
                                alt="Nadre Institut" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Nadre Institut</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/nedje.png') }}"
                                alt="Nedje Couture" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Nedje Couture</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/nycegroupe.png') }}"
                                alt="NYCE Groupe" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">NYCE Groupe</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/ofaci.png') }}" alt="ONG OFACI"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">ONG OFACI</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/ohel.png') }}"
                                alt="Ohel International" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Ohel International</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/okhamare.png') }}"
                                alt="Okhamar" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Okhamar</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/ongbloom.png') }}"
                                alt="ONG Bloom" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">ONG Bloom</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/onyx.png') }}"
                                alt="Onyx Agence" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Onyx Agence</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/opticbelvue.png') }}"
                                alt="Optic Bel Vue" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Optic Bel Vue</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/pfsvci.png') }}" alt="PFSVCI"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">PFSVCI</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/quickcash.png') }}"
                                alt="QuickCash" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">QuickCash</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/rama.png') }}"
                                alt="Rama Cereal" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Rama Cereal</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/reflet.png') }}"
                                alt="Reflet Consulting" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Reflet Consulting</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/rosebate.png') }}"
                                alt="Rosebate" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Rosebate</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/roseline.png') }}"
                                alt="Roschesli Création" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Roschesli Création</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/sage.png') }}" alt="SAGES-CI"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">SAGES-CI</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/shadai.png') }}"
                                alt="El Shaddai Construction" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">El Shaddai Construction</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/sma.png') }}" alt="SMA BTP"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">SMA BTP</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/socomap.png') }}" alt="SOCOMAP"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">SOCOMAP</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/tepevent.png') }}"
                                alt="TEP Events" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">TEP Events</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/tulipe.png') }}"
                                alt="Tulipe Food" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Tulipe Food</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/vfc.png') }}" alt="VFC"
                                class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">VFC</span></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6 mb-4">
                    <div class="company-logo-card">
                        <div class="logo-container">
                            <img src="{{ asset('assets/images/impact-feminin/logos/yrissa.png') }}"
                                alt="Yrissa Immobilier" class="company-logo-img" loading="lazy">
                            <div class="logo-overlay"><span class="company-name">Yrissa Immobilier</span></div>
                        </div>
                    </div>
                </div>

                
            </div>
</section>

@endsection

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true
    });
</script>
@endpush
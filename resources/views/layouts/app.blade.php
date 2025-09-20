@php
try {
    $navCategories = \App\Models\Category::where('status', 'active')
        ->where('is_active', 1)
        ->orderBy('name')
        ->get();

    // Parents for "ÉCONOMIE RÉELLE"
    $economyParentSlugs = [
        'grands-genres',
        'entreprises-impacts',
        'contributions-analyses',
    ];
    $economyParents = \App\Models\Category::whereIn('slug', $economyParentSlugs)
        ->where('status', 'active')
        ->where('is_active', 1)
        ->get();

    // Parents for "PORTRAITS"
    $portraitsParentSlugs = [
        'figures-de-leconomie',
        'portrait-de-l-entreprise',
        'portrait-de-l-entrepreneur',
    ];
    $portraitsParents = \App\Models\Category::whereIn('slug', $portraitsParentSlugs)
        ->where('status', 'active')
        ->where('is_active', 1)
        ->get();


    // Parents for "ANALYSES & EXPERTS"
    $expertsParentSlugs = [
        'parole-d-experts',
    ];
    $expertsParents = \App\Models\Category::whereIn('slug', $expertsParentSlugs)
        ->where('status', 'active')
        ->where('is_active', 1)
        ->get();

    // Parents for "DIASPORA"
    $diasporaParentSlugs = [
        'start-up-de-la-diaspora',
        'startup-de-la-diaspora', // Ajout d'une variation pour plus de robustesse
        'opportunites',
    ];
    $diasporaParents = \App\Models\Category::whereIn('slug', $diasporaParentSlugs)
        ->where('status', 'active')
        ->where('is_active', 1)
        ->get();

} catch (\Throwable $e) {
    $navCategories = collect();
    $economyParents = collect();
    $portraitsParents = collect();
    $expertsParents = collect();
    $diasporaParents = collect();
}
@endphp
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ACCUEIL - EXCELLENCE AFRIK</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="manifest" href="{{ asset('styles/site.webmanifest') }}">
    <link rel="shortcut icon" type="image/png" href="{{ asset('styles/img/logo/logo.png') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('styles/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('styles/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/meanmenu.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/style.css') }}">
    <style>
        main {
            background: linear-gradient(to right, #996633, #f7c807);
        }

        /* Titres du footer en jaune-or comme WebTV */
        .footer-widget h3 {
            color: #f4c700 !important;
            font-weight: 700;
            text-transform: uppercase;
        }

        /* Styles pour les réseaux sociaux - assurer la visibilité de WhatsApp */
        .header__social a,
        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .header__social a i,
        .footer-social a i {
            font-size: 18px;
            color: #333;
        }

        .footer-social a i {
            color: #ccc;
        }

        /* Header social - icônes en blanc avec espacement réduit */
        .header__social a {
            margin-left: 5px;
        }

        .header__social a i {
            color: white !important;
        }

        /* Styles spécifiques pour WhatsApp dans le footer - fond vert permanent */
        .footer-social a.whatsapp {
            background-color: #25D366 !important;
        }

        .footer-social a.whatsapp i {
            color: white !important;
        }

        /* WhatsApp dans le header - même style blanc que les autres */
        .header__social a i.fa-whatsapp {
            color: white !important;
        }

        /* Effet de survol pour WhatsApp footer - fond plus foncé */
        .footer-social a.whatsapp:hover {
            background-color: #128C7E !important;
        }

        /* Effet de survol pour WhatsApp header - vert au survol */
        .header__social a:hover i.fa-whatsapp {
            color: #25D366 !important;
        }
    </style>
    @stack('styles')
</head>

<body>


    <!-- ============================================================== -->
    <!-- DEBUT DE L'EN-TETE -->
    <!-- ============================================================== -->
    <header class="header">
        <!-- Barre Supérieure (Contacts & Réseaux Sociaux) -->
        <div class="header__top-area grey-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="header__top-menu top-menu-black">
                            <ul>
                                <li>
                                    <a href="{{ route('pages.presentation') }}">Qui sommes-nous ? </a>
                                </li>
                                <li>
                                    <a href="{{ route('pages.editorial') }}">Ligne éditorial</a>
                                </li>

                                <li>
                                    <a href="{{ route('pages.contact') }}">Nous contacter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="header__social header-social-black text-center text-md-right mt-10">
                            <a href="https://web.facebook.com/excellenceafrik" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://x.com/AcdNotif54528" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/company/108564982/" target="_blank">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://www.instagram.com/excellenceafrik/" target="_blank">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://whatsapp.com/channel/0029Vb6I52Z1t90aVemzTe2S" target="_blank">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Milieu (Logo & Publicité) -->
        <div class="header__middle pt-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-3 d-flex align-items-center justify-content-md-start justify-content-center">
                        <div class="header__logo text-center text-md-left mb-20">
                            <a href="{{ route('home') }}">
                                <img src="{{ asset('styles/img/logo/logo.png') }}" alt="Header Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-9">
                        <div class="header__add text-center text-md-right mb-20">
                            @if(isset($bannerTop) && $bannerTop)
                                <a href="{{ $bannerTop->getTrackableUrl() }}" target="_blank" rel="noopener">
                                    <img src="{{ asset('storage/app/public/' . $bannerTop->image) }}"
                                         alt="{{ $bannerTop->title }}"
                                         style="max-width: 785px; height: 193px; width: auto; object-fit: contain;"
                                         data-ad-id="{{ $bannerTop->id }}"
                                         class="advertisement-banner">
                                </a>
                            @else
                                <a href="#">
                                    <img src="{{ asset('styles/img/add/header-add.jpg') }}" alt="">
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu de Navigation Principal -->
        <div class="header__menu-area grey-bg">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="header__right-icon header__icon-black f-right mt-17">
                            <a href="#" data-toggle="modal" data-target="#search-modal">
                                <i class="fas fa-search" style="color: #fff;"></i>
                            </a>
                            <a class="info-bar" href="javascript:void(0)">
                                <i class="fas fa-bars"></i>
                            </a>
                        </div>
                        <div class="header__menu header__menu-black f-left">
                            <nav id="mobile-menu">
                                <ul>
                                    <li class="{{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}">ACCUEIL</a></li>

                                    <li><a href="#">ECONOMIE RÉELLE</a>
                                        <ul class="submenu">
                                            @foreach($economyParents as $parent)
                                                <li><a href="{{ route('articles.category', $parent->slug) }}">{{ $parent->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li><a href="#">PORTRAITS</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('articles.category', 'figures-de-leconomie') }}">Figures de l'economie</a></li>
                                            <li><a href="{{ route('articles.category', 'portrait-de-l-entreprise') }}">Portrait de l'entreprise</a></li>
                                            <li><a href="{{ route('articles.category', 'portrait-de-l-entrepreneur') }}">Portrait de l'entrepreneur</a></li>
                                        </ul>
                                    </li>

                                    <li><a href="#">ANALYSES & EXPERTS</a>
                                        <ul class="submenu">
                                            <li><a href="{{ route('articles.category', 'parole-d-experts') }}">Parole d'experts</a></li>
                                        </ul>
                                    </li>

                                    <li class="has-dropdown">
                <a href="#">DIASPORA</a>
                <ul class="submenu">
                    <li><a href="{{ route('articles.category', 'startups-diaspora') }}">Start Ups de la Diaspora</a></li>
                    <li><a href="{{ route('articles.category', 'opportunites') }}">Opportunités</a></li>
                </ul>
            </li>

                                    <li><a href="{{ route('magazines.index') }}">MAGAZINE</a></li>
                                     <li><a href="{{ route('pages.awards') }}">PRIX</a></li>
                                    <li class="webtv-menu-item"><a href="{{ route('webtv.index') }}"><i class="fas fa-tv"></i> WEBTV <span class="live-indicator">Live</span></a></li>

                                </ul>
                            </nav>
                        </div>
                        <div class="mobile-menu black-icon"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Fenêtre Modale de Recherche -->
        <div class="modal fade" id="search-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form>
                        <input type="text" placeholder="Rechercher un article...">
                        <button>
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer-bg">
        <!-- Section d'Abonnement à la Newsletter -->
        <div class="subscribe-area pt-100 pb-80">
            <div class="container">
                <div class="subscribe-separator pt-50 pb-20">
                    <div class="row">
                        <div class="col-xl-2 col-lg-12">
                            <div class="footer-logo mb-30">
                                <a href="#"><img src="{{ asset('styles/img/logo/footer-logo.png') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-12">
                            <div class="row">
                                <div class="col-xl-7 col-lg-7">
                                    <div class="subscribe-title">
                                        <h2>Restez informé </h2>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5">
                                    <div class="subscribe-form mb-30">
                                        <form action="{{ route('newsletter.subscribe') }}" method="POST" id="footerNewsletterForm">
                                            @csrf
                                            <input type="hidden" name="source" value="footer">
                                            <div class="form-group-inline">
                                                <input type="email" name="email" placeholder="Entrez votre adresse E-mail" required>
                                                <button type="submit">
                                                    <span class="btn-text">Abonnez-vous</span>
                                                    <span class="btn-loading" style="display: none;">
                                                        <i class="fas fa-spinner fa-spin"></i>
                                                    </span>
                                                </button>
                                            </div>
                                        </form>
                                        <div id="newsletterMessage" class="newsletter-message" style="display: none;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section des Widgets du Pied de Page (Liens, etc.) -->
        <div class="footer-bottom-area pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="footer-widget mb-30">
                            <p>Fondé en 2021 mais obtient les accréditations légale 2025, Excellence AFRIK se positionne
                                comme le premier magazine panafricain entièrement consacré aux entreprises non cotées, en
                                particulier les TPE, PME et startups opérant sur le terrain, souvent sans visibilité, mais avec
                                un fort impact économique et social.</p>
                            <div class="footer-social">
                                <a href="https://web.facebook.com/excellenceafrik" target="_blank" class="facebook">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://x.com/AcdNotif54528" target="_blank" class="twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/108564982/" target="_blank" class="dribbble">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="https://www.instagram.com/excellenceafrik/" target="_blank" class="instagram">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://whatsapp.com/channel/0029Vb6I52Z1t90aVemzTe2S" target="_blank" class="whatsapp">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="widget-box mb-30">
                            <div class="row">
                                <div class="col-xl-3 col-lg-3">
                                    <div class="footer-widget mb-30">
                                        <h3>ACTUALITÉS</h3>
                                        <ul>
                                            @foreach($navCategories->take(9) as $category)
                                                <li><a href="{{ route('articles.category', $category->slug) }}">{{ $category->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="footer-widget mb-30">
                                        <h3>SERVICES</h3>
                                        <ul>
                                            <li><a href="{{ route('pages.contact') }}">Publicité</a></li>
                                            <li><a href="{{ route('pages.contact') }}">Abonnement</a></li>
                                            <li><a href="{{ route('pages.contact') }}">Partenariat</a></li>
                                            <li><a href="{{ route('pages.contact') }}">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="footer-widget mb-30">
                                        <h3>QUI SOMMES-NOUS</h3>
                                        <ul>
                                            <li><a href="{{ route('pages.presentation') }}">A propos</a></li>
                                            <li><a href="{{ route('pages.equipe') }}">Equipe</a></li>
                                            <li><a href="{{ route('pages.legal') }}">Mentions légales</a></li>
                                            <li><a href="{{ route('pages.terms') }}">Conditions d'utilisation</a></li>
                                            <li><a href="{{ route('pages.privacy') }}">Politique de confidentialité</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3">
                                    <div class="footer-widget pt-50 mb-30">
                                        <ul>
                                            <li><a href="{{ route('webtv.index') }}" class="webtv-link"><i class="fas fa-video"></i> WEBTV</a></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Section Copyright -->
        <div class="copyright-area pt-25 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright text-center">
                            <p>© Copyrights 2025. Excellence AFRIK. Tous droits réservés.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ============================================================== -->
    <!-- FIN DU PIED DE PAGE -->
    <!-- ============================================================== -->

    <!-- JS here -->
    <script src="{{ asset('styles/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <script src="{{ asset('styles/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('styles/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('styles/js/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('styles/js/one-page-nav-min.js') }}"></script>
    <script src="{{ asset('styles/js/slick.min.js') }}"></script>
    <script src="{{ asset('styles/js/jquery.meanmenu.min.js') }}"></script>
    <script src="{{ asset('styles/js/ajax-form.js') }}"></script>
    <script src="{{ asset('styles/js/wow.min.js') }}"></script>
    <script src="{{ asset('styles/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('styles/js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('styles/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('styles/js/plugins.js') }}"></script>
    <script src="{{ asset('styles/js/main.js') }}"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Newsletter Footer Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('footerNewsletterForm');
        const messageDiv = document.getElementById('newsletterMessage');
        const btnText = form.querySelector('.btn-text');
        const btnLoading = form.querySelector('.btn-loading');

        if (form) {
            form.addEventListener('submit', function(e) {
                e.preventDefault();

                // Show loading state
                btnText.style.display = 'none';
                btnLoading.style.display = 'inline';
                messageDiv.style.display = 'none';

                const formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Reset loading state
                    btnText.style.display = 'inline';
                    btnLoading.style.display = 'none';

                    // Show popup based on response type
                    if (data.success) {
                        let icon = 'success';
                        let title = 'Inscription réussie !';

                        if (data.type === 'premium_subscribed') {
                            icon = 'success';
                            title = 'Abonnement Premium activé !';
                        } else if (data.type === 'reactivated') {
                            icon = 'info';
                            title = 'Abonnement réactivé !';
                        }

                        Swal.fire({
                            icon: icon,
                            title: title,
                            text: data.message,
                            confirmButtonText: 'Parfait !',
                            confirmButtonColor: '#F2CB05',
                            timer: 6000,
                            timerProgressBar: true,
                            showClass: {
                                popup: 'animate__animated animate__fadeInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__fadeOutUp'
                            }
                        });

                        form.reset();
                    } else {
                        let icon = 'warning';
                        let title = 'Information';

                        if (data.type === 'already_subscribed') {
                            icon = 'info';
                            title = 'Déjà abonné(e)';
                        } else if (data.type === 'server_error') {
                            icon = 'error';
                            title = 'Erreur technique';
                        }

                        Swal.fire({
                            icon: icon,
                            title: title,
                            text: data.message,
                            confirmButtonText: 'Compris',
                            confirmButtonColor: '#6c757d',
                            timer: 5000,
                            timerProgressBar: true
                        });
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    btnText.style.display = 'inline';
                    btnLoading.style.display = 'none';

                    Swal.fire({
                        icon: 'error',
                        title: 'Erreur de connexion',
                        text: 'Une erreur est survenue. Vérifiez votre connexion internet et réessayez.',
                        confirmButtonText: 'Réessayer',
                        confirmButtonColor: '#dc3545'
                    });
                });
            });
        }
    });
    </script>

    <style>
    .form-group-inline {
        display: flex;
        align-items: center;
        gap: 0;
    }

    .form-group-inline input[type="email"] {
        flex: 1;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-right: none;
    }

    .form-group-inline button {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        white-space: nowrap;
    }

    .newsletter-message {
        margin-top: 15px;
        padding: 12px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        text-align: center;
    }

    .newsletter-message.success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .newsletter-message.error {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .btn-loading {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
    </style>

    <!-- Particles.js Scripts for Animated Banner -->
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        if (document.getElementById('particles-js')) {
            particlesJS("particles-js", {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#ffffff"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": false,
                        "anim": {
                            "enable": false,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": false,
                            "speed": 40,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#ffffff",
                        "opacity": 0.4,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 2,
                        "direction": "none",
                        "random": false,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "repulse"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "repulse": {
                            "distance": 100,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        }
                    }
                },
                "retina_detect": true
            });
        }
    </script>

    <!-- Advertisement Impression Tracking -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fonction pour envoyer l'impression
            function trackImpression(adId) {
                fetch(`/ad/impression/${adId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                })
                .then(response => response.json())
                .then(data => {
                    console.log('Impression trackée:', data);
                })
                .catch(error => {
                    console.error('Erreur tracking impression:', error);
                });
            }

            // Tracker les impressions des publicités visibles
            const adBanners = document.querySelectorAll('.advertisement-banner');
            adBanners.forEach(banner => {
                const adId = banner.getAttribute('data-ad-id');
                if (adId) {
                    // Observer pour détecter quand la publicité devient visible
                    const observer = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                trackImpression(adId);
                                observer.unobserve(entry.target); // Ne tracker qu'une seule fois par session
                            }
                        });
                    }, { threshold: 0.5 }); // Se déclenche quand 50% de la pub est visible

                    observer.observe(banner);
                }
            });
        });
    </script>

    @stack('scripts')

    <!-- WhatsApp Sticky Button -->
    <div id="whatsapp-sticky" class="whatsapp-sticky">
        <a href="https://www.whatsapp.com/channel/0029Vb6I52Z1t90aVemzTe2S" target="_blank" rel="noopener noreferrer" title="Rejoindre notre canal WhatsApp">
            <i class="fab fa-whatsapp"></i>
            <span class="whatsapp-text">Rejoindre le canal</span>
        </a>
    </div>

    <style>
        .whatsapp-sticky {
            position: fixed;
            bottom: 30px;
            left: 30px;
            z-index: 9999;
            animation: whatsappPulse 2s infinite;
        }

        .whatsapp-sticky a {
            display: flex;
            align-items: center;
            gap: 10px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            color: white;
            padding: 15px 20px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
            transition: all 0.3s ease;
            font-weight: 600;
            font-size: 16px;
        }

        .whatsapp-sticky a:hover {
            background: linear-gradient(135deg, #20BA5A, #0F7A6B);
            color: white;
            text-decoration: none;
            transform: translateY(-3px);
            box-shadow: 0 6px 25px rgba(37, 211, 102, 0.4);
        }

        .whatsapp-sticky i {
            font-size: 24px;
            min-width: 24px;
        }

        .whatsapp-text {
            white-space: nowrap;
        }

        @keyframes whatsappPulse {
            0% {
                transform: scale(1);
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
            }
            50% {
                transform: scale(1.05);
                box-shadow: 0 6px 25px rgba(37, 211, 102, 0.5);
            }
            100% {
                transform: scale(1);
                box-shadow: 0 4px 20px rgba(37, 211, 102, 0.3);
            }
        }

        /* Animation de clignotement supplémentaire */
        .whatsapp-sticky::before {
            content: '';
            position: absolute;
            top: -5px;
            left: -5px;
            right: -5px;
            bottom: -5px;
            background: linear-gradient(135deg, #25D366, #128C7E);
            border-radius: 50px;
            z-index: -1;
            animation: whatsappGlow 3s infinite;
            opacity: 0;
        }

        @keyframes whatsappGlow {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            50% {
                opacity: 0.6;
                transform: scale(1.1);
            }
            100% {
                opacity: 0;
                transform: scale(1.2);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .whatsapp-sticky {
                bottom: 20px;
                left: 20px;
            }

            .whatsapp-sticky a {
                padding: 12px 16px;
                font-size: 14px;
            }

            .whatsapp-text {
                display: none;
            }

            .whatsapp-sticky a {
                border-radius: 50%;
                width: 60px;
                height: 60px;
                justify-content: center;
                padding: 0;
            }

            .whatsapp-sticky i {
                font-size: 28px;
            }
        }

        /* Animation d'entrée */
        .whatsapp-sticky {
            animation: whatsappSlideIn 1s ease-out, whatsappPulse 2s infinite 1s;
        }

        @keyframes whatsappSlideIn {
            0% {
                transform: translateX(-100px);
                opacity: 0;
            }
            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>

</body>

</html>

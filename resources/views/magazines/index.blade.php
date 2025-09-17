@extends('layouts.app')

@section('title', 'Collection Magazines - Excellence Afrik')
@section('meta_description', 'Découvrez notre collection exclusive de magazines Excellence Afrik. Articles de qualité, analyses approfondies et contenus inspirants sur l\'excellence africaine.')

@section('content')
<div class="magazine-collection-container">
    <!-- Hero Section with Featured Magazine -->
    @if(isset($featured) && $featured)
    <section class="magazine-hero-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="hero-content-wrapper">
                        <div class="row align-items-center">
                            <!-- Featured Magazine Cover -->
                            <div class="col-md-5">
                                <div class="featured-magazine-cover">
                                    <div class="magazine-cover-container">
                                        @php
                                          $cover = $featured->cover_path ? asset('storage/app/public/'.$featured->cover_path) : asset('assets/images/magazines/featured-cover.jpg');
                                          $dateText = $featured->published_at ? \Illuminate\Support\Carbon::parse($featured->published_at)->translatedFormat('F Y') : '';
                                        @endphp
                                        <img src="{{ $cover }}" 
                                             alt="{{ $featured->title }}" 
                                             class="magazine-cover-img">
                                        <div class="magazine-overlay">
                                            @if($featured->is_featured)
                                            <span class="magazine-badge">
                                                <i class="fas fa-star"></i> À la UNE
                                            </span>
                                            @endif
                                            @if($dateText)
                                            <span class="magazine-date">
                                                <i class="far fa-calendar"></i> {{ $dateText }}
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Hero Text Content -->
                            <div class="col-md-7">
                                <div class="hero-text-content">
                                    <div class="hero-subtitle">
                                        <i class="fas fa-book-open"></i> Magazine Excellence Afrik
                                    </div>
                                    <h1 class="hero-title">
                                        {{ $featured->title }}
                                    </h1>
                                    @if(!empty($featured->description))
                                    <p class="hero-description">{{ $featured->description }}</p>
                                    @endif
                                    
                                    <div class="hero-actions">
                                        @if($featured->pdf_path)
                                          <a href="{{ asset('storage/app/public/'.$featured->pdf_path) }}" download class="btn-secondary-outline btn-download-brown" style="background-color: #daa520; color: #fff; border-color: #daa520;">
                                              <i class="fas fa-download"></i> Télécharger PDF
                                          </a>
                                        @else
                                          <a href="#" class="btn-secondary-outline btn-download-brown disabled" aria-disabled="true" tabindex="-1">
                                              <i class="fas fa-download"></i> Télécharger PDF
                                          </a>
                                        @endif
                                    </div>
                                     
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Collection Header -->
    <section class="collection-header-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="collection-header">
                        <h2 class="collection-title">Notre Collection</h2>
                        <p class="collection-subtitle">
                            Explorez tous nos magazines et plongez dans l'univers de l'excellence africaine. 
                            Chaque édition est soigneusement conçue pour vous offrir des contenus de qualité exceptionnelle.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Magazines Grid -->
    <section class="magazines-grid-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="magazines-grid">
                        @include('magazines.partials.magazine-grid')
                    </div>
                    
                    <!-- Pagination -->
                    @if(isset($magazines) && is_object($magazines) && method_exists($magazines, 'links'))
                      <div class="magazines-pagination">
                        <div class="pagination-wrapper d-flex justify-content-end">
                          {{ $magazines->links() }}
                        </div>
                      </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="newsletter-card">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <div class="newsletter-content">
                                    <div class="newsletter-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="newsletter-text">
                                        <h3>Restez Informé</h3>
                                        <p>Recevez nos derniers magazines et articles directement dans votre boîte mail.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <form class="newsletter-form" action="{{ route('newsletter.subscribe') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="source" value="magazines">
                                    <div class="input-group">
                                        <input type="email" 
                                               name="email"
                                               class="form-control" 
                                               placeholder="Votre adresse email"
                                               required>
                                        <button type="submit" class="btn-subscribe">
                                            <i class="fas fa-paper-plane"></i> S'abonner
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
/* === MAGAZINE COLLECTION STYLES === */
.magazine-collection-container {
    background: #ffffff;
    min-height: 100vh;
    color: #000000;
}

/* Magazine Hero Section */
.magazine-hero-section {
    padding: 60px 0 40px; /* reduced bottom space */
    background: #000000;
    border-bottom: 1px solid #111;
}

.hero-content-wrapper {
    padding: 40px 0;
}

/* Featured Magazine Cover */
.featured-magazine-cover {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.magazine-cover-container {
    position: relative;
    max-width: 350px;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
    transition: transform 0.3s ease;
}

.magazine-cover-container:hover {
    transform: translateY(-10px);
}

.magazine-cover-img {
    width: 100%;
    height: auto;
    display: block;
}

.magazine-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.3) 0%, transparent 50%);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 20px;
}

.magazine-badge {
    background: linear-gradient(135deg, #D4AF37 0%, #F2CB05 100%);
    color: #000000;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 0.75rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    align-self: flex-start;
    box-shadow: 0 4px 15px rgba(212, 175, 55, 0.3);
}
/* Hero text contrast on black */
.hero-text-content .hero-subtitle,
.hero-text-content .hero-title,
.hero-text-content .hero-description {
    color: #ffffff;
}
.hero-text-content .issue-number { color: #fff; }
.magazine-date { color: #f8f9fa; }

.magazine-date {
    background: rgba(0, 0, 0, 0.7);
    color: #ffffff;
    padding: 6px 12px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 500;
    align-self: flex-end;
}

/* Hero Text Content */
.hero-text-content {
    padding: 20px 0;
}

.hero-subtitle {
    color: #D4AF37;
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 15px;
}

.hero-title {
    font-size: 3rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 20px;
    color: #000000;
}

.gold-accent {
    background: linear-gradient(135deg, #D4AF37 0%, #F2CB05 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.issue-number {
    display: block;
    font-size: 1.5rem;
    color: #666666;
    font-weight: 400;
    margin-top: 10px;
}

.hero-description {
    font-size: 1.1rem;
    line-height: 1.6;
    color: #555555;
    margin-bottom: 30px;
}

.hero-actions {
    display: flex;
    gap: 15px;
    margin-bottom: 30px;
    flex-wrap: wrap;
}

.btn-primary-gold,
.btn-secondary-outline.disabled {
    opacity: 0.5;
    pointer-events: none;
}

/* Brown download button */
.btn-download-brown,
.btn-download-brown:hover,
.btn-download-brown:focus,
.btn-download-brown:active {
    border: 1px solid #8B4513; /* marron */
    color: #fff;
    background-color: #8B4513;
}
.btn-download-brown.disabled,
.btn-download-brown[aria-disabled="true"] {
    background-color: #8B4513;
    border-color: #8B4513;
    opacity: 0.6;
}

.btn-primary-gold,
.btn-secondary-outline {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border-radius: 8px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 0.95rem;
}

.btn-primary-gold {
    background: linear-gradient(135deg, #D4AF37 0%, #F2CB05 100%);
    color: #000000;
    border: none;
    box-shadow: 0 8px 25px rgba(212, 175, 55, 0.3);
}

.btn-primary-gold:hover {
    transform: translateY(-2px);
    box-shadow: 0 12px 35px rgba(212, 175, 55, 0.4);
    color: #000000;
}

.btn-secondary-outline {
    background: transparent;
    color: #000000;
    border: 2px solid #000000;
}

.btn-secondary-outline:hover {
    background: #000000;
    color: #ffffff;
    transform: translateY(-2px);
}

.hero-stats {
    display: flex;
    gap: 30px;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-size: 1.8rem;
    font-weight: 700;
    color: #D4AF37;
    line-height: 1;
}

.stat-label {
    font-size: 0.85rem;
    color: #666666;
    font-weight: 500;
    margin-top: 5px;
}

/* Collection Header */
.collection-header-section {
    padding: 60px 0 40px;
    background: #ffffff;
}

.collection-header {
    text-align: center;
    margin-bottom: 40px;
}

.collection-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #000000;
    margin-bottom: 15px;
}

.collection-subtitle {
    font-size: 1.1rem;
    color: #666666;
    max-width: 600px;
    margin: 0 auto;
}

/* Magazines Grid */
.magazines-grid-section {
    padding: 40px 0 80px;
    background: #ffffff;
}

.magazines-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    margin-bottom: 60px;
}

.magazine-item {
    opacity: 0;
    animation: fadeInUp 0.6s ease forwards;
}

.magazine-item:nth-child(1) { animation-delay: 0.1s; }
.magazine-item:nth-child(2) { animation-delay: 0.2s; }
.magazine-item:nth-child(3) { animation-delay: 0.3s; }
.magazine-item:nth-child(4) { animation-delay: 0.4s; }
.magazine-item:nth-child(5) { animation-delay: 0.5s; }
.magazine-item:nth-child(6) { animation-delay: 0.6s; }
.magazine-item:nth-child(7) { animation-delay: 0.7s; }
.magazine-item:nth-child(8) { animation-delay: 0.8s; }

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.magazine-card {
    background: #ffffff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: 100%;
    display: flex;
    flex-direction: column;
    border: 1px solid #f0f0f0;
}

.magazine-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
}

.magazine-cover {
    position: relative;
    overflow: hidden;
}

.magazine-image {
    width: 279px;
    height: 377px;
    object-fit: cover;
    transition: transform 0.3s ease;
    display: block;
    margin: 0 auto;
}

.magazine-card:hover .magazine-image {
    transform: scale(1.05);
}

.magazine-card .magazine-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.magazine-card:hover .magazine-overlay {
    opacity: 1;
}

.magazine-actions {
    display: flex;
    gap: 15px;
}

.btn-read,
.btn-download {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: 600;
    font-size: 0.9rem;
    transition: all 0.3s ease;
}

.btn-read {
    background: linear-gradient(135deg, #D4AF37 0%, #F2CB05 100%);
    color: #000000;
}

.btn-download {
    background: rgba(255, 255, 255, 0.9);
    color: #000000;
    border: 2px solid rgba(255, 255, 255, 0.3);
}

.btn-read:hover,
.btn-download:hover {
    transform: scale(1.05);
}

.magazine-info {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.magazine-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 15px;
}

.magazine-info .magazine-date {
    background: rgba(212, 175, 55, 0.1);
    color: #D4AF37;
    padding: 4px 10px;
    border-radius: 12px;
    font-size: 0.8rem;
    font-weight: 500;
}

.magazine-category { display: none; }

.magazine-title {
    font-size: 1.2rem;
    font-weight: 600;
    color: #000000;
    margin-bottom: 10px;
    line-height: 1.3;
}

.magazine-description { display: none; }

/* Pagination */
.magazines-pagination {
    margin-top: 60px;
}

.pagination-wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 20px;
}

.pagination-info {
    color: #666666;
    font-size: 0.9rem;
}

.pagination-list {
    display: flex;
    list-style: none;
    margin: 0;
    padding: 0;
    background: #ffffff;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
}

.pagination-list .page-item {
    border-right: 1px solid #e9ecef;
}

.pagination-list .page-item:last-child {
    border-right: none;
}

.pagination-list .page-link {
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 12px 20px;
    color: #000000;
    text-decoration: none;
    transition: all 0.3s ease;
    background: transparent;
    border: none;
}

.pagination-list .page-item.active .page-link {
    background: linear-gradient(135deg, #D4AF37 0%, #F2CB05 100%);
    color: #000000;
    font-weight: 600;
}

.pagination-list .page-item:not(.disabled):not(.active) .page-link:hover {
    background: rgba(212, 175, 55, 0.1);
    color: #D4AF37;
}

.pagination-list .page-item.disabled .page-link {
    color: #cccccc;
    cursor: not-allowed;
}

/* Newsletter Section */
.newsletter-section {
    padding: 60px 0;
    background: #f8f9fa;
}

.newsletter-card {
    background: #ffffff;
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    border: 1px solid #e9ecef;
}

.newsletter-content {
    display: flex;
    align-items: center;
    gap: 20px;
}

.newsletter-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, #D4AF37 0%, #F2CB05 100%);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: #000000;
    flex-shrink: 0;
}

.newsletter-text h3 {
    color: #000000;
    margin-bottom: 8px;
    font-size: 1.3rem;
    font-weight: 600;
}

.newsletter-text p {
    color: #666666;
    margin: 0;
    font-size: 0.95rem;
}

.newsletter-form .input-group {
    display: flex;
    border-radius: 25px;
    overflow: hidden;
    border: 2px solid #e9ecef;
    background: #ffffff;
}

.newsletter-form .form-control {
    background: transparent;
    border: none;
    color: #000000;
    padding: 15px 20px;
    font-size: 0.95rem;
}

.newsletter-form .form-control:focus {
    outline: none;
    box-shadow: none;
}

.newsletter-form .form-control::placeholder {
    color: #999999;
}

.btn-subscribe {
    background: linear-gradient(135deg, #D4AF37 0%, #F2CB05 100%);
    color: #000000;
    border: none;
    padding: 15px 25px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.btn-subscribe:hover {
    background: linear-gradient(135deg, #F2CB05 0%, #D4AF37 100%);
    transform: translateX(-2px);
}

/* Responsive Design */
@media (max-width: 1200px) {
    .magazines-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .magazine-image {
        width: 279px;
        height: 377px;
    }
}

@media (max-width: 992px) {
    .magazines-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.2rem;
    }
    
    .hero-stats {
        gap: 20px;
    }
    
    .hero-actions {
        justify-content: center;
    }
    
    .magazines-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .magazine-image {
        width: 100%;
        height: auto;
        aspect-ratio: 279 / 377;
    }
    
    .newsletter-content {
        flex-direction: column;
        text-align: center;
        margin-bottom: 20px;
    }
    
    .newsletter-form .input-group {
        flex-direction: column;
        border-radius: 15px;
    }
    
    .btn-subscribe {
        border-radius: 0 0 15px 15px;
        justify-content: center;
    }
    
    .pagination-wrapper {
        flex-direction: column;
    }
    
    .pagination-list {
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .collection-title {
        font-size: 2rem;
    }
}
</style>
@endpush

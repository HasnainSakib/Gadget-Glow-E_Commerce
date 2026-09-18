@extends('layouts.app')

@section('title', 'Gadget & Glow - Premium Tech & Beauty Collection')

@section('content')
<div class="container-fluid px-lg-4 px-xl-5 py-2">
    <div class="row g-4">

        <!-- ==========================================
             LEFT COLUMN (1): MAIN SITE CONTENT AREA
             ========================================== -->
        <div class="col-lg-7 col-xl-8">

            <!-- 1. HERO BANNER CAROUSEL (5 Slides, Enlarged Height) -->
            <div id="heroBannerCarousel" class="carousel slide carousel-fade mb-4 shadow-sm rounded-4 overflow-hidden" data-bs-ride="carousel" data-bs-interval="4000">
                <!-- Indicators -->
                <div class="carousel-indicators mb-3">
                    <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#heroBannerCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                </div>

                <!-- Carousel Items (5 Slides) -->
                <div class="carousel-inner">
                    
                    <!-- Slide 1: Main Collection -->
                    <div class="carousel-item active">
                        <div class="hero-banner p-4 p-md-5 d-flex align-items-center" style="min-height: 380px;">
                            <div class="row align-items-center w-100 g-4">
                                <div class="col-md-7">
                                    <span class="badge bg-amber-subtle text-amber border border-warning px-3 py-2 rounded-pill fw-bold mb-3 d-inline-flex align-items-center gap-1" style="background: #fef3c7; color: #b45309;">
                                        <i class="bi bi-stars text-warning"></i> Smart Tech & Luxury Cosmetics 2026
                                    </span>
                                    <h1 class="display-5 fw-extrabold mb-3 text-dark">You can feel high sense of tech & glow.</h1>
                                    <p class="lead text-secondary opacity-90 mb-4 me-lg-3" style="font-size: 1.05rem;">
                                        Shop authentic active noise-canceling earbuds, smartwatch series, mechanical keyboards, and luxury face serums across Bangladesh with instant fast delivery.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="#products-catalog" class="btn btn-primary-custom btn-lg rounded-pill fw-bold px-4 shadow-sm">
                                            <i class="bi bi-bag-check me-2"></i> Shop Now
                                        </a>
                                        <a href="{{ route('about.index') }}" class="btn btn-outline-dark btn-lg rounded-pill px-4">
                                            Learn More
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 d-none d-md-block text-center position-relative">
                                    <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?auto=format&fit=crop&w=800&q=80" alt="Tech & Beauty" class="img-fluid rounded-4 shadow-sm border" style="max-height: 290px; width: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Gadget & Glow</text></svg>';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2: Smart ANC Audio -->
                    <div class="carousel-item">
                        <div class="hero-banner p-4 p-md-5 d-flex align-items-center" style="min-height: 380px; background: linear-gradient(135deg, #eff6ff 0%, #ffffff 50%, #f0fdf4 100%);">
                            <div class="row align-items-center w-100 g-4">
                                <div class="col-md-7">
                                    <span class="badge bg-primary-subtle text-primary border border-primary px-3 py-2 rounded-pill fw-bold mb-3 d-inline-flex align-items-center gap-1">
                                        <i class="bi bi-headphones me-1"></i> Premium Audio & Headphones
                                    </span>
                                    <h1 class="display-5 fw-extrabold mb-3 text-dark">Immersive Sound ANC Wireless Earbuds</h1>
                                    <p class="lead text-secondary opacity-90 mb-4 me-lg-3" style="font-size: 1.05rem;">
                                        Experience true high-fidelity bass, active noise cancellation, and crystal-clear voice calls with up to 40 hours total playback time.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="{{ route('shop.category', 'tech-gadgets') }}" class="btn btn-primary-custom btn-lg rounded-pill fw-bold px-4 shadow-sm">
                                            <i class="bi bi-cart-plus me-2"></i> Explore Audio Gear
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 d-none d-md-block text-center position-relative">
                                    <img src="https://images.unsplash.com/photo-1590658268037-6bf12165a8df?auto=format&fit=crop&w=800&q=80" alt="ANC Earbuds" class="img-fluid rounded-4 shadow-sm border" style="max-height: 290px; width: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Audio</text></svg>';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 3: Luxury Skincare -->
                    <div class="carousel-item">
                        <div class="hero-banner p-4 p-md-5 d-flex align-items-center" style="min-height: 380px; background: linear-gradient(135deg, #fdf2f8 0%, #ffffff 50%, #fff7ed 100%);">
                            <div class="row align-items-center w-100 g-4">
                                <div class="col-md-7">
                                    <span class="badge bg-danger-subtle text-danger border border-danger px-3 py-2 rounded-pill fw-bold mb-3 d-inline-flex align-items-center gap-1">
                                        <i class="bi bi-flower1 me-1"></i> Luxury Beauty & Skincare
                                    </span>
                                    <h1 class="display-5 fw-extrabold mb-3 text-dark">Radiant Vitamin C & Hyaluronic Serums</h1>
                                    <p class="lead text-secondary opacity-90 mb-4 me-lg-3" style="font-size: 1.05rem;">
                                        Nourish your skin with 100% authentic dermatologically tested organic serums and moisturizer formulas for flawless glowing skin.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="{{ route('shop.category', 'beauty-makeup') }}" class="btn btn-accent btn-lg rounded-pill fw-bold px-4 shadow-sm">
                                            <i class="bi bi-heart me-2"></i> Shop Skincare
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 d-none d-md-block text-center position-relative">
                                    <img src="https://images.unsplash.com/photo-1608248597261-e4d0947c6b1e?auto=format&fit=crop&w=800&q=80" alt="Luxury Skincare" class="img-fluid rounded-4 shadow-sm border" style="max-height: 290px; width: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Skincare</text></svg>';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 4: Mechanical Keyboards & Accessories -->
                    <div class="carousel-item">
                        <div class="hero-banner p-4 p-md-5 d-flex align-items-center" style="min-height: 380px; background: linear-gradient(135deg, #f3e8ff 0%, #ffffff 50%, #eff6ff 100%);">
                            <div class="row align-items-center w-100 g-4">
                                <div class="col-md-7">
                                    <span class="badge bg-purple-subtle text-purple border border-purple px-3 py-2 rounded-pill fw-bold mb-3 d-inline-flex align-items-center gap-1" style="background: #f3e8ff; color: #7e22ce;">
                                        <i class="bi bi-keyboard me-1"></i> Pro Mechanical Keyboards
                                    </span>
                                    <h1 class="display-5 fw-extrabold mb-3 text-dark">Hot-Swappable RGB Mechanical Gaming Keyboards</h1>
                                    <p class="lead text-secondary opacity-90 mb-4 me-lg-3" style="font-size: 1.05rem;">
                                        Elevate your typing & gaming experience with custom tactile switches, PBT keycaps, wireless Bluetooth 5.0, and dynamic RGB lighting.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="#products-catalog" class="btn btn-primary-custom btn-lg rounded-pill fw-bold px-4 shadow-sm">
                                            <i class="bi bi-controller me-2"></i> Browse Keyboards
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 d-none d-md-block text-center position-relative">
                                    <img src="https://images.unsplash.com/photo-1587829741301-dc798b83add3?auto=format&fit=crop&w=800&q=80" alt="Mechanical Keyboards" class="img-fluid rounded-4 shadow-sm border" style="max-height: 290px; width: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Keyboards</text></svg>';">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 5: Smartwatches & Wearables -->
                    <div class="carousel-item">
                        <div class="hero-banner p-4 p-md-5 d-flex align-items-center" style="min-height: 380px; background: linear-gradient(135deg, #ecfeff 0%, #ffffff 50%, #f0fdf4 100%);">
                            <div class="row align-items-center w-100 g-4">
                                <div class="col-md-7">
                                    <span class="badge bg-info-subtle text-info-emphasis border border-info px-3 py-2 rounded-pill fw-bold mb-3 d-inline-flex align-items-center gap-1">
                                        <i class="bi bi-smartwatch me-1"></i> Fitness & Health Watches
                                    </span>
                                    <h1 class="display-5 fw-extrabold mb-3 text-dark">Ultra HD Display Smart Fitness Trackers</h1>
                                    <p class="lead text-secondary opacity-90 mb-4 me-lg-3" style="font-size: 1.05rem;">
                                        Track continuous heart rate, SpO2, sleep analytics, and workout modes with Bluetooth calling and 14-day ultra-long battery life.
                                    </p>
                                    <div class="d-flex flex-wrap gap-3">
                                        <a href="#products-catalog" class="btn btn-primary-custom btn-lg rounded-pill fw-bold px-4 shadow-sm">
                                            <i class="bi bi-clock-history me-2"></i> Shop Smartwatches
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-5 d-none d-md-block text-center position-relative">
                                    <img src="https://images.unsplash.com/photo-1579586337278-3befd40fd17a?auto=format&fit=crop&w=800&q=80" alt="Smartwatches" class="img-fluid rounded-4 shadow-sm border" style="max-height: 290px; width: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Smartwatches</text></svg>';">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Prev & Next Arrow Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#heroBannerCarousel" data-bs-slide="prev" style="width: 50px;">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 shadow-sm" aria-hidden="true" style="background-size: 50%;"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#heroBannerCarousel" data-bs-slide="next" style="width: 50px;">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3 shadow-sm" aria-hidden="true" style="background-size: 50%;"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Popular Categories Showcase -->
            <div class="mb-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                            <i class="bi bi-grid text-primary"></i> Popular Categories
                        </h4>
                        <p class="text-muted small mb-0">Browse top trending tech and beauty categories</p>
                    </div>
                </div>

                <div class="row g-3">
                    @foreach($categories as $category)
                        <div class="col-6 col-md-4 col-xl-3">
                            <a href="{{ route('shop.category', $category->slug) }}" class="text-decoration-none">
                                <div class="card h-100 border-0 shadow-sm p-3 text-center rounded-4 hover-lift" style="background: #ffffff; transition: transform 0.2s;">
                                    <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-2" style="width: 54px; height: 54px; background: {{ $category->slug == 'tech-gadgets' ? '#eff6ff' : '#fdf2f8' }}; color: {{ $category->slug == 'tech-gadgets' ? '#2563eb' : '#db2777' }};">
                                        <i class="bi {{ $category->slug == 'tech-gadgets' ? 'bi-laptop fs-4' : 'bi-flower1 fs-4' }}"></i>
                                    </div>
                                    <h6 class="fw-bold text-dark mb-1">{{ $category->name }}</h6>
                                    <span class="text-muted small">{{ $category->products_count }} Products</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

        </div> <!-- END LEFT COLUMN -->


        <!-- ==========================================
             RIGHT COLUMN (2): BEST SELLING & NEW PRODUCTS HORIZONTAL SLIDERS (3 Cards Visible + Right Arrow)
             ========================================== -->
        <div class="col-lg-5 col-xl-4">
            <div class="sticky-top" style="top: 90px; z-index: 10;">

                <!-- 1. 🔥 BEST SELLING ITEMS SECTION (3 Visible Cards Horizontally, Right Arrow `>`) -->
                <div class="card p-3 mb-4 border-0 shadow-sm bg-white rounded-4">
                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                        <div class="d-flex align-items-center gap-2">
                            <h6 class="fw-bold mb-0 text-dark d-flex align-items-center gap-1.5 fs-6">
                                <i class="bi bi-fire text-danger fs-5"></i> Best Selling Items
                            </h6>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2 py-1 extra-small fw-bold" style="font-size: 0.65rem;">Top Sellers</span>
                        </div>
                        <!-- Navigation Arrow `>` -->
                        <div>
                            <button type="button" class="btn btn-sm btn-primary rounded-circle p-0 d-flex align-items-center justify-content-center shadow-sm" style="width: 32px; height: 32px;" onclick="slideHorizontal('bestSellersWrapper', 1)" title="Next Products">
                                <i class="bi bi-chevron-right" style="font-size: 0.85rem;"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Horizontal Scroll Wrapper: Displays 3 Cards Side-by-Side Horizontally -->
                    <div id="bestSellersWrapper" class="horizontal-slider-wrapper py-1">
                        <div class="d-flex gap-2">
                            @foreach($bestSellers->take(6) as $item)
                                <div class="horizontal-card-item sidebar-slider-item flex-shrink-0">
                                    <div class="sidebar-product-card p-2 rounded-3 d-flex flex-column h-100" style="border: 1px solid #eae4d8; background: #ffffff;">
                                        <a href="{{ route('shop.show', $item->slug) }}" class="mb-2 text-center overflow-hidden rounded-3 bg-light d-block" style="height: 95px;">
                                            <img src="{{ $item->image }}" alt="{{ $item->name }}" class="img-fluid h-100 w-100" style="object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Item</text></svg>';">
                                        </a>
                                        <span class="badge-category {{ $item->category && $item->category->slug == 'tech-gadgets' ? 'badge-gadget' : 'badge-beauty' }} mb-1 d-inline-block text-truncate" style="font-size: 0.55rem; padding: 0.15em 0.35em; max-width: 100%;">
                                            {{ $item->category ? $item->category->name : 'Item' }}
                                        </span>
                                        <h6 class="fw-bold text-dark text-truncate mb-1" style="font-size: 0.78rem;" title="{{ $item->name }}">
                                            <a href="{{ route('shop.show', $item->slug) }}" class="text-decoration-none text-dark hover-primary">{{ $item->name }}</a>
                                        </h6>
                                        <div class="d-flex align-items-center justify-content-between mt-auto pt-1 border-top">
                                            <span class="fw-bold text-primary" style="font-size: 0.8rem;">৳{{ number_format($item->price, 0) }}</span>
                                            <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center shadow-sm" style="width: 24px; height: 24px;" title="Add to Cart" {{ $item->stock <= 0 ? 'disabled' : '' }}>
                                                    <i class="bi bi-bag-plus-fill" style="font-size: 0.65rem;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- 2. ✨ NEW PRODUCTS SECTION (3 Visible Cards Horizontally, Right Arrow `>`) -->
                <div class="card p-3 mb-4 border-0 shadow-sm bg-white rounded-4">
                    <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                        <div class="d-flex align-items-center gap-2">
                            <h6 class="fw-bold mb-0 text-dark d-flex align-items-center gap-1.5 fs-6">
                                <i class="bi bi-sparkles text-amber fs-5" style="color: #d97706;"></i> New Products
                            </h6>
                            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-2 py-1 extra-small fw-bold" style="font-size: 0.65rem;">Fresh</span>
                        </div>
                        <!-- Navigation Arrow `>` -->
                        <div>
                            <button type="button" class="btn btn-sm btn-primary rounded-circle p-0 d-flex align-items-center justify-content-center shadow-sm" style="width: 32px; height: 32px;" onclick="slideHorizontal('newArrivalsWrapper', 1)" title="Next Products">
                                <i class="bi bi-chevron-right" style="font-size: 0.85rem;"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Horizontal Scroll Wrapper: Displays 3 Cards Side-by-Side Horizontally -->
                    <div id="newArrivalsWrapper" class="horizontal-slider-wrapper py-1">
                        <div class="d-flex gap-2">
                            @foreach($newArrivals->take(6) as $new)
                                <div class="horizontal-card-item sidebar-slider-item flex-shrink-0">
                                    <div class="sidebar-product-card p-2 rounded-3 d-flex flex-column h-100" style="border: 1px solid #eae4d8; background: #ffffff;">
                                        <a href="{{ route('shop.show', $new->slug) }}" class="mb-2 text-center overflow-hidden rounded-3 bg-light d-block" style="height: 95px;">
                                            <img src="{{ $new->image }}" alt="{{ $new->name }}" class="img-fluid h-100 w-100" style="object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Item</text></svg>';">
                                        </a>
                                        <span class="badge-category {{ $new->category && $new->category->slug == 'tech-gadgets' ? 'badge-gadget' : 'badge-beauty' }} mb-1 d-inline-block text-truncate" style="font-size: 0.55rem; padding: 0.15em 0.35em; max-width: 100%;">
                                            {{ $new->category ? $new->category->name : 'Item' }}
                                        </span>
                                        <h6 class="fw-bold text-dark text-truncate mb-1" style="font-size: 0.78rem;" title="{{ $new->name }}">
                                            <a href="{{ route('shop.show', $new->slug) }}" class="text-decoration-none text-dark hover-primary">{{ $new->name }}</a>
                                        </h6>
                                        <div class="d-flex align-items-center justify-content-between mt-auto pt-1 border-top">
                                            <span class="fw-bold text-success" style="font-size: 0.8rem;">৳{{ number_format($new->price, 0) }}</span>
                                            <form action="{{ route('cart.add', $new->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary-custom rounded-circle p-0 d-flex align-items-center justify-content-center shadow-sm" style="width: 24px; height: 24px;" title="Add to Cart" {{ $new->stock <= 0 ? 'disabled' : '' }}>
                                                    <i class="bi bi-bag-plus-fill" style="font-size: 0.65rem;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div> <!-- END RIGHT COLUMN -->

    </div>

    <!-- ==========================================
         BOTTOM FULL WIDTH CATEGORY PRODUCT SHOWCASES (With Arrow Slider & View All)
         ========================================== -->
    @foreach($categories as $category)
        @if($category->products && $category->products->count() > 0)
            <div class="mb-5 pt-3 border-top">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div>
                        <h4 class="fw-bold mb-1 text-dark d-flex align-items-center gap-2">
                            @if($category->slug == 'tech-gadgets')
                                <i class="bi bi-laptop text-primary"></i>
                            @else
                                <i class="bi bi-flower1 text-pink" style="color: #ec4899;"></i>
                            @endif
                            {{ $category->name }} Showcase
                        </h4>
                        <p class="text-muted small mb-0">{{ $category->description }}</p>
                    </div>

                    <div class="d-flex align-items-center gap-2">
                        <!-- Navigation Arrow `<` and `>` Controls -->
                        <div class="d-flex align-items-center gap-1 me-1">
                            <button type="button" class="btn btn-sm btn-light border rounded-circle p-0 d-flex align-items-center justify-content-center shadow-sm" style="width: 34px; height: 34px;" onclick="slideHorizontal('cat_slider_{{ $category->id }}', -1)" title="Previous">
                                <i class="bi bi-chevron-left" style="font-size: 0.9rem;"></i>
                            </button>
                            <button type="button" class="btn btn-sm btn-primary rounded-circle p-0 d-flex align-items-center justify-content-center shadow-sm" style="width: 34px; height: 34px;" onclick="slideHorizontal('cat_slider_{{ $category->id }}', 1)" title="Next">
                                <i class="bi bi-chevron-right" style="font-size: 0.9rem;"></i>
                            </button>
                        </div>
                        <a href="{{ route('shop.category', $category->slug) }}" class="btn btn-outline-dark rounded-pill btn-sm px-3 fw-bold">
                            View All ({{ $category->products_count }}) <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Horizontal Slider Wrapper for Category Items -->
                <div id="cat_slider_{{ $category->id }}" class="horizontal-slider-wrapper py-2" style="overflow-x: hidden; scroll-behavior: smooth;">
                    <div class="d-flex gap-3">
                        @foreach($category->products as $catProduct)
                            <div class="horizontal-card-item flex-shrink-0" style="width: calc(25% - 0.75rem); min-width: 250px;">
                                <div class="card product-card h-100 border-0 shadow-sm rounded-4 bg-white">
                                    <div class="position-relative overflow-hidden" style="height: 180px;">
                                        <a href="{{ route('shop.show', $catProduct->slug) }}">
                                            <img src="{{ $catProduct->image }}" class="card-img-top h-100 w-100" alt="{{ $catProduct->name }}" style="object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Product</text></svg>';">
                                        </a>
                                        <div class="position-absolute top-0 start-0 m-2">
                                            <span class="badge-category {{ $category->slug == 'tech-gadgets' ? 'badge-gadget' : 'badge-beauty' }}">
                                                {{ $category->name }}
                                            </span>
                                        </div>
                                    </div>

                                    <div class="card-body d-flex flex-column p-3">
                                        <h6 class="card-title fw-bold text-dark mb-1 text-truncate" title="{{ $catProduct->name }}">
                                            <a href="{{ route('shop.show', $catProduct->slug) }}" class="text-decoration-none text-dark hover-primary">
                                                {{ $catProduct->name }}
                                            </a>
                                        </h6>
                                        <p class="card-text text-muted small mb-2 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; font-size: 0.8rem;">
                                            {{ $catProduct->description }}
                                        </p>
                                        <div class="d-flex align-items-center justify-content-between mt-auto pt-2 border-top">
                                            <div>
                                                <span class="fs-6 fw-bold text-primary">৳{{ number_format($catProduct->price, 0) }}</span>
                                            </div>
                                            <form action="{{ route('cart.add', $catProduct->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary-custom rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 34px; height: 34px;" title="Add to Cart" {{ $catProduct->stock <= 0 ? 'disabled' : '' }}>
                                                    <i class="bi bi-bag-plus-fill fs-6"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    @endforeach

    <!-- ==========================================
         DEDICATED ALL PRODUCTS CATALOG SECTION (#products-catalog)
         ========================================== -->
    <div id="products-catalog" class="pt-4 pb-5 my-4 border-top">
        <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3 mb-4">
            <div>
                <span class="badge bg-amber-subtle text-amber border border-warning px-3 py-1.5 rounded-pill fw-bold mb-2 d-inline-flex align-items-center gap-1" style="background: #fef3c7; color: #b45309;">
                    <i class="bi bi-grid-fill"></i> Storefront Product Catalog
                </span>
                <h3 class="fw-extrabold mb-1 text-dark">
                    @if(request('category'))
                        @php
                            $catParam = strtolower(request('category'));
                            $activeCategory = $categories->first(function($c) use ($catParam) {
                                return $c->slug === $catParam || str_contains($c->slug, $catParam) || str_contains(strtolower($c->name), $catParam);
                            });
                        @endphp
                        Showing Products under: <span class="text-primary">{{ $activeCategory ? $activeCategory->name : ucfirst(request('category')) }}</span>
                    @elseif(request('search'))
                        Search Results for "{{ request('search') }}"
                    @else
                        Explore All Authentic Products
                    @endif
                </h3>
                <p class="text-muted mb-0">Browse our complete collection of 100% authentic tech gadgets and luxury skincare cosmetics.</p>
            </div>

            <!-- Filter Reset & Total Count -->
            <div class="d-flex align-items-center gap-2">
                @if(request('category') || request('search'))
                    <a href="{{ route('shop.index') }}#products-catalog" class="btn btn-sm btn-outline-danger rounded-pill px-3 fw-bold">
                        <i class="bi bi-x-circle me-1"></i> Clear Filter (Show All)
                    </a>
                @endif
                <span class="badge bg-dark text-white px-3 py-2 rounded-pill fs-6">
                    {{ $products->total() }} Products Found
                </span>
            </div>
        </div>

        <!-- Filter Tabs & Search Bar -->
        <div class="card p-3 border-0 shadow-sm rounded-4 mb-4" style="background: #ffffff;">
            <div class="row align-items-center g-3">
                <div class="col-lg-7">
                    <div class="d-flex flex-wrap gap-2">
                        <a href="{{ route('shop.index') }}#products-catalog" class="btn btn-sm {{ !request('category') ? 'btn-primary-custom fw-bold shadow-sm' : 'btn-outline-dark' }} rounded-pill px-3">
                            <i class="bi bi-grid me-1"></i> All Products
                        </a>
                        @foreach($categories as $cat)
                            @php
                                $isActive = request('category') && (request('category') == $cat->slug || str_contains($cat->slug, strtolower(request('category'))));
                            @endphp
                            <a href="{{ route('shop.index', ['category' => $cat->slug]) }}#products-catalog" class="btn btn-sm {{ $isActive ? 'btn-primary-custom fw-bold shadow-sm' : 'btn-outline-dark' }} rounded-pill px-3">
                                <i class="bi {{ $cat->slug == 'tech-gadgets' ? 'bi-laptop' : 'bi-flower1' }} me-1"></i>
                                {{ $cat->name }} ({{ $cat->products_count }})
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5">
                    <form action="{{ route('shop.index') }}" method="GET" class="d-flex gap-2">
                        @if(request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        <div class="input-group">
                            <span class="input-group-text bg-light border-end-0 rounded-start-pill ps-3">
                                <i class="bi bi-search text-muted"></i>
                            </span>
                            <input type="text" name="search" class="form-control bg-light border-start-0 ps-0" placeholder="Search gadgets, makeup..." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary-custom rounded-end-pill px-4">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Product Catalog Grid -->
        @if($products->count() > 0)
            <div class="row g-3 g-lg-4">
                @foreach($products as $product)
                    <div class="col-6 col-md-4 col-xl-3">
                        <div class="card product-card h-100 border-0 shadow-sm rounded-4 bg-white">
                            <div class="position-relative overflow-hidden" style="height: 200px;">
                                <a href="{{ route('shop.show', $product->slug) }}">
                                    <img src="{{ $product->image }}" class="card-img-top h-100 w-100" alt="{{ $product->name }}" style="object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Product</text></svg>';">
                                </a>
                                <div class="position-absolute top-0 start-0 m-2">
                                    <span class="badge-category {{ $product->category && $product->category->slug == 'tech-gadgets' ? 'badge-gadget' : 'badge-beauty' }}">
                                        {{ $product->category ? $product->category->name : 'General' }}
                                    </span>
                                </div>
                                <div class="position-absolute top-0 end-0 m-2">
                                    <button type="button" class="btn btn-sm btn-light rounded-circle shadow-sm p-0 d-flex align-items-center justify-content-center text-danger" style="width: 32px; height: 32px;" data-bs-toggle="modal" data-bs-target="#wishlistModalCat{{ $product->id }}" title="Add to Wishlist">
                                        <i class="bi bi-heart-fill"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Wishlist Modal for Card -->
                            <div class="modal fade" id="wishlistModalCat{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content rounded-4 border-0 shadow-lg">
                                        <div class="modal-header border-0 pb-0">
                                            <h5 class="modal-title fw-bold text-dark"><i class="bi bi-heart-fill text-danger me-2"></i>Add to Wishlist</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('wishlist.store', $product->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-body p-4 text-start">
                                                <p class="text-secondary small mb-3">
                                                    Save <strong>{{ $product->name }}</strong> to your wishlist by providing your name and contact details.
                                                </p>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold text-dark">Full Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="customer_name" class="form-control rounded-3" value="{{ session('customer_name') }}" placeholder="John Doe" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold text-dark">Mobile Phone <span class="text-danger">*</span></label>
                                                    <input type="tel" name="customer_phone" minlength="11" maxlength="11" pattern="01[3-9][0-9]{8}" class="form-control rounded-3" value="{{ session('customer_phone') }}" placeholder="01712345678" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold text-dark">Email Address <span class="text-danger">*</span></label>
                                                    <input type="email" name="customer_email" class="form-control rounded-3" value="{{ session('customer_email') }}" placeholder="john@example.com" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 pt-0">
                                                <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger rounded-pill px-4 fw-bold">
                                                    <i class="bi bi-heart-fill me-1"></i> Save to Wishlist
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column p-3">
                                <h6 class="card-title fw-bold text-dark mb-1 text-truncate" title="{{ $product->name }}">
                                    <a href="{{ route('shop.show', $product->slug) }}" class="text-decoration-none text-dark hover-primary">
                                        {{ $product->name }}
                                    </a>
                                </h6>
                                <p class="card-text text-muted small mb-3 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; font-size: 0.82rem;">
                                    {{ $product->description }}
                                </p>
                                <div class="d-flex align-items-center justify-content-between mt-auto pt-2 border-top">
                                    <div>
                                        <span class="fs-5 fw-bold text-primary">৳{{ number_format($product->price, 0) }}</span>
                                    </div>
                                    <div class="d-flex align-items-center gap-1">
                                        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-primary-custom rounded-circle p-2 d-flex align-items-center justify-content-center" style="width: 34px; height: 34px;" title="Add to Cart" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                                <i class="bi bi-bag-plus-fill fs-6"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('cart.buyNow', $product->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="btn btn-success rounded-pill px-2.5 py-1 d-flex align-items-center justify-content-center fw-bold text-white extra-small" style="background-color: #10b981; border: none; font-size: 0.72rem;" title="Buy Now (সরাসরি ক্রয়)" {{ $product->stock <= 0 ? 'disabled' : '' }}>
                                                <i class="bi bi-lightning-fill me-1"></i> Buy Now
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>
        @else
            <div class="text-center py-5 bg-white rounded-4 shadow-sm border">
                <i class="bi bi-basket3 text-muted display-4 d-block mb-3"></i>
                <h5 class="fw-bold text-dark">No Products Found</h5>
                <p class="text-muted">There are no products matching your selected category or search filter.</p>
                <a href="{{ route('shop.index') }}#products-catalog" class="btn btn-primary-custom rounded-pill px-4">View All Products</a>
            </div>
        @endif
    </div>

</div>
@endsection

@section('scripts')
<script>
    function slideHorizontal(wrapperId, direction) {
        const wrapper = document.getElementById(wrapperId);
        if (wrapper) {
            const scrollDistance = wrapper.clientWidth;
            const maxScroll = wrapper.scrollWidth - wrapper.clientWidth;
            const currentScroll = wrapper.scrollLeft;

            if (direction === 1) {
                if (currentScroll >= maxScroll - 15) {
                    wrapper.scrollTo({ left: 0, behavior: 'smooth' });
                } else {
                    wrapper.scrollBy({ left: scrollDistance, behavior: 'smooth' });
                }
            } else if (direction === -1) {
                if (currentScroll <= 15) {
                    wrapper.scrollTo({ left: maxScroll, behavior: 'smooth' });
                } else {
                    wrapper.scrollBy({ left: -scrollDistance, behavior: 'smooth' });
                }
            }
        }
    }

    // Auto-scroll to #products-catalog when category or search filter is applied
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('category') || urlParams.has('search') || window.location.hash === '#products-catalog') {
            const catalogElem = document.getElementById('products-catalog');
            if (catalogElem) {
                setTimeout(function() {
                    catalogElem.scrollIntoView({ behavior: 'smooth' });
                }, 150);
            }
        }
    });
</script>
@endsection

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    @php
        $pageKey = 'home';
        if (request()->routeIs('cart.*')) {
            $pageKey = 'cart';
        } elseif (request()->routeIs('checkout.*')) {
            $pageKey = 'checkout';
        } elseif (request()->routeIs('shop.show')) {
            $pageKey = 'shop';
        } elseif (request()->routeIs('blog.*')) {
            $pageKey = 'blog';
        } elseif (request()->routeIs('about.*')) {
            $pageKey = 'about';
        } elseif (request()->routeIs('contact.*')) {
            $pageKey = 'contact';
        }

        $seo = \App\Models\SeoSetting::where('page_key', $pageKey)->first();
        $metaTitle = $seo ? $seo->meta_title : 'Gadget & Glow - Premium Electronics & Beauty Store Bangladesh';
        $metaDescription = $seo ? $seo->meta_description : 'Shop smart tech gadgets and luxury cosmetics in Bangladesh.';
    @endphp

    <title>@yield('title', $metaTitle)</title>
    <meta name="description" content="@yield('meta_description', $metaDescription)">

    <!-- Favicon -->
    <link rel="icon" href="{{ $faviconUrl }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        :root {
            --cream-bg: #f7f3ed;
            --cream-card: #ffffff;
            --cream-border: #e7dfd3;
            --primary-glow: #2563eb;
            --accent-pink: #ec4899;
            --accent-cyan: #0284c7;
            --text-heading: #1c1917;
            --text-body: #374151;
            --text-muted: #6b7280;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f7f3ed;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(236, 72, 153, 0.06) 0%, transparent 45%),
                radial-gradient(circle at 90% 80%, rgba(37, 99, 235, 0.07) 0%, transparent 45%),
                radial-gradient(circle at 50% 50%, rgba(217, 119, 6, 0.05) 0%, transparent 50%),
                linear-gradient(135deg, #f8f4ee 0%, #f4eee7 50%, #f1eae0 100%);
            background-attachment: fixed;
            color: #374151;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
            color: #1c1917 !important;
            font-weight: 700;
        }

        .text-muted {
            color: #6b7280 !important;
        }

        .text-light-sub {
            color: #4b5563 !important;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: #1c1917 !important;
            background: linear-gradient(135deg, #1c1917 0%, #d97706 50%, #2563eb 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero-banner {
            background: linear-gradient(135deg, #fffcf7 0%, #f9f0f5 50%, #eef5ff 100%);
            color: #1c1917;
            border-radius: 1.5rem;
            padding: 3rem 2.5rem;
            border: 1px solid #e7ded0;
            box-shadow: 0 10px 28px -6px rgba(180, 150, 120, 0.08);
            position: relative;
            overflow: hidden;
        }

        /* Cream Card & Glass Cards */
        .card, .glass-card {
            border: 1px solid #e7ded0 !important;
            border-radius: 1rem;
            background: linear-gradient(145deg, #ffffff 0%, #faf5ef 100%) !important;
            color: #374151 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 16px rgba(180, 150, 120, 0.06);
        }

        .product-card {
            border: 1px solid #e7ded0 !important;
            border-radius: 1.2rem;
            background: linear-gradient(145deg, #ffffff 0%, #fbf6f0 100%) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            overflow: hidden;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-4px);
            border-color: #2563eb !important;
            box-shadow: 0 12px 28px -6px rgba(37, 99, 235, 0.15);
        }

        .product-card img {
            height: 180px;
            object-fit: cover;
            width: 100%;
            transition: transform 0.5s ease;
        }

        .product-card:hover img {
            transform: scale(1.05);
        }

        /* Side-by-side / Vertical Sidebar Card elements */
        .sidebar-product-card {
            border: 1px solid #e7ded0 !important;
            border-radius: 0.9rem;
            background: linear-gradient(145deg, #ffffff 0%, #faf5ee 100%) !important;
            transition: all 0.2s ease;
        }

        .sidebar-product-card:hover {
            border-color: #2563eb !important;
            box-shadow: 0 6px 18px rgba(37, 99, 235, 0.14);
            transform: translateY(-2px);
        }

        .badge-category {
            font-size: 0.72rem;
            font-weight: 700;
            padding: 0.35em 0.75em;
            border-radius: 2rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .badge-gadget {
            background-color: #e0f2fe;
            color: #0284c7;
            border: 1px solid #bae6fd;
        }

        .badge-beauty {
            background-color: #fce7f3;
            color: #db2777;
            border: 1px solid #fbcfe8;
        }

        .btn-primary-custom {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            color: #ffffff !important;
            border: none;
            font-weight: 600;
            border-radius: 0.6rem;
            padding: 0.6rem 1.2rem;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28);
            transition: all 0.2s ease;
        }

        .btn-primary-custom:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #1e40af 100%);
            color: #ffffff !important;
            box-shadow: 0 6px 18px rgba(37, 99, 235, 0.38);
            transform: translateY(-1px);
        }

        .btn-accent {
            background: linear-gradient(135deg, #ec4899 0%, #db2777 100%);
            color: #ffffff !important;
            border: none;
            font-weight: 600;
            border-radius: 0.6rem;
            padding: 0.6rem 1.2rem;
            box-shadow: 0 4px 14px rgba(236, 72, 153, 0.28);
        }

        .btn-accent:hover {
            background: linear-gradient(135deg, #db2777 0%, #be185d 100%);
            color: #ffffff !important;
            box-shadow: 0 6px 18px rgba(236, 72, 153, 0.38);
        }

        /* Form Inputs Light Contrast */
        .form-control, .form-select {
            background-color: #faf6f0 !important;
            border: 1px solid #dfd6c8 !important;
            color: #1c1917 !important;
        }

        .form-control:focus, .form-select:focus {
            background-color: #ffffff !important;
            border-color: #2563eb !important;
            color: #1c1917 !important;
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15) !important;
        }

        .form-control::placeholder {
            color: #9ca3af !important;
        }

        .navbar-custom {
            background: rgba(247, 243, 237, 0.94) !important;
            backdrop-filter: blur(16px);
            border-bottom: 1px solid #e7ded0 !important;
        }

        .navbar-custom .nav-link {
            color: #374151 !important;
            font-weight: 500;
        }

        .navbar-custom .nav-link:hover, .navbar-custom .nav-link.active {
            color: #2563eb !important;
        }

        footer {
            margin-top: auto;
            background: linear-gradient(180deg, #f2ece3 0%, #ede6db 100%);
            border-top: 1px solid #e5dcd0;
            color: #6b7280;
        }

        footer h5, footer h6 {
            color: #1c1917 !important;
        }

        /* Horizontal Slider & Sidebar Cards */
        .horizontal-slider-wrapper {
            overflow-x: auto;
            scroll-behavior: smooth;
            scroll-snap-type: x mandatory;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .horizontal-slider-wrapper::-webkit-scrollbar {
            display: none;
        }

        .sidebar-slider-item {
            scroll-snap-align: start;
            flex: 0 0 calc((100% - 16px) / 3);
            min-width: 100px;
        }

        .hover-primary:hover {
            color: #2563eb !important;
        }

        .alert-success {
            background-color: #2563eb !important;
            color: #ffffff !important;
            border: none !important;
        }

        @keyframes toastSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
    </style>
    @yield('styles')
</head>
<body>

    <!-- Header Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light border-bottom sticky-top py-3 navbar-custom">
        <div class="container-fluid px-3 px-lg-4">
            <a class="navbar-brand d-flex align-items-center gap-2 me-lg-4" href="{{ route('shop.index') }}">
                @if($siteLogoUrl)
                    <img src="{{ $siteLogoUrl }}" alt="{{ $siteName }}" style="max-height: 38px; max-width: 160px; object-fit: contain;">
                @else
                    <img src="{{ $faviconUrl }}" alt="{{ $siteName }}" style="width: 32px; height: 32px; object-fit: contain;">
                @endif
                <span class="fw-bold text-dark">{{ $siteName }}</span>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <!-- Search Form -->
                <form action="{{ route('shop.index') }}" method="GET" class="d-flex me-auto my-2 my-lg-0 flex-grow-1" style="max-width: 480px;">
                    <div class="input-group w-100">
                        <input type="text" name="search" class="form-control border-end-0 shadow-sm" placeholder="Search gadgets, makeup, skincare..." value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary border-start-0 text-secondary bg-white" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                <ul class="navbar-nav ms-auto align-items-center gap-1">
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('shop.index') ? 'active text-primary' : '' }}" href="{{ route('shop.index') }}">
                            <i class="bi bi-shop me-1"></i> Store
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('blog.*') ? 'active text-primary' : '' }}" href="{{ route('blog.index') }}">
                            <i class="bi bi-journal-text me-1"></i> Blog
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('about.*') ? 'active text-primary' : '' }}" href="{{ route('about.index') }}">
                            <i class="bi bi-info-circle me-1"></i> About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-semibold {{ request()->routeIs('contact.*') ? 'active text-primary' : '' }}" href="{{ route('contact.index') }}">
                            <i class="bi bi-envelope me-1"></i> Contact
                        </a>
                    </li>
                    <li class="nav-item ms-lg-1">
                        <a href="{{ route('wishlist.index') }}" class="btn btn-outline-danger position-relative rounded-pill px-3 py-2 me-1">
                            <i class="bi bi-heart-fill me-1"></i> Wishlist
                            @if($wishlistCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $wishlistCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item ms-lg-1">
                        @php
                            $cartCount = count(session('cart', []));
                        @endphp
                        <a href="{{ route('cart.index') }}" class="btn btn-outline-dark position-relative rounded-pill px-3 py-2">
                            <i class="bi bi-cart3 me-1"></i> Cart
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Floating Toast Success Message -->
    @if(session('success'))
        <div id="toast-success-app" class="shadow-lg rounded-4 d-flex align-items-center text-white px-4 py-3" style="position: fixed; top: 24px; right: 24px; z-index: 99999; background-color: #2563eb; max-width: 450px; font-weight: 600; font-size: 1rem; box-shadow: 0 20px 25px -5px rgba(37, 99, 235, 0.35), 0 8px 10px -6px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.25); animation: toastSlideIn 0.35s cubic-bezier(0.16, 1, 0.3, 1);" role="alert">
            <i class="bi bi-check-circle-fill me-3 fs-4 text-white"></i>
            <div class="flex-grow-1 me-3 text-white">{{ session('success') }}</div>
            <button type="button" class="btn-close btn-close-white ms-auto" onclick="dismissAppToast()" aria-label="Close"></button>
        </div>
    @endif

    <!-- Flash Messages -->
    <div class="container mt-3">

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm d-flex align-items-center bg-dark text-danger border-danger" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                <div>{{ session('error') }}</div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-3 shadow-sm bg-dark text-danger border-danger" role="alert">
                <div class="d-flex align-items-center mb-1">
                    <i class="bi bi-exclamation-octagon-fill me-2 fs-5"></i>
                    <strong>Please check the form for errors:</strong>
                </div>
                <ul class="mb-0 ps-4 small">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <h5 class="brand-font text-dark mb-3 d-flex align-items-center gap-2">
                        <img src="{{ $faviconUrl }}" style="width: 24px; height: 24px; object-fit: contain;"> Gadget & Glow
                    </h5>
                    <p class="text-muted small me-md-4">
                        Your premier destination for high-tech smart gadgets and luxury women's cosmetics & skincare products. Quality guaranteed with instant fast delivery.
                    </p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-dark mb-3 fw-bold">Navigation & Links</h6>
                    <div class="row">
                        <div class="col-6">
                            <ul class="list-unstyled small">
                                <li class="mb-2"><a href="{{ route('shop.index') }}" class="text-muted text-decoration-none"><i class="bi bi-chevron-right me-1"></i> Storefront</a></li>
                                <li class="mb-2"><a href="{{ route('blog.index') }}" class="text-muted text-decoration-none"><i class="bi bi-chevron-right me-1"></i> Tech & Beauty Blog</a></li>
                                <li class="mb-2"><a href="{{ route('about.index') }}" class="text-muted text-decoration-none"><i class="bi bi-chevron-right me-1"></i> About Us</a></li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <ul class="list-unstyled small">
                                <li class="mb-2"><a href="{{ route('contact.index') }}" class="text-muted text-decoration-none"><i class="bi bi-chevron-right me-1"></i> Contact Us</a></li>
                                <li class="mb-2"><a href="{{ route('cart.index') }}" class="text-muted text-decoration-none"><i class="bi bi-chevron-right me-1"></i> View Cart</a></li>
                                <li class="mb-2"><a href="{{ route('wishlist.index') }}" class="text-muted text-decoration-none"><i class="bi bi-chevron-right me-1"></i> Wishlist</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6 class="text-dark mb-3 fw-bold">Customer Support</h6>
                    <p class="text-muted small mb-3">Questions about products or your order? Get in touch with our dedicated support team 24/7.</p>
                    <a href="{{ route('contact.index') }}" class="btn btn-outline-dark btn-sm rounded-pill px-3">Contact Support <i class="bi bi-arrow-right ms-1"></i></a>
                </div>
            </div>
            <hr class="border-secondary my-4 opacity-25">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-muted">
                <div>&copy; {{ date('Y') }} Gadget & Glow Store. Built with Laravel & Bootstrap 5.</div>
                <div class="mt-2 mt-md-0 d-flex gap-3">
                    <span class="badge bg-white border text-dark shadow-sm"><i class="bi bi-shield-check text-success me-1"></i> Secure Checkout</span>
                    <span class="badge bg-white border text-dark shadow-sm"><i class="bi bi-truck text-info me-1"></i> Fast Shipping</span>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function dismissAppToast() {
            var toast = document.getElementById('toast-success-app');
            if (toast) {
                toast.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-15px)';
                setTimeout(function() {
                    if (toast) toast.remove();
                }, 400);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var toast = document.getElementById('toast-success-app');
            if (toast) {
                setTimeout(function() {
                    dismissAppToast();
                }, 3500);
            }
        });
    </script>
    @yield('scripts')
</body>
</html>

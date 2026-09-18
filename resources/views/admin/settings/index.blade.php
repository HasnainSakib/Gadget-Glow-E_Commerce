@extends('layouts.admin')

@section('title', 'Logos & Site Settings - Admin Panel')
@section('header_title', 'Store Branding & Dynamic Logos Customization')

@section('content')
<div class="row g-4">

    <!-- Store Name & Main Website Logo Card -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="fw-bold mb-0 text-primary d-flex align-items-center gap-2">
                    <i class="bi bi-shop text-primary"></i> Store Name & Main Logo
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.settings.updateSiteInfo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="mb-4">
                        <label for="site_name" class="form-label fw-bold">Store Name / ওয়েবসাইটের নাম <span class="text-danger">*</span></label>
                        <input type="text" name="site_name" id="site_name" class="form-control rounded-3 p-2 fw-semibold" value="{{ old('site_name', $siteName) }}" required>
                    </div>

                    <div class="p-3 bg-light rounded-4 text-center mb-4 border border-dashed">
                        <label class="form-label fw-bold text-dark d-block mb-2">Current Active Website Logo</label>
                        <div class="d-inline-flex align-items-center justify-content-center p-3 bg-white rounded-3 shadow-sm mb-2" style="max-width: 220px; min-height: 70px;">
                            @if($siteLogoUrl)
                                <img src="{{ $siteLogoUrl }}" alt="Site Logo" style="max-height: 60px; max-width: 100%; object-fit: contain;">
                            @else
                                <span class="text-muted small">Default Favicon Icon Used</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Upload New Website Logo Image</label>
                        <input type="file" name="site_logo_file" class="form-control rounded-3 p-2" accept="image/*">
                        <small class="text-muted d-block mt-1">Recommended format: PNG or SVG with transparent background.</small>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Or Website Logo Image URL</label>
                        <input type="url" name="site_logo_url" class="form-control rounded-3 p-2" placeholder="https://example.com/logo.png">
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold flex-grow-1">
                            <i class="bi bi-check-circle me-1"></i> Save Store Name & Logo
                        </button>
                    </div>
                </form>

                @if($siteLogo)
                <form action="{{ route('admin.settings.resetLogo', 'site') }}" method="POST" class="mt-2" onsubmit="return confirm('Reset site logo back to default?');">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-outline-secondary rounded-pill w-100">Reset to Default Logo</button>
                </form>
                @endif
            </div>
        </div>
    </div>

    <!-- Mobile Banking Payment Logos Card (bKash, Nagad, Rocket) -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="fw-bold mb-0 text-dark d-flex align-items-center gap-2">
                    <i class="bi bi-wallet2 text-success"></i> Mobile Banking Logos (Checkout)
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.settings.updatePaymentLogos') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- bKash Logo Upload -->
                    <div class="p-3 border rounded-3 mb-3 bg-light">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <strong class="text-dark" style="color: #e2136e !important;">bKash (বিকাশ) Logo</strong>
                            <img src="{{ $bkashLogoUrl }}" alt="bKash Logo" class="rounded border p-1 bg-white" style="width: 48px; height: 48px; object-fit: contain;">
                        </div>
                        <input type="file" name="bkash_logo_file" class="form-control form-control-sm rounded-2 mb-1" accept="image/*">
                        <input type="url" name="bkash_logo_url" class="form-control form-control-sm rounded-2" placeholder="Or enter bKash logo image URL...">
                    </div>

                    <!-- Nagad Logo Upload -->
                    <div class="p-3 border rounded-3 mb-3 bg-light">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <strong class="text-dark" style="color: #f7921e !important;">Nagad (নগদ) Logo</strong>
                            <img src="{{ $nagadLogoUrl }}" alt="Nagad Logo" class="rounded border p-1 bg-white" style="width: 48px; height: 48px; object-fit: contain;">
                        </div>
                        <input type="file" name="nagad_logo_file" class="form-control form-control-sm rounded-2 mb-1" accept="image/*">
                        <input type="url" name="nagad_logo_url" class="form-control form-control-sm rounded-2" placeholder="Or enter Nagad logo image URL...">
                    </div>

                    <!-- Rocket Logo Upload -->
                    <div class="p-3 border rounded-3 mb-4 bg-light">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <strong class="text-dark" style="color: #8c3494 !important;">Rocket (রকেট) Logo</strong>
                            <img src="{{ $rocketLogoUrl }}" alt="Rocket Logo" class="rounded border p-1 bg-white" style="width: 48px; height: 48px; object-fit: contain;">
                        </div>
                        <input type="file" name="rocket_logo_file" class="form-control form-control-sm rounded-2 mb-1" accept="image/*">
                        <input type="url" name="rocket_logo_url" class="form-control form-control-sm rounded-2" placeholder="Or enter Rocket logo image URL...">
                    </div>

                    <button type="submit" class="btn btn-success rounded-pill w-100 py-2 fw-bold">
                        <i class="bi bi-upload me-1"></i> Update Payment Logos
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Store Favicon Card -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="fw-bold mb-0 text-warning d-flex align-items-center gap-2">
                    <i class="bi bi-star-fill text-warning"></i> Browser Tab Favicon
                </h5>
            </div>
            <div class="card-body p-4">
                <div class="d-flex align-items-center gap-3 mb-3 p-3 bg-light rounded-3 border">
                    <img src="{{ $faviconUrl }}" alt="Active Favicon" style="width: 40px; height: 40px; object-fit: contain;">
                    <div>
                        <strong class="text-dark d-block">Active Favicon</strong>
                        <small class="text-muted font-monospace">{{ $favicon }}</small>
                    </div>
                </div>

                <form action="{{ route('admin.settings.updateFavicon') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="file" name="favicon_file" class="form-control rounded-3 p-2" accept="image/*,.ico,.svg">
                    </div>
                    <button type="submit" class="btn btn-warning rounded-pill text-dark fw-bold w-100">
                        <i class="bi bi-upload me-1"></i> Update Favicon
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection

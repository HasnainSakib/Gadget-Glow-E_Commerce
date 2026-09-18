@extends('layouts.app')

@section('title', 'Tech & Beauty Blog - Gadget & Glow')

@section('content')
<div class="container py-4">
    <!-- Hero Banner -->
    <div class="hero-banner mb-5 text-center position-relative">
        <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill text-uppercase tracking-wider fw-bold">Gadget & Glow Journal</span>
        <h1 class="display-4 fw-bold mb-3 text-dark">Insights, Tech Reviews & Beauty Tips</h1>
        <p class="lead text-secondary mx-auto max-w-2xl mb-4" style="max-width: 700px;">
            Stay updated with the latest smart gadget trends, mechanical keyboard guides, and luxury skincare routines.
        </p>

        <!-- Search Bar -->
        <form action="{{ route('blog.index') }}" method="GET" class="d-flex justify-content-center mx-auto" style="max-width: 500px;">
            <div class="input-group shadow-sm rounded-pill overflow-hidden bg-white border p-1">
                <input type="text" name="search" class="form-control border-0 px-4 bg-transparent text-dark" placeholder="Search blog posts..." value="{{ request('search') }}">
                <button class="btn btn-primary-custom rounded-pill px-4" type="submit">
                    <i class="bi bi-search me-1"></i> Search
                </button>
            </div>
        </form>
    </div>

    <div class="row g-4">
        <!-- Main Blog Posts List -->
        <div class="col-lg-8">
            @if($posts->isEmpty())
                <div class="card border-0 shadow-sm rounded-4 text-center py-5 bg-white">
                    <div class="card-body">
                        <i class="bi bi-journal-x text-muted display-3 mb-3"></i>
                        <h4 class="fw-bold text-dark">No Blog Posts Found</h4>
                        <p class="text-muted mb-4">We couldn't find any articles matching your search query.</p>
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-primary rounded-pill px-4">View All Posts</a>
                    </div>
                </div>
            @else
                <div class="row g-4">
                    @foreach($posts as $post)
                        <div class="col-md-6">
                            <div class="card product-card border-0 shadow-sm rounded-4 h-100 d-flex flex-column bg-white">
                                <div class="position-relative overflow-hidden">
                                    <img src="{{ Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($post->image) }}" class="card-img-top" alt="{{ $post->title }}" style="height: 220px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Article</text></svg>';">
                                    <span class="position-absolute top-0 end-0 bg-white bg-opacity-90 text-dark small px-3 py-1 m-3 rounded-pill border shadow-sm">
                                        <i class="bi bi-eye me-1"></i> {{ $post->views }} views
                                    </span>
                                </div>
                                <div class="card-body d-flex flex-column p-4">
                                    <div class="d-flex align-items-center gap-2 text-muted small mb-2">
                                        <span><i class="bi bi-person-circle text-primary me-1"></i> {{ $post->author }}</span>
                                        <span>&bull;</span>
                                        <span><i class="bi bi-calendar3 me-1"></i> {{ $post->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <h5 class="card-title fw-bold mb-2">
                                        <a href="{{ route('blog.show', $post->slug) }}" class="text-dark text-decoration-none hover-primary">
                                            {{ $post->title }}
                                        </a>
                                    </h5>
                                    <p class="card-text text-muted small flex-grow-1 mb-4">
                                        {{ Str::limit($post->excerpt ?? strip_tags($post->content), 110) }}
                                    </p>
                                    <a href="{{ route('blog.show', $post->slug) }}" class="btn btn-outline-dark rounded-pill btn-sm align-self-start fw-semibold">
                                        Read Full Article <i class="bi bi-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $posts->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom"><i class="bi bi-fire text-danger me-2"></i> Recent Articles</h5>
                    <div class="d-flex flex-column gap-3">
                        @foreach($recentPosts as $recent)
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ Str::startsWith($recent->image, ['http://', 'https://']) ? $recent->image : asset($recent->image) }}" class="rounded-3 border" alt="{{ $recent->title }}" style="width: 65px; height: 65px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Article</text></svg>';">
                                <div>
                                    <h6 class="fw-bold mb-1 lh-sm">
                                        <a href="{{ route('blog.show', $recent->slug) }}" class="text-dark text-decoration-none small hover-primary">
                                            {{ Str::limit($recent->title, 45) }}
                                        </a>
                                    </h6>
                                    <span class="text-muted extra-small" style="font-size: 0.75rem;">
                                        <i class="bi bi-clock me-1"></i> {{ $recent->created_at->format('M d, Y') }}
                                    </span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Categories Banner Widget -->
            <div class="card border-0 rounded-4 shadow-sm text-dark bg-white border">
                <div class="card-body p-4 text-center">
                    <i class="bi bi-bag-check display-4 mb-3 d-block text-primary"></i>
                    <h5 class="fw-bold mb-2 text-dark">Shop Gadgets & Beauty</h5>
                    <p class="small opacity-90 mb-3 text-muted">Explore top trending products delivered fast across Bangladesh.</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary-custom rounded-pill px-4 fw-bold btn-sm">Explore Store</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

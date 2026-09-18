@extends('layouts.app')

@section('title', 'My Wishlist - Gadget & Glow')

@section('content')
<div class="container py-4">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h2 class="fw-bold mb-1 text-dark"><i class="bi bi-heart-fill text-danger me-2"></i>My Wishlist</h2>
            <p class="text-muted mb-0">Your saved products and items you are interested in.</p>
        </div>

        <a href="{{ route('shop.index') }}" class="btn btn-outline-dark rounded-pill px-4">
            <i class="bi bi-arrow-left me-1"></i> Continue Shopping
        </a>
    </div>

    @if($wishlists->count() > 0)
        <div class="row g-3 g-lg-4">
            @foreach($wishlists as $item)
                @if($item->product)
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="card product-card h-100 border-0 shadow-sm rounded-4 bg-white">
                        <div class="position-relative overflow-hidden" style="height: 190px;">
                            <a href="{{ route('shop.show', $item->product->slug) }}">
                                <img src="{{ $item->product->image }}" class="card-img-top h-100 w-100" alt="{{ $item->product->name }}" style="object-fit: cover;">
                            </a>
                            <div class="position-absolute top-0 end-0 m-2">
                                <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-light rounded-circle shadow-sm p-0 d-flex align-items-center justify-content-center text-danger" style="width: 32px; height: 32px;" title="Remove from Wishlist">
                                        <i class="bi bi-x-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column p-3">
                            <h6 class="card-title fw-bold text-dark mb-1 text-truncate" title="{{ $item->product->name }}">
                                <a href="{{ route('shop.show', $item->product->slug) }}" class="text-decoration-none text-dark hover-primary">
                                    {{ $item->product->name }}
                                </a>
                            </h6>
                            <div class="fw-bold text-primary mb-3">৳{{ number_format($item->product->price, 0) }}</div>

                            <div class="mt-auto d-flex gap-2">
                                <form action="{{ route('cart.buyNow', $item->product->id) }}" method="POST" class="w-100">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm w-100 rounded-pill fw-bold" style="background-color: #10b981; border: none;" {{ $item->product->stock <= 0 ? 'disabled' : '' }}>
                                        <i class="bi bi-lightning-fill me-1"></i> Buy Now
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @else
        <div class="text-center py-5 bg-white rounded-4 shadow-sm border my-4">
            <i class="bi bi-heart text-muted display-4 d-block mb-3"></i>
            <h4 class="fw-bold text-dark">Your Wishlist is Empty</h4>
            <p class="text-muted">You haven't saved any items to your wishlist yet.</p>
            <a href="{{ route('shop.index') }}" class="btn btn-primary-custom rounded-pill px-4">Explore Products</a>
        </div>
    @endif

</div>
@endsection

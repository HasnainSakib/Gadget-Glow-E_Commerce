@extends('layouts.admin')

@section('title', 'Stock Management - Admin')
@section('header_title', 'Category-Wise Stock Management')

@section('content')

<!-- Overview Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6">
        <div class="stat-card border-start border-4 border-primary">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fw-semibold small">TOTAL UNITS IN STOCK</span>
                <div class="stat-icon bg-primary-subtle text-primary">
                    <i class="bi bi-boxes"></i>
                </div>
            </div>
            <h3 class="fw-bold text-dark mb-0">{{ number_format($totalStock) }} Units</h3>
        </div>
    </div>

    <div class="col-md-6">
        <div class="stat-card border-start border-4 border-danger">
            <div class="d-flex align-items-center justify-content-between mb-1">
                <span class="text-muted fw-semibold small">LOW STOCK WARNINGS (≤ 5)</span>
                <div class="stat-icon bg-danger-subtle text-danger">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                </div>
            </div>
            <h3 class="fw-bold text-dark mb-0">{{ $lowStockCount }} Products</h3>
        </div>
    </div>
</div>

<div class="table-custom p-4">

    <!-- Category Filter Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1"><i class="bi bi-layers-fill text-primary me-2"></i>Category Inventory Levels</h5>
            <p class="text-muted small mb-0">Monitor and update inventory stock quantities by category.</p>
        </div>

        <div class="d-flex flex-wrap gap-2">
            <a href="{{ route('admin.stock.index') }}" class="btn btn-sm {{ !request('category') ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3 fw-bold">
                All Categories
            </a>
            @foreach($categories as $cat)
                <a href="{{ route('admin.stock.index', ['category' => $cat->slug]) }}" class="btn btn-sm {{ request('category') == $cat->slug ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">
                    {{ $cat->name }} ({{ $cat->products_count }})
                </a>
            @endforeach
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Product Details</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Current Stock</th>
                    <th class="text-end">Quick Update Stock</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                <img src="{{ $product->image }}" class="rounded border" style="width: 45px; height: 45px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\'><rect width=\'100%\' height=\'100%\' fill=\'%23e2e8f0\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'14\' fill=\'%2364748b\'>No Image</text></svg>';">
                                <div>
                                    <div class="fw-bold text-dark">{{ $product->name }}</div>
                                    <small class="text-muted">ID: #{{ $product->id }}</small>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="fw-bold">৳{{ number_format($product->price, 0) }}</td>
                        <td>
                            @if($product->stock <= 5)
                                <span class="badge bg-danger rounded-pill px-3 py-2 fs-6">
                                    <i class="bi bi-exclamation-circle me-1"></i> {{ $product->stock }} (Low)
                                </span>
                            @else
                                <span class="badge bg-success rounded-pill px-3 py-2 fs-6">
                                    <i class="bi bi-check-circle me-1"></i> {{ $product->stock }} Units
                                </span>
                            @endif
                        </td>
                        <td class="text-end">
                            <form action="{{ route('admin.stock.update', $product->id) }}" method="POST" class="d-inline-flex align-items-center gap-2">
                                @csrf
                                @method('PATCH')
                                <input type="number" name="stock" value="{{ $product->stock }}" min="0" class="form-control form-control-sm text-center fw-bold rounded-3" style="width: 85px;">
                                <button type="submit" class="btn btn-sm btn-primary rounded-pill px-3" title="Update Stock">
                                    Save
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No products found for this stock view.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection

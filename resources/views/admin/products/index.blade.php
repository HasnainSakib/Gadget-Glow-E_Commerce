@extends('layouts.admin')

@section('title', 'Manage Products - Admin')
@section('header_title', 'Products CRUD Management')

@section('content')
<div class="table-custom p-4">

    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1"><i class="bi bi-box-seam text-primary me-2"></i>Product Catalog CRUD</h5>
            <p class="text-muted small mb-0">Browse and edit products category by category.</p>
        </div>

        <div class="d-flex align-items-center gap-2">
            <a href="{{ route('admin.products.create', request('category') ? ['category' => request('category')] : []) }}" class="btn btn-primary rounded-pill px-3 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Add Product
            </a>
        </div>
    </div>

    <!-- Category Filter Tabs -->
    <div class="d-flex flex-wrap gap-2 mb-4 border-bottom pb-3">
        <a href="{{ route('admin.products.index') }}" class="btn btn-sm {{ !request('category') ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3 fw-bold">
            All Categories
        </a>
        @foreach($categories as $cat)
            <a href="{{ route('admin.products.index', ['category' => $cat->slug]) }}" class="btn btn-sm {{ request('category') == $cat->slug ? 'btn-primary' : 'btn-outline-secondary' }} rounded-pill px-3">
                @if($cat->slug == 'tech-gadgets')
                    <i class="bi bi-laptop me-1"></i>
                @else
                    <i class="bi bi-flower1 me-1"></i>
                @endif
                {{ $cat->name }} ({{ $cat->products_count }})
            </a>
        @endforeach
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Image</th>
                    <th>Product Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Featured</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr>
                        <td>
                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="rounded border" style="width: 50px; height: 50px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\'><rect width=\'100%\' height=\'100%\' fill=\'%23e2e8f0\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'14\' fill=\'%2364748b\'>No Image</text></svg>';">
                        </td>
                        <td>
                            <div class="fw-bold text-dark">{{ $product->name }}</div>
                            <small class="text-muted">Slug: {{ $product->slug }}</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-dark border">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="fw-bold text-success">৳{{ number_format($product->price, 0) }}</td>
                        <td>
                            @if($product->stock <= 5)
                                <span class="badge bg-danger">{{ $product->stock }} (Low)</span>
                            @else
                                <span class="badge bg-success">{{ $product->stock }}</span>
                            @endif
                        </td>
                        <td>
                            @if($product->is_featured)
                                <span class="badge bg-warning text-dark"><i class="bi bi-star-fill me-1"></i>Yes</span>
                            @else
                                <span class="text-muted small">No</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-secondary me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No products found for this category filter.</td>
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

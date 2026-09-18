@extends('layouts.admin')

@section('title', 'Manage Categories - Admin')
@section('header_title', 'Category CRUD Management')

@section('content')
<div class="table-custom p-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h5 class="fw-bold mb-0"><i class="bi bi-tags text-primary me-2"></i>Product Categories</h5>
        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary rounded-pill px-3">
            <i class="bi bi-plus-lg me-1"></i> Add Category
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light small text-uppercase">
                <tr>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Slug</th>
                    <th>Total Products</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $cat)
                    <tr>
                        <td>
                            @if($cat->image)
                                <img src="{{ $cat->image }}" class="rounded border" style="width: 45px; height: 45px; object-fit: cover;">
                            @else
                                <div class="bg-light rounded border text-center pt-2" style="width: 45px; height: 45px;"><i class="bi bi-image text-muted"></i></div>
                            @endif
                        </td>
                        <td class="fw-bold text-dark">{{ $cat->name }}</td>
                        <td class="text-muted">{{ $cat->slug }}</td>
                        <td>
                            <span class="badge bg-primary rounded-pill">{{ $cat->products_count }} Products</span>
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-sm btn-outline-secondary me-1">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">No categories created yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection

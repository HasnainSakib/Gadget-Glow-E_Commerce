@extends('layouts.admin')

@section('title', 'Add New Product - Admin')
@section('header_title', 'Create Product')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">

    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h5 class="fw-bold mb-0">Product Information Form</h5>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
            <i class="bi bi-arrow-left me-1"></i> Back to Products
        </a>
    </div>

    <form action="{{ route('admin.products.store') }}" method="POST">
        @csrf

        <div class="row g-3 mb-3">
            <div class="col-md-8">
                <label for="name" class="form-label fw-semibold">Product Name <span class="text-danger">*</span></label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="e.g. Wireless ANC Earbuds" required>
                @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-4">
                <label for="category_id" class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                <select name="category_id" id="category_id" class="form-select @error('category_id') is-invalid @enderror" required>
                    <option value="">-- Select Category --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ old('category_id', $selectedCategoryId ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="price" class="form-label fw-semibold">Price (৳ BDT) <span class="text-danger">*</span></label>
                <input type="number" step="1" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" placeholder="1250" required>
                @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="col-md-6">
                <label for="stock" class="form-label fw-semibold">Stock Quantity <span class="text-danger">*</span></label>
                <input type="number" name="stock" id="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', 10) }}" placeholder="10" required>
                @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label fw-semibold">Image URL <span class="text-danger">*</span></label>
            <input type="url" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}" placeholder="https://images.unsplash.com/photo-..." required>
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label fw-semibold">Description <span class="text-danger">*</span></label>
            <textarea name="description" id="description" rows="4" class="form-control @error('description') is-invalid @enderror" placeholder="Enter product highlights, features, specifications..." required>{{ old('description') }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="is_featured" id="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
            <label class="form-check-label fw-semibold text-dark" for="is_featured">
                Feature on Storefront Homepage
            </label>
        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">
            <i class="bi bi-check-circle me-1"></i> Save Product
        </button>
    </form>

</div>
@endsection

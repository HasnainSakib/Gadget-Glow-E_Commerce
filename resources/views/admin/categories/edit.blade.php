@extends('layouts.admin')

@section('title', 'Edit Category - Admin')
@section('header_title', 'Edit Category')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">

    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <h5 class="fw-bold mb-0">Edit Category #{{ $category->id }}</h5>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
            <i class="bi bi-arrow-left me-1"></i> Back to Categories
        </a>
    </div>

    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Category Name <span class="text-danger">*</span></label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $category->name) }}" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label fw-semibold">Category Image URL</label>
            <input type="url" name="image" id="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image', $category->image) }}">
            @error('image') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="form-label fw-semibold">Description</label>
            <textarea name="description" id="description" rows="3" class="form-control @error('description') is-invalid @enderror">{{ old('description', $category->description) }}</textarea>
            @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow">
            <i class="bi bi-check-circle me-1"></i> Update Category
        </button>
    </form>

</div>
@endsection

@extends('layouts.admin')

@section('title', 'Create Blog Post - Admin Panel')
@section('header_title', 'Create New Blog Article')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary rounded-pill btn-sm">
        <i class="bi bi-arrow-left me-1"></i> Back to Blog List
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4 p-md-5">
        <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="form-label fw-bold">Article Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control form-control-lg rounded-3" placeholder="e.g. Top 10 Smart Watch Features to Look For" value="{{ old('title') }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Short Excerpt / Summary</label>
                        <textarea name="excerpt" rows="3" class="form-control rounded-3" placeholder="Brief summary of the article for list preview">{{ old('excerpt') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Full Article Content (HTML allowed) <span class="text-danger">*</span></label>
                        <textarea name="content" rows="12" class="form-control rounded-3" placeholder="<p>Write your detailed article content here...</p>" required>{{ old('content') }}</textarea>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card bg-light border-0 rounded-4 p-3 mb-4">
                        <h6 class="fw-bold mb-3"><i class="bi bi-image me-1"></i> Featured Article Image</h6>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Upload Image File</label>
                            <input type="file" name="image_file" class="form-control form-control-sm rounded-3">
                            <small class="text-muted">Supports PNG, JPG, WEBP (Max 4MB)</small>
                        </div>

                        <div class="text-center text-muted small my-2">&mdash; OR &mdash;</div>

                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Image URL</label>
                            <input type="url" name="image_url" class="form-control form-control-sm rounded-3" placeholder="https://images.unsplash.com/..." value="{{ old('image_url') }}">
                        </div>
                    </div>

                    <div class="card bg-light border-0 rounded-4 p-3 mb-4">
                        <h6 class="fw-bold mb-3"><i class="bi bi-person-gear me-1"></i> Article Meta</h6>
                        
                        <div class="mb-3">
                            <label class="form-label small fw-semibold">Author Name <span class="text-danger">*</span></label>
                            <input type="text" name="author" class="form-control rounded-3" value="{{ old('author', 'Gadget & Glow Team') }}" required>
                        </div>

                        <div class="form-check form-switch mt-3">
                            <input class="form-check-input" type="checkbox" name="is_published" id="is_published" value="1" checked>
                            <label class="form-check-label fw-bold text-dark" for="is_published">Publish Immediately</label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill w-100 py-3 fw-bold">
                        <i class="bi bi-cloud-upload-fill me-1"></i> Save & Publish Post
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

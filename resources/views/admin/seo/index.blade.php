@extends('layouts.admin')

@section('title', 'SEO Settings Management - Admin')
@section('header_title', 'SEO & Meta Tag Settings')

@section('content')
<div class="row g-4">
    <div class="col-12">
        <div class="card border-0 shadow-sm rounded-4 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h5 class="fw-bold mb-1"><i class="bi bi-search text-primary me-2"></i>Page Meta Titles & Descriptions</h5>
                    <p class="text-muted small mb-0">Manage Search Engine Optimization (SEO) metadata for each public page.</p>
                </div>
            </div>

            <div class="accordion" id="seoAccordion">
                @foreach($seoSettings as $index => $seo)
                    <div class="accordion-item border rounded-3 mb-3 overflow-hidden shadow-sm">
                        <h2 class="accordion-header" id="heading{{ $seo->id }}">
                            <button class="accordion-button fw-bold {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $seo->id }}" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $seo->id }}">
                                <i class="bi bi-globe me-2 text-primary"></i> {{ $seo->page_name }} (Page: {{ strtoupper($seo->page_key) }})
                            </button>
                        </h2>
                        <div id="collapse{{ $seo->id }}" class="accordion-collapse collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $seo->id }}" data-bs-parent="#seoAccordion">
                            <div class="accordion-body p-4 bg-light">
                                <form action="{{ route('admin.seo.update', $seo->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="meta_title_{{ $seo->id }}" class="form-label fw-semibold">Meta Title <span class="text-danger">*</span></label>
                                        <input type="text" name="meta_title" id="meta_title_{{ $seo->id }}" class="form-control bg-white" value="{{ old('meta_title', $seo->meta_title) }}" required>
                                        <div class="form-text small">Appears as the page title in search engine results and browser tabs.</div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="meta_description_{{ $seo->id }}" class="form-label fw-semibold">Meta Description <span class="text-danger">*</span></label>
                                        <textarea name="meta_description" id="meta_description_{{ $seo->id }}" rows="3" class="form-control bg-white" required>{{ old('meta_description', $seo->meta_description) }}</textarea>
                                        <div class="form-text small">Summary snippet displayed below the title in search result listings.</div>
                                    </div>

                                    <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                                        <i class="bi bi-check-circle me-1"></i> Update SEO for {{ $seo->page_name }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection

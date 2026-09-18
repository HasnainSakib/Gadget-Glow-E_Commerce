@extends('layouts.admin')

@section('title', 'Manage Contact Page - Admin Panel')
@section('header_title', 'Contact Us Settings & Messages')

@section('content')
<div class="row g-4">
    <!-- Contact Info Settings Form -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 border-0">
                <h5 class="fw-bold mb-0 text-primary"><i class="bi bi-gear-fill me-2"></i> Edit Contact Page Details</h5>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.contact.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Page Title <span class="text-danger">*</span></label>
                        <input type="text" name="page_title" class="form-control rounded-3" value="{{ old('page_title', $contact->page_title) }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Hero Description Text</label>
                        <textarea name="hero_text" rows="2" class="form-control rounded-3">{{ old('hero_text', $contact->hero_text) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Physical Office Address <span class="text-danger">*</span></label>
                        <textarea name="address" rows="2" class="form-control rounded-3" required>{{ old('address', $contact->address) }}</textarea>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Contact Phone Number <span class="text-danger">*</span></label>
                            <input type="text" name="phone" class="form-control rounded-3" value="{{ old('phone', $contact->phone) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Official Email <span class="text-danger">*</span></label>
                            <input type="email" name="email" class="form-control rounded-3" value="{{ old('email', $contact->email) }}" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Support Working Hours</label>
                        <input type="text" name="support_hours" class="form-control rounded-3" value="{{ old('support_hours', $contact->support_hours) }}">
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Google Maps Embed Iframe URL</label>
                        <textarea name="map_iframe" rows="3" class="form-control rounded-3" placeholder="https://www.google.com/maps/embed?...">{{ old('map_iframe', $contact->map_iframe) }}</textarea>
                        <small class="text-muted">Paste src link from Google Maps embed iframe</small>
                    </div>

                    <button type="submit" class="btn btn-primary rounded-pill px-4 py-2 fw-bold w-100">
                        <i class="bi bi-save me-1"></i> Update Contact Page
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Customer Messages List -->
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm rounded-4 h-100">
            <div class="card-header bg-white py-3 border-0 d-flex justify-content-between align-items-center">
                <h5 class="fw-bold mb-0 text-dark"><i class="bi bi-chat-left-text-fill me-2 text-indigo"></i> Customer Messages</h5>
                <span class="badge bg-indigo rounded-pill px-3 py-2">{{ $messages->total() }} Total</span>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="ps-3">Sender</th>
                                <th>Subject & Message</th>
                                <th>Date</th>
                                <th class="pe-3 text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($messages as $msg)
                                <tr>
                                    <td class="ps-3">
                                        <div class="fw-bold text-dark">{{ $msg->name }}</div>
                                        <small class="text-muted d-block">{{ $msg->email }}</small>
                                        @if($msg->phone)
                                            <small class="text-muted"><i class="bi bi-telephone"></i> {{ $msg->phone }}</small>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="fw-bold text-primary small">{{ $msg->subject }}</div>
                                        <p class="text-secondary small mb-0" style="max-width: 250px;">{{ Str::limit($msg->message, 80) }}</p>
                                    </td>
                                    <td>
                                        <small class="text-muted">{{ $msg->created_at->format('M d, H:i') }}</small>
                                    </td>
                                    <td class="pe-3 text-end">
                                        <form action="{{ route('admin.contact.deleteMessage', $msg->id) }}" method="POST" onsubmit="return confirm('Delete customer message?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle" title="Delete Message">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">
                                        <i class="bi bi-inbox display-4 d-block mb-2"></i>
                                        No customer messages received yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($messages->hasPages())
                <div class="card-footer bg-white p-3 border-0 d-flex justify-content-center">
                    {{ $messages->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

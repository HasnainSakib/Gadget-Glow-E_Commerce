<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Gadget & Glow</title>
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Outfit:wght@600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e1b4b 50%, #0f172a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f8fafc;
            padding: 20px;
        }

        .login-card {
            background: rgba(30, 41, 59, 0.75);
            backdrop-filter: blur(16px);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 1.25rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
            width: 100%;
            max-width: 440px;
            padding: 2.5rem;
        }

        .brand-title {
            font-family: 'Outfit', sans-serif;
            font-weight: 800;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 50%, #ec4899 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .form-control {
            background: rgba(15, 23, 42, 0.6) !important;
            border: 1px solid rgba(255, 255, 255, 0.15) !important;
            color: #ffffff !important;
            padding: 0.75rem 1rem;
            border-radius: 0.75rem;
        }

        .form-control:focus {
            border-color: #6366f1 !important;
            box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25) !important;
        }

        .form-control::placeholder {
            color: #94a3b8 !important;
        }

        .btn-login {
            background: linear-gradient(135deg, #4f46e5 0%, #4338ca 100%);
            border: none;
            color: #ffffff;
            font-weight: 700;
            padding: 0.8rem 1.5rem;
            border-radius: 0.75rem;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.4);
            transition: all 0.25s ease;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #4338ca 0%, #3730a3 100%);
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.5);
            transform: translateY(-2px);
        }
    </style>
</head>
<body>

    <div class="login-card text-center">
        <div class="mb-4">
            <div class="d-inline-flex align-items-center justify-content-center bg-indigo text-white rounded-circle p-3 shadow mb-3" style="width: 64px; height: 64px; background: rgba(99, 102, 241, 0.15); border: 1px solid rgba(99, 102, 241, 0.3);">
                <i class="bi bi-shield-lock-fill fs-2 text-warning"></i>
            </div>
            <h3 class="brand-title mb-1">Gadget & Glow</h3>
            <p class="text-slate-400 small mb-0">Admin Portal Authentication</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger border-0 rounded-3 p-3 mb-4 text-start small" style="background: rgba(239, 68, 68, 0.15); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.3) !important;">
                <i class="bi bi-exclamation-triangle-fill me-1"></i> {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success border-0 rounded-3 p-3 mb-4 text-start small text-white" style="background-color: #2563eb !important; color: #ffffff !important; font-weight: 600;">
                <i class="bi bi-check-circle-fill me-1 text-white"></i> {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST" class="text-start">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label text-slate-300 small fw-semibold">Admin Username or Email / ইউজার নেম বা ইমেইল</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0 text-slate-400" style="border: 1px solid rgba(255, 255, 255, 0.15);"><i class="bi bi-person-fill"></i></span>
                    <input type="text" name="login" id="login" class="form-control ps-2" placeholder="admin@gadgetglow.com" value="{{ old('login', 'admin@gadgetglow.com') }}" required autofocus>
                </div>
            </div>

            <div class="mb-4">
                <label for="password" class="form-label text-slate-300 small fw-semibold">Password / পাসওয়ার্ড</label>
                <div class="input-group">
                    <span class="input-group-text bg-transparent border-end-0 text-slate-400" style="border: 1px solid rgba(255, 255, 255, 0.15);"><i class="bi bi-key-fill"></i></span>
                    <input type="password" name="password" id="password" class="form-control ps-2" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn btn-login w-100 py-3 fs-6">
                <i class="bi bi-box-arrow-in-right me-1"></i> Access Admin Dashboard
            </button>
        </form>

        <div class="mt-4 pt-3 border-top border-slate-700 text-slate-400 extra-small">
            <i class="bi bi-info-circle me-1"></i> Demo Credentials: <code>admin@gadgetglow.com</code> / <code>admin123</code>
        </div>
    </div>

</body>
</html>

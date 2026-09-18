<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title', 'Admin Dashboard - Gadget & Glow'); ?></title>
    <!-- Favicon -->
    <link rel="icon" href="<?php echo e($faviconUrl); ?>">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --admin-sidebar-bg: #ede7db;
            --admin-main-bg: #f7f3ed;
            --primary-accent: #2563eb;
            --text-heading: #1c1917;
            --text-body: #374151;
            --text-sub: #6b7280;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #f7f3ed;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(236, 72, 153, 0.05) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(37, 99, 235, 0.06) 0%, transparent 40%),
                linear-gradient(135deg, #f8f4ee 0%, #f4eee7 50%, #f1eae0 100%);
            background-attachment: fixed;
            color: #374151;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6, .brand-font {
            font-family: 'Outfit', sans-serif;
            color: #1c1917;
        }

        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, #ede7db 0%, #e7decb 100%);
            border-right: 1px solid #e2d8c6;
            color: #374151;
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s;
        }

        .sidebar .nav-link {
            color: #4b5563;
            padding: 0.75rem 1.2rem;
            font-weight: 500;
            border-radius: 0.6rem;
            margin: 0.15rem 0.8rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover {
            color: #1c1917;
            background-color: #e2d8c6;
        }

        .sidebar .nav-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.28);
        }

        .main-content {
            margin-left: 260px;
            padding: 2rem;
            background: transparent;
            min-height: 100vh;
        }

        /* Top Admin Header Bar */
        .admin-top-bar {
            background: linear-gradient(145deg, #ffffff 0%, #faf5ee 100%);
            color: #1c1917;
            border: 1px solid #e7ded0;
            border-radius: 1rem;
            padding: 1.25rem 1.75rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 18px rgba(180, 150, 120, 0.06);
        }

        .admin-top-bar h3 {
            color: #1c1917 !important;
        }

        .admin-top-bar p {
            color: #6b7280 !important;
        }

        /* Cards & Stat Containers */
        .card, .table-custom, .stat-card {
            background: linear-gradient(145deg, #ffffff 0%, #faf5ef 100%) !important;
            border: 1px solid #e7ded0 !important;
            border-radius: 1rem !important;
            color: #374151 !important;
            box-shadow: 0 4px 16px rgba(180, 150, 120, 0.05) !important;
        }

        .stat-card {
            padding: 1.5rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        /* Tables Contrast Overrides */
        .table {
            color: #374151 !important;
            background-color: transparent !important;
        }

        .table thead th, .table-light th {
            background-color: #f3ece1 !important;
            color: #1c1917 !important;
            font-weight: 700 !important;
            border-bottom: 2px solid #e5dcd0 !important;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }

        .table tbody td {
            color: #374151 !important;
            border-bottom: 1px solid #ede6db !important;
            vertical-align: middle;
        }

        .table-hover tbody tr:hover {
            background-color: #f7f2ea !important;
            color: #1c1917 !important;
        }

        .list-group-item {
            background-color: #ffffff !important;
            color: #374151 !important;
            border-color: #e5dfd4 !important;
        }

        /* Explicit Contrast Utilities for Admin */
        .text-dark {
            color: #1c1917 !important;
        }

        .alert-success {
            background-color: #2563eb !important;
            color: #ffffff !important;
            border: none !important;
        }

        @keyframes toastSlideIn {
            from {
                opacity: 0;
                transform: translateY(-20px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .text-muted {
            color: #6b7280 !important;
        }

        .text-secondary {
            color: #4b5563 !important;
        }

        .form-label, label {
            color: #1c1917 !important;
            font-weight: 600;
        }

        /* Inputs & Form Controls */
        .form-control, .form-select, textarea {
            background-color: #ffffff !important;
            border: 1px solid #d6cfc4 !important;
            color: #1c1917 !important;
            border-radius: 0.6rem;
        }

        .form-control:focus, .form-select:focus, textarea:focus {
            background-color: #ffffff !important;
            border-color: #2563eb !important;
            color: #1c1917 !important;
            box-shadow: 0 0 0 0.25rem rgba(37, 99, 235, 0.15) !important;
        }

        .form-control::placeholder {
            color: #9ca3af !important;
        }
    </style>
    <?php echo $__env->yieldContent('styles'); ?>
</head>
<body>

    <!-- Admin Sidebar -->
    <aside class="sidebar d-flex flex-column py-3">
        <div class="px-4 mb-3">
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="text-dark text-decoration-none d-flex align-items-center gap-2">
                <img src="<?php echo e($faviconUrl); ?>" style="width: 28px; height: 28px; object-fit: contain;">
                <span class="brand-font fs-5 fw-bold text-dark">Admin Portal</span>
            </a>
            <span class="badge bg-warning-subtle text-warning-emphasis border border-warning-subtle mt-1">Gadget & Glow Cream</span>
        </div>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="<?php echo e(route('admin.dashboard')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                    <i class="bi bi-grid-1x2-fill"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.products.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.products.*') ? 'active' : ''); ?>">
                    <i class="bi bi-box-seam-fill"></i> Products CRUD
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.categories.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.categories.*') ? 'active' : ''); ?>">
                    <i class="bi bi-tags-fill"></i> Categories
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.posts.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.posts.*') ? 'active' : ''); ?>">
                    <i class="bi bi-journal-text"></i> Blog Articles
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.about.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.about.*') ? 'active' : ''); ?>">
                    <i class="bi bi-info-circle-fill"></i> About Us Page
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.contact.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.contact.*') ? 'active' : ''); ?>">
                    <i class="bi bi-envelope-paper-fill"></i> Contact & Messages
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.settings.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.settings.*') ? 'active' : ''); ?>">
                    <i class="bi bi-gear-fill text-warning"></i> Logos & Settings
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.stock.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.stock.*') ? 'active' : ''); ?>">
                    <i class="bi bi-boxes"></i> Stock Management
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.seo.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.seo.*') ? 'active' : ''); ?>">
                    <i class="bi bi-search"></i> SEO Settings
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.orders.index') || request()->routeIs('admin.orders.show') ? 'active' : ''); ?>">
                    <i class="bi bi-receipt"></i> Orders & Sales
                </a>
            </li>
            <li class="nav-item">
                <?php
                    $trashedOrdersCount = \App\Models\Order::onlyTrashed()->count();
                ?>
                <a href="<?php echo e(route('admin.orders.bin')); ?>" class="nav-link d-flex align-items-center justify-content-between <?php echo e(request()->routeIs('admin.orders.bin') ? 'active' : ''); ?>">
                    <span><i class="bi bi-trash3-fill text-danger me-2"></i> Order Bin (Trash)</span>
                    <?php if($trashedOrdersCount > 0): ?>
                        <span class="badge bg-danger rounded-pill"><?php echo e($trashedOrdersCount); ?></span>
                    <?php endif; ?>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo e(route('admin.wishlists.index')); ?>" class="nav-link <?php echo e(request()->routeIs('admin.wishlists.*') ? 'active' : ''); ?>">
                    <i class="bi bi-heart-fill text-danger"></i> Customer Wishlists
                </a>
            </li>
        </ul>

    </aside>

    <!-- Main Content Area -->
    <main class="main-content">
        <!-- Top Nav -->
        <header class="admin-top-bar d-flex justify-content-between align-items-center mb-4">
            <div>
                <h3 class="fw-bold mb-0 text-dark"><?php echo $__env->yieldContent('header_title', 'Dashboard Overview'); ?></h3>
                <p class="small mb-0 text-muted">Manage your online store operations</p>
            </div>
            
            <div class="d-flex align-items-center gap-3">
                <?php if (! empty(trim($__env->yieldContent('header_actions')))): ?>
                    <div>
                        <?php echo $__env->yieldContent('header_actions'); ?>
                    </div>
                <?php endif; ?>

                <!-- Notification Bell Dropdown -->
                <div class="dropdown">
                    <button class="btn btn-light border position-relative rounded-circle p-2 shadow-sm d-flex align-items-center justify-content-center" 
                            type="button" 
                            id="adminNotificationDropdown" 
                            data-bs-toggle="dropdown" 
                            aria-expanded="false" 
                            style="width: 44px; height: 44px; background: #ffffff;">
                        <i class="bi bi-bell-fill fs-5 text-dark"></i>
                        <?php if(($unreadNotificationsCount ?? 0) > 0): ?>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border border-light" style="font-size: 0.7rem; padding: 0.35em 0.55em;">
                                <?php echo e($unreadNotificationsCount); ?>

                                <span class="visually-hidden">unread notifications</span>
                            </span>
                        <?php endif; ?>
                    </button>
                    
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg p-0 mt-2 rounded-4" 
                         aria-labelledby="adminNotificationDropdown" 
                         style="width: 340px; max-height: 480px; overflow-y: auto;">
                        <div class="p-3 border-bottom d-flex justify-content-between align-items-center bg-light rounded-top-4">
                            <div>
                                <h6 class="fw-bold mb-0 text-dark"><i class="bi bi-bell me-1"></i> Notifications</h6>
                                <small class="text-muted"><?php echo e($unreadNotificationsCount ?? 0); ?> unread items</small>
                            </div>
                            <?php if(($unreadNotificationsCount ?? 0) > 0): ?>
                                <form action="<?php echo e(route('admin.notifications.markAllRead')); ?>" method="POST" class="m-0">
                                    <?php echo csrf_field(); ?>
                                    <button type="submit" class="btn btn-link btn-sm text-decoration-none p-0 text-primary fw-semibold" style="font-size: 0.8rem;">
                                        Mark all as read
                                    </button>
                                </form>
                            <?php endif; ?>
                        </div>

                        <div class="list-group list-group-flush">
                            <?php $__empty_1 = true; $__currentLoopData = ($adminNotifications ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notif): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <a href="<?php echo e($notif->read_url); ?>" class="list-group-item list-group-item-action p-3 d-flex align-items-start gap-3 border-bottom text-decoration-none">
                                    <div class="rounded-circle p-2 d-flex align-items-center justify-content-center shrink-0 <?php echo e($notif->icon_bg); ?>" style="width: 38px; height: 38px;">
                                        <i class="bi <?php echo e($notif->icon); ?> fs-6"></i>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden">
                                        <div class="d-flex justify-content-between align-items-center mb-1">
                                            <strong class="text-dark small text-truncate d-block mb-0"><?php echo e($notif->title); ?></strong>
                                            <small class="text-muted" style="font-size: 0.7rem;"><?php echo e($notif->created_at ? $notif->created_at->diffForHumans() : ''); ?></small>
                                        </div>
                                        <p class="text-secondary small mb-0 text-truncate" style="font-size: 0.8rem;"><?php echo e($notif->subtitle); ?></p>
                                    </div>
                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <div class="text-center py-4 text-muted">
                                    <i class="bi bi-bell-slash display-6 d-block mb-2 text-secondary opacity-50"></i>
                                    <span class="small fw-semibold">No new notifications</span>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="p-2 text-center bg-light border-top rounded-bottom-4">
                            <a href="<?php echo e(route('admin.orders.index')); ?>" class="small text-decoration-none text-primary fw-semibold">View All Orders</a>
                            <span class="text-muted mx-1">•</span>
                            <a href="<?php echo e(route('admin.contact.index')); ?>" class="small text-decoration-none text-primary fw-semibold">View Messages</a>
                        </div>
                    </div>
                </div>

                <!-- Admin Logout Form -->
                <form action="<?php echo e(route('admin.logout')); ?>" method="POST" class="d-inline">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3 py-2 fw-semibold d-flex align-items-center gap-1 shadow-sm" title="Logout of Admin Panel">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </header>

        <!-- Floating Toast Success Message -->
        <?php if(session('success')): ?>
            <div id="toast-success-admin" class="shadow-lg rounded-4 d-flex align-items-center text-white px-4 py-3" style="position: fixed; top: 24px; right: 24px; z-index: 99999; background-color: #2563eb; max-width: 450px; font-weight: 600; font-size: 1rem; box-shadow: 0 20px 25px -5px rgba(37, 99, 235, 0.35), 0 8px 10px -6px rgba(0, 0, 0, 0.1); border: 1px solid rgba(255, 255, 255, 0.25); animation: toastSlideIn 0.35s cubic-bezier(0.16, 1, 0.3, 1);" role="alert">
                <i class="bi bi-check-circle-fill me-3 fs-4 text-white"></i>
                <div class="flex-grow-1 me-3 text-white"><?php echo e(session('success')); ?></div>
                <button type="button" class="btn-close btn-close-white ms-auto" onclick="dismissAdminToast()" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </main>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function dismissAdminToast() {
            var toast = document.getElementById('toast-success-admin');
            if (toast) {
                toast.style.transition = 'opacity 0.4s ease, transform 0.4s ease';
                toast.style.opacity = '0';
                toast.style.transform = 'translateY(-15px)';
                setTimeout(function() {
                    if (toast) toast.remove();
                }, 400);
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            var toast = document.getElementById('toast-success-admin');
            if (toast) {
                setTimeout(function() {
                    dismissAdminToast();
                }, 3500);
            }
        });
    </script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/layouts/admin.blade.php ENDPATH**/ ?>
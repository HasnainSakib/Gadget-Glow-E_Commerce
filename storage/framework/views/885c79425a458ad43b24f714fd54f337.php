<?php $__env->startSection('title', 'About Us - Gadget & Glow'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <!-- Hero Banner -->
    <div class="hero-banner mb-5 text-center position-relative">
        <span class="badge bg-primary-subtle text-primary mb-2 px-3 py-2 rounded-pill text-uppercase tracking-wider fw-bold">Who We Are</span>
        <h1 class="display-4 fw-bold mb-3 text-dark"><?php echo e($about->hero_title); ?></h1>
        <p class="lead text-secondary mx-auto max-w-2xl" style="max-width: 750px;">
            <?php echo e($about->hero_subtitle); ?>

        </p>
    </div>

    <!-- About Image + Story Section -->
    <div class="row align-items-center g-5 mb-5">
        <div class="col-lg-6">
            <div class="position-relative">
                <img src="<?php echo e(Str::startsWith($about->hero_image, ['http://', 'https://']) ? $about->hero_image : asset($about->hero_image)); ?>" alt="About Gadget & Glow" class="img-fluid rounded-4 shadow-sm w-100 border" style="min-height: 380px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>About Us</text></svg>';">
                <div class="position-absolute bottom-0 start-0 bg-white text-dark shadow-sm p-3 rounded-4 m-3 d-flex align-items-center gap-3 border" style="max-width: 280px;">
                    <div class="bg-primary p-3 rounded-3 text-white fs-3">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-0 text-dark">100% Authentic</h6>
                        <small class="text-muted">Guaranteed genuine products</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="ps-lg-3">
                <span class="badge bg-primary text-white fw-bold px-3 py-2 rounded-pill mb-2">Our Story</span>
                <h2 class="fw-bold display-6 mb-3 text-dark brand-font"><?php echo e($about->story_title); ?></h2>
                <div class="text-muted leading-relaxed mb-4">
                    <?php echo $about->story_content; ?>

                </div>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 shadow-sm border bg-white">
                            <i class="bi bi-truck fs-3 text-primary mb-2 d-block"></i>
                            <h6 class="fw-bold mb-1 text-dark">Fast Delivery</h6>
                            <small class="text-muted">Swift shipping across all 64 districts in Bangladesh.</small>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 shadow-sm border bg-white">
                            <i class="bi bi-headset fs-3 text-danger mb-2 d-block"></i>
                            <h6 class="fw-bold mb-1 text-dark">24/7 Assistance</h6>
                            <small class="text-muted">Responsive customer care ready to answer your inquiries.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Counter Grid -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5 bg-white border">
        <div class="card-body p-5">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-primary mb-1"><?php echo e($about->stat_1_number); ?></h2>
                    <p class="text-muted mb-0 fw-semibold"><?php echo e($about->stat_1_label); ?></p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-danger mb-1"><?php echo e($about->stat_2_number); ?></h2>
                    <p class="text-muted mb-0 fw-semibold"><?php echo e($about->stat_2_label); ?></p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-warning mb-1"><?php echo e($about->stat_3_number); ?></h2>
                    <p class="text-muted mb-0 fw-semibold"><?php echo e($about->stat_3_label); ?></p>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="display-5 fw-bold text-info mb-1"><?php echo e($about->stat_4_number); ?></h2>
                    <p class="text-muted mb-0 fw-semibold"><?php echo e($about->stat_4_label); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mission & Vision Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 bg-white border">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="rounded-circle bg-primary bg-opacity-10 p-3 text-primary fs-3">
                        <i class="bi bi-compass"></i>
                    </div>
                    <h4 class="fw-bold mb-0 text-dark brand-font">Our Mission</h4>
                </div>
                <p class="text-muted leading-relaxed mb-0">
                    <?php echo e($about->mission); ?>

                </p>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4 h-100 p-4 bg-white border">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div class="rounded-circle bg-danger bg-opacity-10 p-3 text-danger fs-3">
                        <i class="bi bi-eye"></i>
                    </div>
                    <h4 class="fw-bold mb-0 text-dark brand-font">Our Vision</h4>
                </div>
                <p class="text-muted leading-relaxed mb-0">
                    <?php echo e($about->vision); ?>

                </p>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/about/index.blade.php ENDPATH**/ ?>
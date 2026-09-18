<?php $__env->startSection('title', $post->title . ' - Gadget & Glow Blog'); ?>
<?php $__env->startSection('meta_description', Str::limit(strip_tags($post->excerpt ?? $post->content), 150)); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('shop.index')); ?>" class="text-decoration-none text-muted">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('blog.index')); ?>" class="text-decoration-none text-muted">Blog</a></li>
            <li class="breadcrumb-item active text-truncate text-dark" style="max-width: 300px;" aria-current="page"><?php echo e($post->title); ?></li>
        </ol>
    </nav>

    <div class="row g-4">
        <div class="col-lg-8">
            <article class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5 bg-white">
                <img src="<?php echo e(Str::startsWith($post->image, ['http://', 'https://']) ? $post->image : asset($post->image)); ?>" class="img-fluid w-100" alt="<?php echo e($post->title); ?>" style="max-height: 420px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Article</text></svg>';">

                <div class="card-body p-4 p-md-5">
                    <div class="d-flex flex-wrap align-items-center gap-3 text-muted small mb-3 border-bottom pb-3">
                        <span class="badge bg-primary text-white rounded-pill px-3 py-2">Blog Post</span>
                        <span><i class="bi bi-person-circle text-primary me-1"></i> By <?php echo e($post->author); ?></span>
                        <span>&bull;</span>
                        <span><i class="bi bi-calendar3 me-1"></i> Published <?php echo e($post->created_at->format('F d, Y')); ?></span>
                        <span>&bull;</span>
                        <span><i class="bi bi-eye me-1"></i> <?php echo e($post->views); ?> Views</span>
                    </div>

                    <h1 class="fw-bold display-6 mb-4 brand-font text-dark"><?php echo e($post->title); ?></h1>

                    <?php if($post->excerpt): ?>
                        <div class="p-3 bg-light rounded-3 border-start border-4 border-primary mb-4 fst-italic text-secondary">
                            <?php echo e($post->excerpt); ?>

                        </div>
                    <?php endif; ?>

                    <div class="blog-content text-secondary leading-relaxed fs-6">
                        <?php echo $post->content; ?>

                    </div>

                    <hr class="my-4">

                    <!-- Back Button & Share -->
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">
                        <a href="<?php echo e(route('blog.index')); ?>" class="btn btn-outline-dark rounded-pill px-4 btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Back to Blog Articles
                        </a>
                        <div class="d-flex align-items-center gap-2 text-muted small">
                            <span>Share Article:</span>
                            <a href="#" class="btn btn-sm btn-light rounded-circle text-primary"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle text-info"><i class="bi bi-twitter-x"></i></a>
                            <a href="#" class="btn btn-sm btn-light rounded-circle text-success"><i class="bi bi-whatsapp"></i></a>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-4">
            <div class="card border-0 shadow-sm rounded-4 mb-4 bg-white">
                <div class="card-body p-4">
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom"><i class="bi bi-journal-text me-2 text-primary"></i> More Articles</h5>
                    <div class="d-flex flex-column gap-3">
                        <?php $__currentLoopData = $recentPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="d-flex align-items-center gap-3">
                                <img src="<?php echo e(Str::startsWith($recent->image, ['http://', 'https://']) ? $recent->image : asset($recent->image)); ?>" class="rounded-3 border" alt="<?php echo e($recent->title); ?>" style="width: 65px; height: 65px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Article</text></svg>';">
                                <div>
                                    <h6 class="fw-bold mb-1 lh-sm">
                                        <a href="<?php echo e(route('blog.show', $recent->slug)); ?>" class="text-dark text-decoration-none small hover-primary">
                                            <?php echo e(Str::limit($recent->title, 45)); ?>

                                        </a>
                                    </h6>
                                    <span class="text-muted extra-small" style="font-size: 0.75rem;">
                                        <i class="bi bi-clock me-1"></i> <?php echo e($recent->created_at->format('M d, Y')); ?>

                                    </span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

            <!-- Featured Category Card -->
            <div class="card border-0 rounded-4 shadow-sm p-4 bg-white border">
                <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-bag-heart text-danger me-2"></i> Featured Storefront</h5>
                <p class="text-muted small">Discover our wide collection of smart watches, audio gear, and skincare serums.</p>
                <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-primary-custom rounded-pill w-100 text-center fw-semibold">
                    Explore Store Products
                </a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/blog/show.blade.php ENDPATH**/ ?>
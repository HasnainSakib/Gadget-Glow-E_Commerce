<?php $__env->startSection('title', $product->name . ' - Gadget & Glow'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('shop.index')); ?>" class="text-decoration-none text-muted">Shop</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('shop.index', ['category' => $product->category->slug])); ?>" class="text-decoration-none text-muted"><?php echo e($product->category->name); ?></a></li>
            <li class="breadcrumb-item active fw-semibold text-dark" aria-current="page"><?php echo e($product->name); ?></li>
        </ol>
    </nav>

    <!-- Product Main Info Card -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-5 bg-white">
        <div class="card-body p-4 p-md-5">
            <div class="row g-5 align-items-center">
                <!-- Product Image -->
                <div class="col-md-6 text-center">
                    <div class="position-relative overflow-hidden rounded-4 shadow-sm border bg-light p-2">
                        <img src="<?php echo e($product->image); ?>" alt="<?php echo e($product->name); ?>" class="img-fluid rounded-4" style="max-height: 420px; object-fit: cover; width: 100%;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Product</text></svg>';">
                        <div class="position-absolute top-0 start-0 m-3">
                            <span class="badge-category <?php echo e($product->category->slug == 'tech-gadgets' ? 'badge-gadget' : 'badge-beauty'); ?>">
                                <?php echo e($product->category->name); ?>

                            </span>
                        </div>
                    </div>
                </div>

                <!-- Product Details & Cart Action -->
                <div class="col-md-6">
                    <h2 class="fw-extrabold text-dark mb-3 brand-font"><?php echo e($product->name); ?></h2>

                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="fs-2 fw-extrabold text-primary">৳<?php echo e(number_format($product->price, 0)); ?></span>
                        <?php if($product->stock > 0): ?>
                            <span class="badge bg-success-subtle text-success border border-success-subtle px-3 py-2 rounded-pill fw-semibold">
                                <i class="bi bi-check-circle-fill me-1"></i> In Stock (<?php echo e($product->stock); ?> items)
                            </span>
                        <?php else: ?>
                            <span class="badge bg-danger-subtle text-danger border border-danger-subtle px-3 py-2 rounded-pill fw-semibold">
                                <i class="bi bi-x-circle-fill me-1"></i> Out of Stock
                            </span>
                        <?php endif; ?>
                    </div>

                    <p class="text-secondary lead fs-6 mb-4">
                        <?php echo e($product->description); ?>

                    </p>

                    <hr class="my-4 border-secondary opacity-25">

                    <!-- Add to Cart & Buy Now Form -->
                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST" class="d-flex flex-column gap-3">
                        <?php echo csrf_field(); ?>
                        <div class="d-flex align-items-center gap-3">
                            <label for="quantity" class="fw-semibold text-dark mb-0">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" value="1" min="1" max="<?php echo e($product->stock); ?>" class="form-control text-center rounded-3 fw-bold bg-white text-dark border" style="width: 90px;" <?php echo e($product->stock <= 0 ? 'disabled' : ''); ?>>
                        </div>

                        <div class="d-flex flex-wrap gap-2 mt-2">
                            <button type="submit" class="btn btn-primary-custom btn-lg rounded-pill px-4 flex-grow-1 shadow-sm" <?php echo e($product->stock <= 0 ? 'disabled' : ''); ?>>
                                <i class="bi bi-cart-plus-fill me-2"></i> Add to Cart
                            </button>
                            <button type="submit" formaction="<?php echo e(route('cart.buyNow', $product->id)); ?>" class="btn btn-success btn-lg rounded-pill px-4 flex-grow-1 shadow-sm fw-bold" style="background-color: #10b981; border-color: #10b981; color: white;" <?php echo e($product->stock <= 0 ? 'disabled' : ''); ?>>
                                <i class="bi bi-lightning-charge-fill me-1"></i> Buy Now / সরাসরি ক্রয় করুন
                            </button>
                            <button type="button" class="btn btn-outline-danger btn-lg rounded-pill px-3 shadow-sm" data-bs-toggle="modal" data-bs-target="#wishlistModal<?php echo e($product->id); ?>" title="Add to Wishlist">
                                <i class="bi bi-heart-fill me-1"></i> Wishlist
                            </button>
                        </div>
                    </form>

                    <!-- Wishlist Modal -->
                    <div class="modal fade" id="wishlistModal<?php echo e($product->id); ?>" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content rounded-4 border-0 shadow-lg">
                                <div class="modal-header border-0 pb-0">
                                    <h5 class="modal-title fw-bold text-dark"><i class="bi bi-heart-fill text-danger me-2"></i>Add to Wishlist</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="<?php echo e(route('wishlist.store', $product->id)); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="modal-body p-4">
                                        <p class="text-secondary small mb-3">
                                            Please provide your name and contact details so our team can save your request and reach out when stock or special offers arrive.
                                        </p>

                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="customer_name" class="form-control rounded-3" value="<?php echo e(session('customer_name')); ?>" placeholder="John Doe" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Mobile Phone <span class="text-danger">*</span></label>
                                            <input type="tel" name="customer_phone" minlength="11" maxlength="11" pattern="01[3-9][0-9]{8}" class="form-control rounded-3" value="<?php echo e(session('customer_phone')); ?>" placeholder="01712345678" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold text-dark">Email Address <span class="text-danger">*</span></label>
                                            <input type="email" name="customer_email" class="form-control rounded-3" value="<?php echo e(session('customer_email')); ?>" placeholder="john@example.com" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer border-0 pt-0">
                                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger rounded-pill px-4 fw-bold">
                                            <i class="bi bi-heart-fill me-1"></i> Save to Wishlist
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Perks list -->
                    <div class="row g-3 mt-4 pt-3 border-top text-muted small">
                        <div class="col-6 d-flex align-items-center gap-2">
                            <i class="bi bi-truck text-primary fs-4"></i>
                            <div><strong class="text-dark">Fast Delivery</strong><br>Across Bangladesh</div>
                        </div>
                        <div class="col-6 d-flex align-items-center gap-2">
                            <i class="bi bi-shield-check text-success fs-4"></i>
                            <div><strong class="text-dark">100% Genuine</strong><br>Authentic Product</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Products -->
    <?php if($relatedProducts->count() > 0): ?>
        <h4 class="fw-bold mb-4 text-dark"><i class="bi bi-grid-3x3-gap-fill text-primary me-2"></i>Related Items You Might Like</h4>
        <div class="row g-4">
            <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-md-3">
                    <div class="card product-card border-0 shadow-sm rounded-4">
                        <img src="<?php echo e($rel->image); ?>" class="card-img-top" alt="<?php echo e($rel->name); ?>" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Product</text></svg>';">
                        <div class="card-body p-3">
                            <h6 class="fw-bold text-truncate mb-1"><a href="<?php echo e(route('shop.show', $rel->slug)); ?>" class="text-dark text-decoration-none hover-primary"><?php echo e($rel->name); ?></a></h6>
                            <div class="fw-bold text-primary">৳<?php echo e(number_format($rel->price, 0)); ?></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/shop/show.blade.php ENDPATH**/ ?>
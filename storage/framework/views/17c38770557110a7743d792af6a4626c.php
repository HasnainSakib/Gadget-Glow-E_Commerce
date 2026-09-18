<?php $__env->startSection('title', $category->name . ' Collection - Gadget & Glow'); ?>
<?php $__env->startSection('meta_description', 'Explore authentic ' . $category->name . ' products with fast nationwide delivery in Bangladesh.'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid px-lg-4 px-xl-5 py-4">

    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb bg-white p-3 rounded-pill shadow-sm border mb-0 d-inline-flex align-items-center">
            <li class="breadcrumb-item"><a href="<?php echo e(route('shop.index')); ?>" class="text-decoration-none text-muted"><i class="bi bi-house-door me-1"></i> Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('shop.index')); ?>#products-catalog" class="text-decoration-none text-muted">Store</a></li>
            <li class="breadcrumb-item active text-primary fw-bold" aria-current="page"><?php echo e($category->name); ?></li>
        </ol>
    </nav>

    <!-- Category Header Hero Banner -->
    <div class="card border-0 shadow-sm rounded-4 overflow-hidden mb-4" style="background: linear-gradient(135deg, <?php echo e($category->slug == 'tech-gadgets' ? '#eff6ff 0%, #ffffff 50%, #f0fdf4 100%' : '#fdf2f8 0%, #ffffff 50%, #fff7ed 100%'); ?>);">
        <div class="card-body p-4 p-md-5">
            <div class="row align-items-center g-4">
                <div class="col-lg-8">
                    <span class="badge <?php echo e($category->slug == 'tech-gadgets' ? 'bg-primary-subtle text-primary border border-primary' : 'bg-danger-subtle text-danger border border-danger'); ?> px-3 py-2 rounded-pill fw-bold mb-3 d-inline-flex align-items-center gap-1.5" style="font-size: 0.85rem;">
                        <i class="bi <?php echo e($category->slug == 'tech-gadgets' ? 'bi-laptop' : 'bi-flower1'); ?> fs-6"></i> <?php echo e($category->name); ?> Collection
                    </span>
                    <h1 class="display-5 fw-extrabold text-dark mb-2"><?php echo e($category->name); ?></h1>
                    <p class="lead text-secondary opacity-90 mb-4" style="font-size: 1.05rem;">
                        <?php echo e($category->description ?? 'Discover our curated range of 100% authentic products with fast delivery across Bangladesh.'); ?>

                    </p>
                    <div class="d-flex align-items-center gap-3">
                        <span class="badge bg-dark text-white rounded-pill px-3 py-2 fs-6 fw-semibold">
                            <i class="bi bi-box-seam me-1"></i> <?php echo e($products->total()); ?> Products Available
                        </span>
                        <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-outline-dark rounded-pill px-3 fw-bold btn-sm">
                            <i class="bi bi-arrow-left me-1"></i> Back to Home
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 d-none d-lg-block text-center">
                    <img src="<?php echo e($category->image); ?>" alt="<?php echo e($category->name); ?>" class="img-fluid rounded-4 shadow-sm border" style="max-height: 220px; width: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Category</text></svg>';">
                </div>
            </div>
        </div>
    </div>

    <!-- Toolbar: Category Navigation Pills, Search & Sort -->
    <div class="card p-3 border-0 shadow-sm rounded-4 mb-4" style="background: #ffffff;">
        <div class="row align-items-center g-3">
            <!-- Category Pills -->
            <div class="col-lg-6">
                <div class="d-flex flex-wrap gap-2">
                    <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-sm btn-outline-dark rounded-pill px-3">
                        <i class="bi bi-grid me-1"></i> All Categories
                    </a>
                    <?php $__currentLoopData = $allCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('shop.category', $cat->slug)); ?>" class="btn btn-sm <?php echo e($cat->id == $category->id ? 'btn-primary-custom fw-bold shadow-sm' : 'btn-outline-dark'); ?> rounded-pill px-3">
                            <i class="bi <?php echo e($cat->slug == 'tech-gadgets' ? 'bi-laptop' : 'bi-flower1'); ?> me-1"></i>
                            <?php echo e($cat->name); ?> (<?php echo e($cat->products_count); ?>)
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            <!-- Search & Sort Controls -->
            <div class="col-lg-6">
                <form action="<?php echo e(route('shop.category', $category->slug)); ?>" method="GET" class="d-flex flex-column flex-sm-row gap-2">
                    <div class="input-group flex-grow-1">
                        <span class="input-group-text bg-light border-end-0 rounded-start-pill ps-3">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" name="search" class="form-control bg-light border-start-0 ps-0" placeholder="Search in <?php echo e($category->name); ?>..." value="<?php echo e(request('search')); ?>">
                    </div>

                    <select name="sort" class="form-select bg-light rounded-pill border" style="width: auto;" onchange="this.form.submit()">
                        <option value="latest" <?php echo e(request('sort') == 'latest' ? 'selected' : ''); ?>>Sort by: Latest</option>
                        <option value="price_low" <?php echo e(request('sort') == 'price_low' ? 'selected' : ''); ?>>Price: Low to High</option>
                        <option value="price_high" <?php echo e(request('sort') == 'price_high' ? 'selected' : ''); ?>>Price: High to Low</option>
                        <option value="oldest" <?php echo e(request('sort') == 'oldest' ? 'selected' : ''); ?>>Sort by: Oldest</option>
                    </select>
                    
                    <button type="submit" class="btn btn-primary-custom rounded-pill px-3">Filter</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Active Search Filter Alert -->
    <?php if(request('search')): ?>
        <div class="alert alert-info alert-dismissible fade show rounded-4 border-0 shadow-sm d-flex align-items-center justify-content-between mb-4" role="alert">
            <div>
                <i class="bi bi-info-circle-fill me-2 fs-5"></i>
                Showing search results for <strong>"<?php echo e(request('search')); ?>"</strong> in <strong><?php echo e($category->name); ?></strong>
            </div>
            <a href="<?php echo e(route('shop.category', $category->slug)); ?>" class="btn btn-sm btn-outline-dark rounded-pill fw-bold ms-3">Clear Search</a>
        </div>
    <?php endif; ?>

    <!-- Dedicated Category Products Grid -->
    <?php if($products->count() > 0): ?>
        <div class="row g-3 g-lg-4 mb-5">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-6 col-md-4 col-xl-3">
                    <div class="card product-card h-100 border-0 shadow-sm rounded-4 bg-white">
                        <div class="position-relative overflow-hidden" style="height: 210px;">
                            <a href="<?php echo e(route('shop.show', $product->slug)); ?>">
                                <img src="<?php echo e($product->image); ?>" class="card-img-top h-100 w-100" alt="<?php echo e($product->name); ?>" style="object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Product</text></svg>';">
                            </a>
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge-category <?php echo e($category->slug == 'tech-gadgets' ? 'badge-gadget' : 'badge-beauty'); ?>">
                                    <?php echo e($category->name); ?>

                                </span>
                            </div>
                            <div class="position-absolute top-0 end-0 m-2">
                                <button type="button" class="btn btn-sm btn-light rounded-circle shadow-sm p-0 d-flex align-items-center justify-content-center text-danger" style="width: 32px; height: 32px;" data-bs-toggle="modal" data-bs-target="#wishlistModalSub<?php echo e($product->id); ?>" title="Add to Wishlist">
                                    <i class="bi bi-heart-fill"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Wishlist Modal for Category Card -->
                        <div class="modal fade" id="wishlistModalSub<?php echo e($product->id); ?>" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 border-0 shadow-lg">
                                    <div class="modal-header border-0 pb-0">
                                        <h5 class="modal-title fw-bold text-dark"><i class="bi bi-heart-fill text-danger me-2"></i>Add to Wishlist</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="<?php echo e(route('wishlist.store', $product->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <div class="modal-body p-4 text-start">
                                            <p class="text-secondary small mb-3">
                                                Save <strong><?php echo e($product->name); ?></strong> to your wishlist by providing your name and contact details.
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

                        <div class="card-body d-flex flex-column p-3">
                            <h6 class="card-title fw-bold text-dark mb-1.5 text-truncate" title="<?php echo e($product->name); ?>">
                                <a href="<?php echo e(route('shop.show', $product->slug)); ?>" class="text-decoration-none text-dark hover-primary">
                                    <?php echo e($product->name); ?>

                                </a>
                            </h6>
                            <p class="card-text text-muted small mb-3 flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; font-size: 0.82rem;">
                                <?php echo e($product->description); ?>

                            </p>
                            <div class="d-flex align-items-center justify-content-between mt-auto pt-2 border-top">
                                <div>
                                    <span class="fs-5 fw-bold text-primary">৳<?php echo e(number_format($product->price, 0)); ?></span>
                                </div>
                                <div class="d-flex align-items-center gap-1">
                                    <form action="<?php echo e(route('cart.add', $product->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-primary-custom rounded-circle p-2 d-flex align-items-center justify-content-center shadow-sm" style="width: 34px; height: 34px;" title="Add to Cart" <?php echo e($product->stock <= 0 ? 'disabled' : ''); ?>>
                                            <i class="bi bi-bag-plus-fill fs-6"></i>
                                        </button>
                                    </form>
                                    <form action="<?php echo e(route('cart.buyNow', $product->id)); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <button type="submit" class="btn btn-success rounded-pill px-2.5 py-1 d-flex align-items-center justify-content-center fw-bold text-white extra-small" style="background-color: #10b981; border: none; font-size: 0.72rem;" title="Buy Now (সরাসরি ক্রয়)" <?php echo e($product->stock <= 0 ? 'disabled' : ''); ?>>
                                            <i class="bi bi-lightning-fill me-1"></i> Buy Now
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center my-4">
            <?php echo e($products->appends(request()->query())->links('pagination::bootstrap-5')); ?>

        </div>
    <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-5 bg-white rounded-4 shadow-sm border my-4">
            <i class="bi bi-basket3 text-muted display-4 d-block mb-3"></i>
            <h4 class="fw-bold text-dark">No Products Found</h4>
            <p class="text-muted">There are currently no products available in <strong><?php echo e($category->name); ?></strong> matching your criteria.</p>
            <a href="<?php echo e(route('shop.category', $category->slug)); ?>" class="btn btn-primary-custom rounded-pill px-4">View All <?php echo e($category->name); ?> Products</a>
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/shop/category.blade.php ENDPATH**/ ?>
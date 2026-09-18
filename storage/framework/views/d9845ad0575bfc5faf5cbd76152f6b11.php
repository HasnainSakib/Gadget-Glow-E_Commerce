<?php $__env->startSection('title', 'Shopping Cart - Gadget & Glow'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold mb-0 text-dark"><i class="bi bi-cart3 text-primary me-2"></i>Shopping Cart</h2>
        <?php if(count($cart) > 0): ?>
            <form action="<?php echo e(route('cart.clear')); ?>" method="POST" onsubmit="return confirm('Clear entire cart?');">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">
                    <i class="bi bi-trash me-1"></i> Clear Cart
                </button>
            </form>
        <?php endif; ?>
    </div>

    <?php if(count($cart) > 0): ?>
        <div class="row g-4">
            <!-- Cart Items Table -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0 text-dark">
                                <thead class="bg-light text-muted small text-uppercase">
                                    <tr>
                                        <th class="ps-4">Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th class="text-end pe-4">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="ps-4">
                                                <div class="d-flex align-items-center gap-3 py-2">
                                                    <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>" class="rounded-3 border" style="width: 60px; height: 60px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'600\' height=\'600\' viewBox=\'0 0 600 600\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'24\' fill=\'%2378716c\'>Item</text></svg>';">
                                                    <div>
                                                        <h6 class="fw-bold mb-0">
                                                            <a href="<?php echo e(route('shop.show', $item['slug'])); ?>" class="text-dark text-decoration-none hover-primary">
                                                                <?php echo e($item['name']); ?>

                                                            </a>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="fw-semibold">৳<?php echo e(number_format($item['price'], 0)); ?></td>
                                            <td>
                                                <form action="<?php echo e(route('cart.update', $id)); ?>" method="POST" class="d-flex align-items-center gap-2">
                                                    <?php echo csrf_field(); ?>
                                                    <input type="number" name="quantity" value="<?php echo e($item['quantity']); ?>" min="1" class="form-control form-control-sm text-center rounded-3 fw-bold bg-white text-dark border" style="width: 70px;">
                                                    <button type="submit" class="btn btn-sm btn-outline-secondary" title="Update Quantity">
                                                        <i class="bi bi-arrow-clockwise"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="fw-bold text-primary">৳<?php echo e(number_format($item['price'] * $item['quantity'], 0)); ?></td>
                                            <td class="text-end pe-4">
                                                <form action="<?php echo e(route('cart.remove', $id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-link text-danger p-0" title="Remove item">
                                                        <i class="bi bi-x-circle-fill fs-5"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Card -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                    <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">Order Summary</h5>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-semibold text-dark">৳<?php echo e(number_format($total, 0)); ?></span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Delivery Charge</span>
                        <span class="text-success fw-semibold">FREE</span>
                    </div>
                    <hr class="my-3 border-secondary opacity-25">
                    <div class="d-flex justify-content-between mb-4">
                        <span class="fs-5 fw-bold text-dark">Total Amount</span>
                        <span class="fs-4 fw-bold text-primary">৳<?php echo e(number_format($total, 0)); ?></span>
                    </div>

                    <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-primary-custom btn-lg w-100 rounded-pill shadow-sm">
                        Proceed to Checkout <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                    <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-link text-muted w-100 text-decoration-none mt-2">
                        <i class="bi bi-arrow-left me-1"></i> Continue Shopping
                    </a>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5 rounded-4 shadow-sm bg-white border">
            <i class="bi bi-cart-x text-muted display-1 mb-3"></i>
            <h3 class="fw-bold text-dark">Your Cart is Empty</h3>
            <p class="text-muted">Explore our gadgets and makeup collections to find items you love.</p>
            <a href="<?php echo e(route('shop.index')); ?>" class="btn btn-primary-custom btn-lg rounded-pill px-4 mt-2">
                <i class="bi bi-bag-plus me-2"></i> Start Shopping Now
            </a>
        </div>
    <?php endif; ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/cart/index.blade.php ENDPATH**/ ?>
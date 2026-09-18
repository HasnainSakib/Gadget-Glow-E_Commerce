<?php $__env->startSection('title', 'Admin Dashboard - Gadget & Glow'); ?>
<?php $__env->startSection('header_title', 'Dashboard & Sales Analytics'); ?>

<?php $__env->startSection('content'); ?>

<!-- Date-wise Filter Bar -->
<div class="card border-0 shadow-sm rounded-4 p-4 mb-4 bg-white">
    <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3 mb-3">
        <div>
            <h5 class="fw-bold mb-1 text-dark"><i class="bi bi-funnel-fill text-primary me-2"></i>Date-Wise Sales & Orders Filter</h5>
            <p class="text-muted small mb-0">Select date range or quick preset to analyze sales, orders, deliveries, and cancellations.</p>
        </div>

        <!-- Quick Presets -->
        <div class="btn-group rounded-pill p-1 bg-light border" role="group">
            <a href="<?php echo e(route('admin.dashboard', ['preset' => 'all_time'])); ?>" class="btn btn-sm rounded-pill <?php echo e($preset == 'all_time' ? 'btn-primary shadow-sm fw-bold' : 'btn-light text-secondary'); ?>">All Time</a>
            <a href="<?php echo e(route('admin.dashboard', ['preset' => 'today'])); ?>" class="btn btn-sm rounded-pill <?php echo e($preset == 'today' ? 'btn-primary shadow-sm fw-bold' : 'btn-light text-secondary'); ?>">Today</a>
            <a href="<?php echo e(route('admin.dashboard', ['preset' => 'yesterday'])); ?>" class="btn btn-sm rounded-pill <?php echo e($preset == 'yesterday' ? 'btn-primary shadow-sm fw-bold' : 'btn-light text-secondary'); ?>">Yesterday</a>
            <a href="<?php echo e(route('admin.dashboard', ['preset' => 'last_7_days'])); ?>" class="btn btn-sm rounded-pill <?php echo e($preset == 'last_7_days' ? 'btn-primary shadow-sm fw-bold' : 'btn-light text-secondary'); ?>">Last 7 Days</a>
            <a href="<?php echo e(route('admin.dashboard', ['preset' => 'this_month'])); ?>" class="btn btn-sm rounded-pill <?php echo e($preset == 'this_month' ? 'btn-primary shadow-sm fw-bold' : 'btn-light text-secondary'); ?>">This Month</a>
        </div>
    </div>

    <!-- Custom Date Range Form -->
    <form action="<?php echo e(route('admin.dashboard')); ?>" method="GET" class="row g-2 align-items-center">
        <input type="hidden" name="preset" value="custom">
        <div class="col-md-4 col-lg-3">
            <label class="form-label small text-muted mb-1 fw-semibold">Start Date (শুরুর তারিখ):</label>
            <input type="date" name="start_date" class="form-control form-control-sm rounded-3" value="<?php echo e($startDate); ?>">
        </div>
        <div class="col-md-4 col-lg-3">
            <label class="form-label small text-muted mb-1 fw-semibold">End Date (শেষ তারিখ):</label>
            <input type="date" name="end_date" class="form-control form-control-sm rounded-3" value="<?php echo e($endDate); ?>">
        </div>
        <div class="col-md-4 col-lg-3 d-flex gap-2 pt-md-4">
            <button type="submit" class="btn btn-sm btn-primary rounded-pill px-4 fw-bold">
                <i class="bi bi-filter me-1"></i> Apply Filter
            </button>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="btn btn-sm btn-outline-secondary rounded-pill px-3">
                Reset
            </a>
        </div>
    </form>
</div>

<!-- Filtered Stat Cards Grid -->
<div class="row g-3 mb-4">
    <div class="col-md-4 col-xl-2.4 col-lg-4">
        <div class="stat-card h-100 border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted fw-bold extra-small text-uppercase">TOTAL REVENUE (সেলস)</span>
                <div class="stat-icon bg-success-subtle text-success fw-bold p-2 rounded-circle" style="width: 38px; height: 38px; font-size: 1.1rem;">
                    ৳
                </div>
            </div>
            <h4 class="fw-extrabold text-dark mb-1">৳<?php echo e(number_format($filteredRevenue, 0)); ?></h4>
            <small class="text-muted extra-small">In selected period</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2.4 col-lg-4">
        <div class="stat-card h-100 border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted fw-bold extra-small text-uppercase">TOTAL ORDERS (অর্ডার)</span>
                <div class="stat-icon bg-primary-subtle text-primary p-2 rounded-circle" style="width: 38px; height: 38px;">
                    <i class="bi bi-bag-check-fill fs-5"></i>
                </div>
            </div>
            <h4 class="fw-extrabold text-dark mb-1"><?php echo e($filteredTotalOrders); ?></h4>
            <small class="text-muted extra-small">Total placed</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2.4 col-lg-4">
        <div class="stat-card h-100 border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted fw-bold extra-small text-uppercase">DELIVERED (ডেলিভারি)</span>
                <div class="stat-icon bg-success-subtle text-success p-2 rounded-circle" style="width: 38px; height: 38px;">
                    <i class="bi bi-check-circle-fill fs-5"></i>
                </div>
            </div>
            <h4 class="fw-extrabold text-success mb-1"><?php echo e($filteredCompletedOrders); ?></h4>
            <small class="text-muted extra-small">Completed orders</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2.4 col-lg-4">
        <div class="stat-card h-100 border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted fw-bold extra-small text-uppercase">PROCESSING / PENDING</span>
                <div class="stat-icon bg-warning-subtle text-warning p-2 rounded-circle" style="width: 38px; height: 38px;">
                    <i class="bi bi-clock-history fs-5"></i>
                </div>
            </div>
            <h4 class="fw-extrabold text-warning-emphasis mb-1"><?php echo e($filteredPendingOrders + $filteredProcessingOrders); ?></h4>
            <small class="text-muted extra-small"><?php echo e($filteredPendingOrders); ?> pending, <?php echo e($filteredProcessingOrders); ?> processing</small>
        </div>
    </div>

    <div class="col-md-4 col-xl-2.4 col-lg-4">
        <div class="stat-card h-100 border-0 shadow-sm rounded-4 p-3 bg-white">
            <div class="d-flex align-items-center justify-content-between mb-2">
                <span class="text-muted fw-bold extra-small text-uppercase">CANCELLED (বাতিল)</span>
                <div class="stat-icon bg-danger-subtle text-danger p-2 rounded-circle" style="width: 38px; height: 38px;">
                    <i class="bi bi-x-circle-fill fs-5"></i>
                </div>
            </div>
            <h4 class="fw-extrabold text-danger mb-1"><?php echo e($filteredCancelledOrders); ?></h4>
            <small class="text-muted extra-small">Cancelled orders</small>
        </div>
    </div>
</div>

<div class="row g-4">
    <!-- Recent Orders Table -->
    <div class="col-lg-8">
        <div class="table-custom p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="fw-bold mb-0 text-dark">Recent Customer Orders</h5>
                <a href="<?php echo e(route('admin.orders.index')); ?>" class="btn btn-sm btn-outline-primary rounded-pill px-3 fw-bold">View All Orders</a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light small text-uppercase">
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th class="text-end">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $recentOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="fw-bold text-primary"><?php echo e($order->order_number); ?></td>
                                <td>
                                    <div class="fw-semibold text-dark"><?php echo e($order->customer_name); ?></div>
                                    <small class="text-muted"><?php echo e($order->customer_phone); ?></small>
                                </td>
                                <td class="fw-bold text-dark">৳<?php echo e(number_format($order->total_amount, 0)); ?></td>
                                <td>
                                    <?php if($order->status == 'pending'): ?>
                                        <span class="badge bg-warning-subtle text-dark border border-warning rounded-pill px-2.5 py-1">Pending</span>
                                    <?php elseif($order->status == 'processing'): ?>
                                        <span class="badge bg-info-subtle text-info border border-info rounded-pill px-2.5 py-1">Processing</span>
                                    <?php elseif($order->status == 'completed'): ?>
                                        <span class="badge bg-success-subtle text-success border border-success rounded-pill px-2.5 py-1">Completed</span>
                                    <?php else: ?>
                                        <span class="badge bg-danger-subtle text-danger border border-danger rounded-pill px-2.5 py-1">Cancelled</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-end">
                                    <a href="<?php echo e(route('admin.orders.show', $order->id)); ?>" class="btn btn-sm btn-light border rounded-pill px-3">
                                        <i class="bi bi-eye"></i> Details
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-3">No orders placed yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Low Stock Alerts -->
    <div class="col-lg-4">
        <div class="table-custom p-4">
            <h5 class="fw-bold mb-3 text-dark"><i class="bi bi-exclamation-triangle-fill text-warning me-2"></i>Low Stock Alert</h5>
            <div class="list-group list-group-flush">
                <?php $__empty_1 = true; $__currentLoopData = $lowStockProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center px-0 bg-transparent">
                        <div class="d-flex align-items-center gap-2">
                            <img src="<?php echo e($prod->image); ?>" class="rounded border" style="width: 40px; height: 40px; object-fit: cover;">
                            <div>
                                <h6 class="mb-0 small fw-bold text-truncate text-dark" style="max-width: 140px;"><?php echo e($prod->name); ?></h6>
                                <small class="text-muted">৳<?php echo e(number_format($prod->price, 0)); ?></small>
                            </div>
                        </div>
                        <span class="badge bg-danger-subtle text-danger border border-danger-subtle rounded-pill px-2.5 py-1 fw-bold"><?php echo e($prod->stock); ?> left</span>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="text-muted small py-2">All products have sufficient stock!</div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>
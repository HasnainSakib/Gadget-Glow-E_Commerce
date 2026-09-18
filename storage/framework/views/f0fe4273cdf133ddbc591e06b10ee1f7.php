<?php $__env->startSection('title', 'Checkout - Gadget & Glow'); ?>

<?php $__env->startSection('content'); ?>
<div class="container py-4">

    <h2 class="fw-bold mb-4 text-dark"><i class="bi bi-credit-card-2-front text-primary me-2"></i>Checkout Details</h2>

    <div class="row g-4">
        <!-- Customer Info Form -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 bg-white">
                <h4 class="fw-bold mb-4 text-dark"><i class="bi bi-person-circle text-primary me-2"></i>Shipping & Payment Information</h4>

                <form action="<?php echo e(route('checkout.store')); ?>" method="POST" id="checkoutForm">
                    <?php echo csrf_field(); ?>
                    
                    <div class="mb-3">
                        <label for="customer_name" class="form-label fw-semibold text-dark">Full Name / নাম <span class="text-danger">*</span></label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control rounded-3 bg-white text-dark border <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="John Doe" value="<?php echo e(old('customer_name', session('customer_name'))); ?>" required>
                        <?php $__errorArgs = ['customer_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="customer_email" class="form-label fw-semibold text-dark">Email Address / ইমেইল <span class="text-danger">*</span></label>
                            <input type="email" name="customer_email" id="customer_email" class="form-control rounded-3 bg-white text-dark border <?php $__errorArgs = ['customer_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="john@example.com" value="<?php echo e(old('customer_email', session('customer_email'))); ?>" required>
                            <?php $__errorArgs = ['customer_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6">
                            <label for="customer_phone" class="form-label fw-semibold text-dark">Mobile Phone (11 Digits) / মোবাইল <span class="text-danger">*</span></label>
                            <input type="tel" name="customer_phone" id="customer_phone" minlength="11" maxlength="11" pattern="01[3-9][0-9]{8}" class="form-control rounded-3 bg-white text-dark border <?php $__errorArgs = ['customer_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="01712345678" value="<?php echo e(old('customer_phone', session('customer_phone'))); ?>" title="Please enter a valid 11-digit Bangladeshi mobile number starting with 01" required>
                            <div class="form-text text-muted small">11-digit Bangladeshi number (e.g. 01712345678).</div>
                            <?php $__errorArgs = ['customer_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="invalid-feedback d-block"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label for="shipping_address" class="form-label fw-semibold text-dark">Shipping Address / ডেলিভারি ঠিকানা <span class="text-danger">*</span></label>
                        <textarea name="shipping_address" id="shipping_address" rows="3" class="form-control rounded-3 bg-white text-dark border <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="House/Flat No, Road Name, Area, District" required><?php echo e(old('shipping_address', session('shipping_address'))); ?></textarea>
                        <?php $__errorArgs = ['shipping_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="invalid-feedback"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <!-- Payment Method Selection -->
                    <h5 class="fw-bold mb-3 text-dark d-flex align-items-center gap-2">
                        <i class="bi bi-wallet2 text-primary"></i> Select Payment Method / পেমেন্ট মাধ্যম সিলেক্ট করুন
                    </h5>
                    
                    <div class="d-flex flex-column gap-3 mb-4">
                        <!-- COD Option -->
                        <div class="card border rounded-4 p-3 payment-option-card" id="card_cod" style="transition: all 0.25s ease; cursor: pointer;">
                            <div class="form-check d-flex align-items-center gap-3 mb-0">
                                <input class="form-check-input mt-0 fs-5" type="radio" name="payment_method" id="pm_cod" value="cod" <?php echo e(old('payment_method', 'cod') == 'cod' ? 'checked' : ''); ?> onchange="togglePaymentInstructions()">
                                <label class="form-check-label w-100 cursor-pointer" for="pm_cod">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong class="text-dark d-block fs-6">Cash on Delivery (COD) / ক্যাশ অন ডেলিভারি</strong>
                                            <span class="text-muted small">পণ্য ডেলিভারির সময় নগদ মূল্যে মূল্য পরিশোধ করুন।</span>
                                        </div>
                                        <div class="d-flex align-items-center gap-2 bg-success-subtle text-success border border-success-subtle px-3 py-1.5 rounded-pill">
                                            <i class="bi bi-cash-stack fs-4"></i>
                                            <span class="fw-bold small">COD</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- bKash Option -->
                        <div class="card border rounded-4 p-3 payment-option-card" id="card_bkash" style="transition: all 0.25s ease; cursor: pointer;">
                            <div class="form-check d-flex align-items-center gap-3 mb-0">
                                <input class="form-check-input mt-0 fs-5" type="radio" name="payment_method" id="pm_bkash" value="bkash" <?php echo e(old('payment_method') == 'bkash' ? 'checked' : ''); ?> onchange="togglePaymentInstructions()">
                                <label class="form-check-label w-100 cursor-pointer" for="pm_bkash">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong class="d-block fs-6 fw-bold" style="color: #e2136e;">bKash (বিকাশ) Personal Send Money</strong>
                                            <span class="text-muted small">বিকাশ পার্সোনাল নম্বরে সেন্ড মানি করুন।</span>
                                        </div>
                                        <!-- bKash Dynamic Brand Logo Container -->
                                        <div class="d-flex align-items-center justify-content-center p-1 bg-white rounded-3 shadow-sm border border-pink overflow-hidden" style="width: 54px; height: 54px;">
                                            <img src="<?php echo e($bkashLogoUrl); ?>" alt="bKash Logo" class="rounded-2" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Nagad Option -->
                        <div class="card border rounded-4 p-3 payment-option-card" id="card_nagad" style="transition: all 0.25s ease; cursor: pointer;">
                            <div class="form-check d-flex align-items-center gap-3 mb-0">
                                <input class="form-check-input mt-0 fs-5" type="radio" name="payment_method" id="pm_nagad" value="nagad" <?php echo e(old('payment_method') == 'nagad' ? 'checked' : ''); ?> onchange="togglePaymentInstructions()">
                                <label class="form-check-label w-100 cursor-pointer" for="pm_nagad">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong class="d-block fs-6 fw-bold" style="color: #f7921e;">Nagad (নগদ) Personal Send Money</strong>
                                            <span class="text-muted small">নগদ পার্সোনাল নম্বরে সেন্ড মানি করুন।</span>
                                        </div>
                                        <!-- Nagad Dynamic Brand Logo Container -->
                                        <div class="d-flex align-items-center justify-content-center p-1 bg-white rounded-3 shadow-sm border border-warning overflow-hidden" style="width: 54px; height: 54px;">
                                            <img src="<?php echo e($nagadLogoUrl); ?>" alt="Nagad Logo" class="rounded-2" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <!-- Rocket Option -->
                        <div class="card border rounded-4 p-3 payment-option-card" id="card_rocket" style="transition: all 0.25s ease; cursor: pointer;">
                            <div class="form-check d-flex align-items-center gap-3 mb-0">
                                <input class="form-check-input mt-0 fs-5" type="radio" name="payment_method" id="pm_rocket" value="rocket" <?php echo e(old('payment_method') == 'rocket' ? 'checked' : ''); ?> onchange="togglePaymentInstructions()">
                                <label class="form-check-label w-100 cursor-pointer" for="pm_rocket">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong class="d-block fs-6 fw-bold" style="color: #8c3494;">Rocket (রকেট) Personal Send Money</strong>
                                            <span class="text-muted small">রকেট পার্সোনাল নম্বরে সেন্ড মানি করুন (১২-ডিজিট)।</span>
                                        </div>
                                        <!-- Rocket Dynamic Brand Logo Container -->
                                        <div class="d-flex align-items-center justify-content-center p-1 bg-white rounded-3 shadow-sm border border-purple overflow-hidden" style="width: 54px; height: 54px;">
                                            <img src="<?php echo e($rocketLogoUrl); ?>" alt="Rocket Logo" class="rounded-2" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Dynamic Instructions for MFS Payments -->
                    <div id="mfs_instruction_box" class="alert rounded-4 p-4 mb-4 shadow-sm d-none" style="transition: all 0.3s ease;">
                        <div class="d-flex align-items-start gap-3">
                            <div class="bg-white rounded-circle p-2 shadow-sm d-flex align-items-center justify-content-center" style="width: 44px; height: 44px;">
                                <i class="bi bi-phone-vibrate-fill fs-3 text-primary"></i>
                            </div>
                            <div class="w-100">
                                <h6 class="fw-bold mb-2 text-dark fs-6" id="mfs_title">Mobile Banking Payment Instructions</h6>
                                
                                <div class="mb-3" id="mfs_number_container">
                                    <small class="text-muted d-block mb-1">আমাদের পার্সোনাল নম্বর (Personal Number):</small>
                                    <div id="mfs_number"></div>
                                </div>

                                <div class="p-3 bg-white rounded-3 border small text-secondary">
                                    <strong class="text-dark d-block mb-1">কীভাবে টাকা পাঠাবেন? (Instructions):</strong>
                                    1. উক্ত পার্সোনাল নম্বরে মোট মূল্য সেন্ড মানি (Send Money) করুন।<br>
                                    2. অর্ডার সাবমিট করলে স্ক্রিনে একটি <strong>৬-ডিজিটের ইউনিক রেফারেন্স কোড</strong> (যেমন: <code>GGL149</code>) পাবেন।<br>
                                    3. টাকা পাঠানোর সময় রেফারেন্স অপশনে ঐ কোডটি লিখুন অথবা আমাদের কল করার সময় বলুন।
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" id="submitOrderBtn" class="btn btn-primary-custom btn-lg w-100 rounded-pill shadow-sm fw-bold py-3 fs-5">
                        <i class="bi bi-check-circle-fill me-2"></i> Complete Order Now
                    </button>
                </form>
            </div>
        </div>

        <!-- Order Summary Sidebar -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm rounded-4 p-4 bg-white">
                <h5 class="fw-bold text-dark mb-3 border-bottom pb-2">Your Order (<?php echo e(count($cart)); ?> Items)</h5>

                <div class="mb-3" style="max-height: 300px; overflow-y: auto;">
                    <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="d-flex align-items-center gap-3 py-2 border-bottom">
                            <img src="<?php echo e($item['image']); ?>" alt="<?php echo e($item['name']); ?>" class="rounded-3 border" style="width: 50px; height: 50px; object-fit: cover;" onerror="this.onerror=null; this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'100\' height=\'100\'><rect width=\'100%\' height=\'100%\' fill=\'%23faf7f2\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' font-size=\'14\' fill=\'%2378716c\'>Item</text></svg>';">
                            <div class="flex-grow-1">
                                <h6 class="mb-0 text-truncate text-dark" style="max-width: 200px;"><?php echo e($item['name']); ?></h6>
                                <small class="text-muted">Qty: <?php echo e($item['quantity']); ?> × ৳<?php echo e(number_format($item['price'], 0)); ?></small>
                            </div>
                            <div class="fw-bold text-dark">৳<?php echo e(number_format($item['price'] * $item['quantity'], 0)); ?></div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Subtotal</span>
                    <span class="fw-semibold text-dark">৳<?php echo e(number_format($total, 0)); ?></span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Delivery Charge</span>
                    <span class="text-success fw-semibold">FREE</span>
                </div>
                <hr class="my-3 border-secondary opacity-25">
                <div class="d-flex justify-content-between">
                    <span class="fs-5 fw-bold text-dark">Total Amount</span>
                    <span class="fs-4 fw-bold text-primary">৳<?php echo e(number_format($total, 0)); ?></span>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
    function togglePaymentInstructions() {
        const selectedRadio = document.querySelector('input[name="payment_method"]:checked');
        if (!selectedRadio) return;
        
        const selected = selectedRadio.value;
        const box = document.getElementById('mfs_instruction_box');
        const title = document.getElementById('mfs_title');
        const numberElem = document.getElementById('mfs_number');

        // Reset card styles
        ['cod', 'bkash', 'nagad', 'rocket'].forEach(id => {
            const el = document.getElementById('card_' + id);
            if (el) {
                el.style.borderColor = '#e2e8f0';
                el.style.backgroundColor = '#ffffff';
                el.style.boxShadow = 'none';
            }
        });

        const activeCard = document.getElementById('card_' + selected);

        if (selected === 'bkash') {
            box.classList.remove('d-none');
            box.style.backgroundColor = '#fff5f8';
            box.style.border = '1px solid #fbcfe8';
            title.innerHTML = '<span style="color:#e2136e">bKash (বিকাশ)</span> পার্সোনাল সেন্ড মানি নম্বর';
            numberElem.innerHTML = '<div class="d-flex align-items-center gap-2 flex-wrap"><span class="fs-4 fw-extrabold px-3 py-1 rounded-pill border d-inline-block shadow-sm" style="color:#e2136e; background:#ffffff; border-color:#fbcfe8 !important; letter-spacing:1px;">01791806727</span> <span class="badge px-3 py-2 rounded-pill fw-bold" style="background-color:#e2136e; color:#ffffff;">Personal</span></div>';
            if (activeCard) {
                activeCard.style.borderColor = '#e2136e';
                activeCard.style.backgroundColor = '#fff5f8';
                activeCard.style.boxShadow = '0 4px 14px rgba(226, 19, 110, 0.15)';
            }
        } else if (selected === 'nagad') {
            box.classList.remove('d-none');
            box.style.backgroundColor = '#fffaf5';
            box.style.border = '1px solid #fed7aa';
            title.innerHTML = '<span style="color:#f7921e">Nagad (নগদ)</span> পার্সোনাল সেন্ড মানি নম্বর';
            numberElem.innerHTML = '<div class="d-flex align-items-center gap-2 flex-wrap"><span class="fs-4 fw-extrabold px-3 py-1 rounded-pill border d-inline-block shadow-sm" style="color:#d97706; background:#ffffff; border-color:#fed7aa !important; letter-spacing:1px;">01791806727</span> <span class="badge px-3 py-2 rounded-pill fw-bold" style="background-color:#f7921e; color:#ffffff;">Personal</span></div>';
            if (activeCard) {
                activeCard.style.borderColor = '#f7921e';
                activeCard.style.backgroundColor = '#fffaf5';
                activeCard.style.boxShadow = '0 4px 14px rgba(247, 146, 30, 0.15)';
            }
        } else if (selected === 'rocket') {
            box.classList.remove('d-none');
            box.style.backgroundColor = '#fcf5fd';
            box.style.border = '1px solid #f5d0fe';
            title.innerHTML = '<span style="color:#8c3494">Rocket (রকেট)</span> পার্সোনাল সেন্ড মানি নম্বর (১২-ডিজিট)';
            numberElem.innerHTML = '<div class="d-flex align-items-center gap-2 flex-wrap"><span class="fs-4 fw-extrabold px-3 py-1 rounded-pill border d-inline-block shadow-sm" style="color:#8c3494; background:#ffffff; border-color:#f5d0fe !important; letter-spacing:1px;">017918067270</span> <span class="badge px-3 py-2 rounded-pill fw-bold" style="background-color:#8c3494; color:#ffffff;">Personal (12 Digits)</span></div>';
            if (activeCard) {
                activeCard.style.borderColor = '#8c3494';
                activeCard.style.backgroundColor = '#fcf5fd';
                activeCard.style.boxShadow = '0 4px 14px rgba(140, 52, 148, 0.15)';
            }
        } else {
            box.classList.add('d-none');
            if (activeCard) {
                activeCard.style.borderColor = '#2563eb';
                activeCard.style.backgroundColor = '#f8fafc';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        togglePaymentInstructions();

        // Instant phone lookup & customer info auto-fill
        const phoneInput = document.getElementById('customer_phone');
        const nameInput = document.getElementById('customer_name');
        const emailInput = document.getElementById('customer_email');
        const addressInput = document.getElementById('shipping_address');

        if (phoneInput) {
            phoneInput.addEventListener('input', function() {
                const phoneVal = this.value.trim();
                if (phoneVal.length >= 10) {
                    fetch('/api/customer-lookup/' + encodeURIComponent(phoneVal))
                        .then(res => res.json())
                        .then(data => {
                            if (data.found) {
                                if (nameInput && (!nameInput.value || nameInput.value.length < 2)) nameInput.value = data.customer_name;
                                if (emailInput && (!emailInput.value || !emailInput.value.includes('@'))) emailInput.value = data.customer_email;
                                if (addressInput && (!addressInput.value || addressInput.value.length < 5) && data.shipping_address) addressInput.value = data.shipping_address;

                                let alertBadge = document.getElementById('autofill_badge');
                                if (!alertBadge) {
                                    alertBadge = document.createElement('div');
                                    alertBadge.id = 'autofill_badge';
                                    alertBadge.className = 'alert alert-info py-2.5 px-3 rounded-3 mb-3 small d-flex align-items-center gap-2 border-0 bg-info-subtle text-info-emphasis';
                                    alertBadge.innerHTML = '<i class="bi bi-person-check-fill fs-5 text-info"></i> <span><strong>Welcome back!</strong> Information auto-filled from your previous order / পূর্ববর্তী অর্ডারের তথ্য স্বয়ংক্রিয়ভাবে পূরণ হয়েছে।</span>';
                                    phoneInput.closest('.row').before(alertBadge);
                                }
                            }
                        })
                        .catch(err => console.error('Lookup failed', err));
                }
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\monom\Downloads\gadget-glow-store\resources\views/checkout/index.blade.php ENDPATH**/ ?>